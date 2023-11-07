<div class="container"> <div class="row justify-content-center"> <div class="col-md-12">
    <div class="modal-body" style="color: #f0eadc">
    <form>
    <div class="form-group">
        <label for="nombre"
        ><b style="color: black">Nombres</b></label
        >
        <input
        wire:model="nombre"
        type="text"
        class="form-control"
        id="nombre"
        placeholder="Nombre"
        />
        @error('nombre')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group">
            <label for="apellidos"
            ><b style="color: black">Apellidos</b></label
            >
            <input
            wire:model="apellidos"
            type="text"
            class="form-control"
            id="apellidos"
            placeholder="Apellidos"
            />
            @error('apellidos')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="form-group">
                <label for="carnet"
                ><b style="color: black">Carnet</b></label
                >
                <input
                wire:model="carnet"
                type="number"
                class="form-control"
                id="carnet"
                placeholder="Carnet"
                />@error('carnet')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                <label for="DPI"><b style="color: black">Dpi</b></label>
                <input
                wire:model="DPI"
                type="number"
                class="form-control"
                id="DPI"
                placeholder="Dpi"
                />@error('DPI')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                <label for="correo" ><b style="color: black" >Correo Electronico</b></label > <input wire:model="correo"
                    type="email" class="form-control" id="correo" placeholder="Correo" />@error('correo') <span
                    class="error text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="numero_personal"
                    ><b style="color: black">Numero Personal</b></label
                    >
                    <input
                    wire:model="numero_personal"
                    type="number"
                    size="8"
                    value="00-000-000"
                    class="form-control"
                    id="numero_personal"
                    placeholder="Numero Personal"
                    />@error('numero_personal')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="numero_domiciliar"><b style="color: black">Otro Numero de Telefono</b></label>
                    <input wire:model="numero_domiciliar" type="number" class="form-control" id="numero_domiciliar"
                        placeholder="Numero Domiciliar" />@error('numero_domiciliar')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="curriculum"><b style="color: black">Cargar Curriculum</b></label>
                    <input wire:model="curriculum" type="file" class="form-control" id="curriculum"
                        placeholder="Curriculum" />@error('curriculum')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="departamento_id"><b style="color: black">Departamento </b></label>
                    <select wire:model="departamento_id" class="form-control" id="departamento_id"
                    placeholder="Departamento" required>
                        <option value="null" disabled selected>Seleccione una opción</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamentoId }}">
                            {{ $departamento->nombreDepartamento }}
                        </option>
                        @endforeach
                    </select>
                    @error('departamento_id')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="municipio_id"><b style="color: black">Municipio</b></label>
                    <select wire:model="municipio_id" class="form-control" id="municipio_id" placeholder="Municipio">
                        <option value="null" disabled selected>Seleccione una opción</option>
                        @foreach ($municipios as $municipio)
                        @if ($municipio->departamento_id ==
                        $departamento_id)
                        <option value="{{ $municipio->municipioId }}">
                            {{ $municipio->nombreMunicipio }}
                        </option>
                        @endif @endforeach
                    </select>
                    @error('municipio_id')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="facultad_id"><b style="color: black">Facultad</b></label>
                    <select wire:model="facultad_id" class="form-control" id="facultad_id" placeholder="Facultad">
                        <option value="null" disabled selected>Seleccione una opción</option>
                        @foreach ($facultades as $facultad)
                        <option value="{{ $facultad->id }}">
                            {{ $facultad->Nfacultad }}
                        </option>
                        @endforeach
                    </select>
                    @error('facultad_id')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="carrera_id"><b style="color: black">Carrera</b></label>
                    <select wire:model="carrera_id" class="form-control" id="carrera_id" placeholder="Carrera">
                        <option value="null" disabled selected>Seleccione una opción</option>
                        @foreach ($carreras as $carrera)
                        @if ($carrera->facultad_id == $facultad_id)
                        <option value="{{ $carrera->id }}">{{ $carrera->Ncarrera }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('carrera_id')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>                
                </form>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn close-btn mx-3" style="background-color: #d3d3d3">
                    <a href="{{ url('/home') }}" class="nav-link"><b>Cancelar</b></a>
                </button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary"
                    style="background-color: #005c35">
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>