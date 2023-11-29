@section('title', __('Estadisticas'))
<div class="row">
    <div class="col-12 mb-3 d-flex justify-content-end">
        <label for="reminder" class="mx-3">Fecha Inicio:</label>
        <input wire:model="reminder" type="date" wire:change="actualizarInformacion()" />
        <label for="endsOnDate" class="mx-3">Fecha Fin:</label>
        <input wire:model="endsOnDate" type="date" wire:change="actualizarInformacion()" />
    </div>


    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total tecnicas</div>
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
                <div class="card border-secondary text-secondary p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-secondary text-center mt-3">
                    <h6>Por mes</h6>
                </div>
                <div class="text-secondary text-center mt-2">
                    <h4>{{ $habilidadestecnicas }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
                <div class="card border-secondary text-secondary p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-secondary text-center mt-3">
                    <h6>Por año</h6>
                </div>
                <div class="text-secondary text-center mt-2">
                    <h4>{{ $habilidadestecnicasYear }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Contratados</div>
        <div class="col-md-3 mb-1">
            <div class="card border-primary mx-sm-1 p-2">
                <div class="card border-primary text-primary p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-primary text-center mt-3">
                    <h6>Por mes</h6>
                </div>
                <div class="text-primary text-center mt-2">
                    <h4>{{ $contratados }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="card border-primary mx-sm-1 p-2">
                <div class="card border-primary text-primary p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-primary text-center mt-3">
                    <h6>Por año</h6>
                </div>
                <div class="text-primary text-center mt-2">
                    <h4>{{ $contratadosYear }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Postulados</div>
        <div class="col-md-3 mb-1">
            <div class="card border-danger mx-sm-1 p-2">
                <div class="card border-danger text-danger p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-danger text-center mt-3">
                    <h6>Por mes</h6>
                </div>
                <div class="text-danger text-center mt-2">
                    <h4>{{ $postulados }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="card border-danger mx-sm-1 p-2">
                <div class="card border-danger text-danger p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-danger text-center mt-3">
                    <h6>Por año</h6>
                </div>
                <div class="text-danger text-center mt-2">
                    <h4>{{ $postuladosYear }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Rechazados</div>
        <div class="col-md-3 mb-1">
            <div class="card border-info mx-sm-1 p-2">
                <div class="card border-info text-info p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-info text-center mt-3">
                    <h6>Por mes</h6>
                </div>
                <div class="text-info text-center mt-2">
                    <h4>{{ $rechazados }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="card border-info mx-sm-1 p-2">
                <div class="card border-info text-info p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-info text-center mt-3">
                    <h6>Por año</h6>
                </div>
                <div class="text-info text-center mt-2">
                    <h4>{{ $rechazadosYear }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100 d-flex justify-content-center mb-2"
        style="border: 1px solid gray; padding: 3px; border-radius: 5px">
        <div class="text-center">Total Ofertas</div>
        <div class="col-md-3 mb-1">
            <div class="card border-warning mx-sm-1 p-2">
                <div class="card border-warning text-warning p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-warning text-center mt-3">
                    <h6>Por mes</h6>
                </div>
                <div class="text-warning text-center mt-2">
                    <h4>{{ $ofertas }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="card border-warning mx-sm-1 p-2">
                <div class="card border-warning text-warning p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-warning text-center mt-3">
                    <h6>Por año</h6>
                </div>
                <div class="text-warning text-center mt-2">
                    <h4>{{ $ofertasYear }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>