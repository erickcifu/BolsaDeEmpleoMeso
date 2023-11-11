<div class="row w-100 d-flex justify-content-center mb-3">
    <div class="col-md-4 mb-3">
        <div class="card border-warning mx-sm-1 p-3">
            <div class="card border-warning text-warning p-3">
                <span
                    class="text-center fa fa-person-circle-check"
                    aria-hidden="true"
                ></span>
            </div>
            <div class="text-warning text-center mt-3">
                <h4>Postulados este Mes</h4>
            </div>
            <div class="text-warning text-center mt-2">
                <h1>{{ $postulados }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success mx-sm-1 p-3">
            <div class="card border-success text-success p-3 my-card">
                <span
                    class="text-center fa-solid fa-file-signature"
                    aria-hidden="true"
                ></span>
            </div>
            <div class="text-success text-center mt-3">
                <h4>Contradados este Mes</h4>
            </div>
            <div class="text-success text-center mt-2">
                <h1>{{ $contradados }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="row w-100 d-flex justify-content-center">
    <div class="col-md-4 mb-3">
        <div class="card border-info mx-sm-1 p-3">
            <div class="card border-info text-info p-3">
                <span
                    class="text-center fa fa-people-arrows"
                    aria-hidden="true"
                ></span>
            </div>
            <div class="text-info text-center mt-3">
                <h4>Postulados este Año</h4>
            </div>
            <div class="text-info text-center mt-2">
                <h1>{{ $postuladosYear }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-secondary mx-sm-1 p-3">
            <div class="card border-secondary text-secondary p-3 my-card">
                <span
                    class="text-center fa fa-file-contract"
                    aria-hidden="true"
                ></span>
            </div>
            <div class="text-secondary text-center mt-3">
                <h4>Contradados este Año</h4>
            </div>
            <div class="text-secondary text-center mt-2">
                <h1>{{ $contradadosYear }}</h1>
            </div>
        </div>
    </div>
</div>
