@section('title', __('Estadisticas'))
<div class="row">
    <div class="col-12 mb-3 d-flex justify-content-end">
        <label for="reminder" class="mx-3">Fecha Inicio:</label>
        <input wire:model="reminder" type="date" wire:change="actualizarInformacion()" />
        <label for="endsOnDate" class="mx-3">Fecha Fin:</label>
        <input wire:model="endsOnDate" type="date" wire:change="actualizarInformacion()" />
    </div>
    <div class="text-center"><h2>Estadísticas Generales</h2></div>
    <div class="text-center">Total Usuarios</div>
    <div class="row w-100 d-flex justify-content-center mb-2">
        {{-- @foreach ($usuarios as $item) --}}
    <!-- <span>  {{ $query }} </span> -->
    {{-- <div class="text-center">Total Usuarios</div> --}}
    <div class="row w-100 d-flex justify-content-center mb-2">
        @forelse ($usuarios as $item)
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
                <div class="card border-secondary text-secondary p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-secondary text-center mt-3">
                    <h6>{{$item->rol}}</h6>
                </div>
                <div class="text-secondary text-center mt-2">
                    <h4>{{ $item->total }}</h4>
                </div>
            </div>
        </div>

        {{-- @endforeach --}}

        @empty
        <div class="text-center">No se encontraron registros, selecciona otro rango de fechas</div>
        @endforelse

    </div>
    <br/>
    <div class="row w-100 d-flex justify-content-center mb-2">
        <br/>
        <div class="col-md-3 mb-2">
            <div class="card border-warning mx-sm-1 p-2">
                <div class="card border-warning text-warning p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-warning text-center mt-3">
                    <p>Postulados</p>
                </div>
                <div class="text-warning text-center mt-2">
                    <h1>{{ $postulados }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-2">
                <div class="card border-success text-success p-1 my-card">
                    <span class="text-center fa-solid fa-file-signature" aria-hidden="true"></span>
                </div>
                <div class="text-success text-center mt-3">
                    <p>Contratados</p>
                </div>
                <div class="text-success text-center mt-2">
                    <h4>{{ $contratados }}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center"><h2>Estadísticas por año actual</h2></div>
    <div class="text-center">Total usuarios este año</div>
    <div class="row w-100 d-flex justify-content-center mb-2">

        {{-- @foreach ($usuariosYear as $item) --}}

        @forelse ($usuariosYear as $item)

        <div class="col-md-3 mb-1">
            <div class="card border-success mx-sm-1 p-2">
                <div class="card border-success text-success p-1">
                    <span class="text-center fa fa-person-circle-check" aria-hidden="true"></span>
                </div>
                <div class="text-success text-center mt-3">
                    <h6>{{$item->rol}}</h6>
                </div>
                <div class="text-success text-center mt-2">
                    <h4>{{ $item->total }}</h4>
                </div>
            </div>
        </div>

        {{-- @endforeach --}}

        @empty
        <div class="text-center">No se encontraron registros, selecciona otro rango de fechas</div>
        @endforelse

    </div>

    
    <div class="row w-100 d-flex justify-content-center">
        <br/>
        <div class="col-md-4 mb-2">
            <br/>
            <div class="card border-danger mx-sm-1 p-2">
                <div class="card border-danger text-danger p-1">
                    <span class="text-center fa fa-people-arrows" aria-hidden="true"></span>
                </div>
                <div class="text-danger text-center mt-3">
                    <p>Ofertas</p>
                </div>
                <div class="text-danger text-center mt-2">
                    <h4>{{ $ofertas }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <br/>
            <div class="card border-info mx-sm-1 p-2">
                <div class="card border-info text-info p-1">
                    <span class="text-center fa fa-people-arrows" aria-hidden="true"></span>
                </div>
                <div class="text-info text-center mt-3">
                    <p>Facultades</p>
                </div>
                <div class="text-info text-center mt-2">
                    <h4>{{ $facultades }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <br/>
            <div class="card border-secondary mx-sm-1 p-2">
                <div class="card border-secondary text-secondary p-1 my-card">
                    <span class="text-center fa fa-file-contract" aria-hidden="true"></span>
                </div>
                <div class="text-secondary text-center mt-3">
                    <p>Carreras</p>
                </div>
                <div class="text-secondary text-center mt-2">
                    <h4>{{ $carreras }}</h4>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="row w-100">
        <canvas id="chartFacultades"></canvas>
        <canvas id="chartCarreras"></canvas>
    </div>
    <br/>
    <br/>
</div>
<br/>
<br/>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    // start build grafic facultades

    var ctx = document.getElementById('chartFacultades').getContext('2d');
    var data = @json($facultadesEst);
    var values = Object.values(data);

    var labels = [];
    var labelvalue = [];

    for (const i of values) {
        labels.push(i.facultad);
        labelvalue.push(i.total);
    }

    var chartCarreras = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Estudiantes por facultad',
                data: labelvalue,
                backgroundColor: [
                'rgba(0, 92, 53, 0.7)',
                'rgba(255, 0, 0, 0.7)',  // Puedes agregar más colores según sea necesario
                'rgba(0, 0, 255, 0.7)',
                // ...
            ],
            borderWidth: 1
            }]
        },
    });

    // end build grafic facultades

    // start Build grafic carreras
    var ctx = document.getElementById('chartCarreras').getContext('2d');
    var data = @json($carrerasEst);
    var values = Object.values(data);

    var labels = [];
    var labelvalue = [];

    for (const i of values) {
        labels.push(i.carrera);
        labelvalue.push(i.total);
    }

    var chartCarreras = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Estudiantes por carrera',
                data: labelvalue,
                // backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderWidth: 1
            }]
        },
    });

    // end build grafic carreras
</script>