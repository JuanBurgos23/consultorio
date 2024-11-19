<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <head>
    </head>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="col-12">
                <div class="card my-4">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Registrar Ejercicio</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 text-center">
                                <form method="POST" action="registrar-ejercicio" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tipo Ejercicio</label>
                                        <input name="nombreTipoEjercicio" class="form-control" type="text" required>
                                    </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="form-group">
                                    <label>Nombre Ejercicios</label>
                                    <input name="nombreEjercicio" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input name="descripcion" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="form-group">
                                    <label>Series</label>
                                    <input name="serie" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="form-group">
                                    <label>Repeticiones</label>
                                    <input name="repeticiones" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="form-group">
                                    <label>Descanso</label>
                                    <input name="descanso" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="form-group w-100">
                                    <label>Seleccionar Días</label>
                                    <select class="custom-select2 form-control" name="dia" style="width: 100%; height: 38px;">
                                        <option disabled selected>Seleccione un día</option>
                                        @foreach($diasE as $dia)
                                        <option value="{{ $dia->id }}" {{ old('dia') == $dia->id ? 'selected' : '' }}>
                                            {{ $dia->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <button type="submit" class="btn btn-success">Registrar Ejercicio</button>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Ejercicios</h4>
                                <table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Tipo Ejercicio</th>
                                            <th>Ejercicio</th>
                                            <th>Dia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ejercicios as $ejercicio)
                                        <tr>
                                            <td class="table-plus">{{$ejercicio->tipoEjercicio->nombre ?? "N/A"}}</td>
                                            <td class="table-plus">{{$ejercicio->nombre ?? "N/A"}}</td>
                                            <td class="table-plus">{{$ejercicio->dia->nombre ?? "N/A"}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay ejercicios registrados.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-layout>