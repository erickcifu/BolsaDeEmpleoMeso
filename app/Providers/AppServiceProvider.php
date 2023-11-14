<?php

namespace App\Providers;
use Livewire\Livewire;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public const DEFAULT_VIEW = 'ofertasmail';
    public const DEFAULT_SUBJECT = 'Lista de Ofertas Vencidas';
    public const SUBJECT_RECORDATORIO = 'Recordatorio de Ofertas por Vencer';
    public const DEFAULT_TYPE = 'vencidas';
    public const TYPE_RECORDATORIO = 'recordatorio';
    public const URL_APP = 'http://127.0.0.1:8000/home';
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Livewire::component('OfertasEstudiantes', \App\Http\Livewire\OfertasEstudiantes::class);
        Livewire::component('PostulacionEstudiantes', \App\Http\Livewire\PostulacionEstudiantes::class);
        Livewire::component('EntrevistaEstudiantes', \App\Http\Livewire\EntrevistaEstudiantes::class);
        Livewire::component('PerfilEstudiante', \App\Http\Livewire\PerfilEstudiante::class);
    }
}
