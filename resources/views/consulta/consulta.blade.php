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
                    @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <h4 class="text-blue h4">Step wizard</h4>
                            <p class="mb-30">jQuery Step wizard</p>
                        </div>
                        <div class="wizard-content">
                            <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('registrar_adicional')}}">
                                @csrf
                                <input type="hidden" name="consulta_id" value="{{ request()->get('consulta_id') }}">
                                <!-- Step 2 -->
                                <h5>IMC</h5>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Peso: </label>
                                                <input name="peso" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Altura :</label>
                                                <input name="altura" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <!-- Step 3 -->
                                <h5>Condicion</h5>
                                <section>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alergias :</label>
                                                <input type="text" class="form-control" name="alergia" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Discapacidad :</label>
                                                <input class="form-control" placeholder="" name="discapacidad" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Operaciones :</label>
                                                <input class="form-control" placeholder="" name="operaciones" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Step 4 -->
                                <h5>Examen</h5>
                                <section>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <textarea name="nombre_examen" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </section>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-layout>