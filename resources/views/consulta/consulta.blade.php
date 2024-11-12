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
                            <h4 class="text-blue h4">Responder estos cuestionarios </h4>
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
                                <h5>Condición</h5>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>¿Tienes algún fierro o implante en el cuerpo debido a una operación?</label>
                                                <div>
                                                    <label><input type="radio" name="" value="si" required> Sí</label>
                                                    <label><input type="radio" name="operaciones" value="no" required> No</label>
                                                </div>
                                                <input type="text" class="form-control mt-2" name="" placeholder="Especifica si seleccionaste 'Sí'">
                                            </div>

                                            <div class="form-group">
                                                <label>¿Tienes alguna discapacidad?</label>
                                                <div>
                                                    <label><input type="radio" name="discapacidad" value="si" required> Sí</label>
                                                    <label><input type="radio" name="" value="no" required> No</label>
                                                </div>
                                                <input type="text" class="form-control mt-2" name="especifica_discapacidad" placeholder="Especifica si seleccionaste 'Sí'">
                                            </div>

                                            <div class="form-group">
                                                <label>¿Tienes alergias conocidas?</label>
                                                <div>
                                                    <label><input type="radio" name="alergia" value="si" required> Sí</label>
                                                    <label><input type="radio" name="" value="no" required> No</label>
                                                </div>
                                                <input type="text" class="form-control mt-2" name="" placeholder="Especifica si seleccionaste 'Sí'">
                                            </div>

                                            <div class="form-group">
                                                <label>Preferencias Alimenticias:</label>
                                                <div>
                                                    <label><input type="checkbox" name="preferencias[]" value="vegetariano"> Vegetariano</label><br>
                                                    <label><input type="checkbox" name="preferencias[]" value="vegano"> Vegano</label><br>
                                                    <label><input type="checkbox" name="preferencias[]" value="sin_gluten"> Sin gluten</label><br>
                                                    <label><input type="checkbox" name="preferencias[]" value="bajo_carbohidratos"> Bajo en carbohidratos</label><br>
                                                    <label><input type="checkbox" name="preferencias[]" value="otros"> Otros (especificar):</label>
                                                    <input type="text" class="form-control mt-2" name="especifica_preferencias" placeholder="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>¿Hay algo más que debamos saber sobre tu salud?</label>
                                                <textarea class="form-control" name="comentarios_adicionales" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Step 4 -->
                                <h5>Examen</h5>
                                <section>
                                    <div class="form-group">
                                        <label>Por favor, marca todas las enfermedades que tienes diagnosticadas:</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="diabetes"> Diabetes</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="hipertension"> Hipertensión</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="enfermedad_cardíaca"> Enfermedad cardíaca</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="asma"> Asma</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="enfermedad_pulmonar_cronica"> Enfermedad pulmonar crónica</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="enfermedades_gastrointestinales"> Enfermedades gastrointestinales (especificar):</label>
                                        <input type="text" class="form-control mt-2" name="especifica_gastrointestinales" placeholder="">
                                        <br>
                                        <label><input type="checkbox" name="enfermedades[]" value="cancer"> Cáncer (especificar tipo):</label>
                                        <input type="text" class="form-control mt-2" name="especifica_cancer" placeholder="">
                                        <br>
                                        <label><input type="checkbox" name="enfermedades[]" value="enfermedades_autoinmunes"> Enfermedades autoinmunes (especificar):</label>
                                        <input type="text" class="form-control mt-2" name="especifica_autoinmunes" placeholder="">
                                        <br>
                                        <label><input type="checkbox" name="enfermedades[]" value="enfermedad_renal"> Enfermedad renal</label><br>
                                        <label><input type="checkbox" name="enfermedades[]" value="otros"> Otros (especificar):</label>
                                        <input type="text" class="form-control mt-2" name="especifica_otros" placeholder="">
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