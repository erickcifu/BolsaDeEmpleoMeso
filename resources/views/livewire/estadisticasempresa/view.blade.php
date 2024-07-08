@section('title', __('Estadisticas'))
<div class="row w-100 d-flex justify-content-center mb-3">
    <div class="col-12 mb-3 d-flex justify-content-end">
        <label for="reminder" class="mx-3">Fecha inicio:</label>
        <input
            wire:model="reminder"
            type="date"
            wire:change="actualizarInformacion()"
        />
        <label for="endsOnDate" class="mx-3">Fecha fin:</label>
        <input
            wire:model="endsOnDate"
            type="date"
            wire:change="actualizarInformacion()"
        />
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-warning mx-sm-1 p-2">
            <div class="card border-warning text-warning p-1">
                <span
                    class="text-center fa fa-person-circle-check"
                    aria-hidden="true"
                ></span>
            </div>
            <div class="text-warning text-center mt-3">
                <h6>Postulados</h6>
            </div>
            <div class="text-warning text-center mt-2">
                <h4>{{ $postulados }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-success mx-sm-1 p-2">
            <div class="card border-success text-success p-1 my-card">
                <span
                    class="text-center fa-solid fa-file-signature"
                    aria-hidden="true"
                ></span>
            </div>
            <div class="text-success text-center mt-3">
                <h6>Contradados</h6>
            </div>
            <div class="text-success text-center mt-2">
                <h4>{{ $contradados }}</h4>
            </div>
        </div>
    </div>
</div>
