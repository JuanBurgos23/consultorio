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
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Consultass</h4>
                                <p class="mb-30">Realizar su consulta</p>
                            </div>

                        </div>
                        <form method="POST" action="{{route('registrar_consulta')}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Motivo</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="motivo" required>
                                </div>
                            </div>


                     <div class="form-group row">
                             <label class="col-sm-12 col-md-2 col-form-label">Objetivo</label>
                          <div class="col-sm-12 col-md-10">
                         <select class="form-control" name="objetivo" required>
                         <option value="" disabled selected>Selecciona un objetivo</option>
                               <option value="subir de peso">Subir de peso</option>
                          <option value="bajar de peso">Bajar de peso</option>
                          <option value="mantener el peso">Mantener el peso</option>
                       </select>
                         </div>
                     </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Fecha</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" placeholder="Selcciona la fecha" name="fecha_consulta" type="date" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Rellenar formulario</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
    </main>
</x-layout>