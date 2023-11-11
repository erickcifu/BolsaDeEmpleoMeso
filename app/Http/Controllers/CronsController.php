<?php

namespace App\Http\Controllers;

use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ListaOfertas;

class CronsController extends Controller
{
    public function actualizarOfertas(Request $request)
    {

        $query = "SELECT
                    sub.nombreEmpresa,
                    o.ofertaId,
                    o.nombrePuesto,
                    o.fechaMax,
                    o.estadoOferta,
                    o.empresa_id,
                    sub.email
                FROM
                    (
                        SELECT
                            e.user_id,
                            e.empresaId,
                            e.nombreEmpresa,
                            u.email
                        FROM
                            users as u
                            LEFT JOIN empresas as e ON u.id = e.user_id
                        WHERE
                            u.external_id IS NULL
                            AND e.estadoSolicitud = 'Aceptado'
                    ) as sub
                    LEFT JOIN ofertas as o ON sub.empresaId = o.empresa_id
                WHERE
                    o.estadoOferta = 1
                    AND o.fechaMax < NOW();";

        $resultados = DB::select($query);

        DB::beginTransaction();

        $countUpdate = 0;

        try {
            foreach ($resultados as $registro) {
                DB::table('ofertas')
                    ->where('ofertaId', $registro->ofertaId)
                    ->update(['estadoOferta' => 0]);
                $countUpdate++;
            }

            DB::commit(); // Confirma las actualizaciones si no hubo errores
        } catch (\Exception $e) {
            DB::rollBack(); // Revierte las actualizaciones en caso de error
        }

        // Inicializa un array para almacenar los grupos
        $grupos = $this->groupEmpresas($resultados, 'email');

        // Itera todas las empresas agrupadas y envia el listado de ofertas vencidas por correo a través de la plantilla
        $this->sendEmail(
            $grupos,
            AppServiceProvider::DEFAULT_SUBJECT,
            AppServiceProvider::DEFAULT_VIEW,
            AppServiceProvider::DEFAULT_TYPE,
        );

        $data = [
            'mensaje' => "Se han actualizado " . $countUpdate . " oferta(s)",
            'ofertas' => $grupos,
        ];

        return response()->json($data);
    }

    public function recordatorioOfertas(Request $request)
    {
        $query = "SELECT
                    sub.nombreEmpresa,
                    o.ofertaId,
                    o.nombrePuesto,
                    o.fechaMax,
                    o.estadoOferta,
                    o.empresa_id,
                    sub.email
                FROM
                    (
                        SELECT
                            e.user_id,
                            e.empresaId,
                            e.nombreEmpresa,
                            u.email
                        FROM
                            users as u
                            LEFT JOIN empresas as e ON u.id = e.user_id
                        WHERE
                            u.external_id IS NULL
                            AND e.estadoSolicitud = 'Aceptado'
                    ) as sub
                    LEFT JOIN ofertas as o ON sub.empresaId = o.empresa_id
                WHERE
                    o.estadoOferta = 1
                    AND o.fechaMax = DATE_ADD(CURDATE(), INTERVAL 3 DAY);";

        $resultados = DB::select($query);

        $grupos = $this->groupEmpresas($resultados, 'email');

        $this->sendEmail(
            $grupos,
            AppServiceProvider::SUBJECT_RECORDATORIO,
            AppServiceProvider::DEFAULT_VIEW,
            AppServiceProvider::TYPE_RECORDATORIO,
        );

        $countUpdate = count($grupos);

        $data = [
            'mensaje' => "Se han envidado " . $countUpdate . " recordatorios de oferta(s)",
            'ofertas' => $grupos,
        ];

        return response()->json($data);
    }

    private function sendEmail($grupos = [], $subject, $view, $type)
    {
        foreach ($grupos as $key => $ofertas) {
            Mail::to($key)->send(
                new ListaOfertas(
                    $ofertas,
                    $subject,
                    $view,
                    $type,
                )
            );
        }
    }

    private function groupEmpresas($items, $key) {
        $empresasUnicas = collect($items)->pluck($key)->unique();

        // Inicializa un array para almacenar los grupos
        $grupos = [];

        // Itera por los valores únicos de "empresa" y agrupa los resultados
        foreach ($empresasUnicas as $empresa) {
            $grupos[$empresa] = collect($items)->where($key, $empresa)->all();
        }

        return $grupos;
    }
}
