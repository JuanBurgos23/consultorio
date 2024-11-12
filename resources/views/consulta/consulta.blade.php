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
<<<<<<< HEAD
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
=======
<section>
    <div class="row">
        <!-- Selección de Operaciones -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Operaciones:</label>
                <select name="operaciones" class="form-control">
                    <option value="Ninguno">Ninguno</option>
                    <option value="Implante de cadera">Implante de cadera</option>
                    <option value="Implante de rodilla">Implante de rodilla</option>
                    <option value="Implante de columna">Implante de columna</option>
                    <option value="Implante de hombro">Implante de hombro</option>
                    <option value="Implante de hombro">Implante de muñeca</option>

                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
        </div>

      <!-- Selección de Alergia -->
<div class="col-md-6">
    <div class="form-group">
        <label>Alergia:</label>
        <input id="alergia-input" name="alergia" type="text" class="form-control" placeholder="Escriba su alergia">
    </div>
</div>


        <!-- Selección de Discapacidad -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Discapacidad:</label>
                <select name="discapacidad" class="form-control">
                    <option value="Ninguno">Ninguno</option>
                    <option value="Movilidad reducida">Movilidad reducida</option>
                    <option value="Pérdida de visión">Pérdida de visión</option>
                    <option value="Pérdida de audición">Pérdida de audición</option>
                    <option value="Dificultades de habla">Dificultades de habla</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
        </div>
    </div>
</section>


                                <!-- Step 4 -->
                                <h5>Examen</h5>
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Enfermedades Cardíacas:</label><br>
                <input type="checkbox" id="hipertension" name="enfermedades_cardiacas[]" value="Hipertensión">
                <label for="hipertension">Hipertensión</label><br>

                <input type="checkbox" id="insuficiencia_cardiaca" name="enfermedades_cardiacas[]" value="Insuficiencia cardíaca">
                <label for="insuficiencia_cardiaca">Insuficiencia cardíaca</label><br>

                <input type="checkbox" id="enfermedad_coronaria" name="enfermedades_cardiacas[]" value="Enfermedad coronaria">
                <label for="enfermedad_coronaria">Enfermedad coronaria</label><br>

                <input type="checkbox" id="arritmia" name="enfermedades_cardiacas[]" value="Arritmia">
                <label for="arritmia">Arritmia</label><br>

                <input type="checkbox" id="ninguno_cardiacas" name="ninguno_cardio" value="Ninguno" onchange="toggleCardiacas(this)">
                <label for="ninguno_cardiacas">Ninguno</label>
            </div>

            <div class="form-group">
                <label>Diabetes:</label><br>
                <input type="checkbox" id="diabetes_tipo_1" name="enfermedades_diabetes[]" value="Diabetes tipo 1">
                <label for="diabetes_tipo_1">Diabetes tipo 1</label><br>

                <input type="checkbox" id="diabetes_tipo_2" name="enfermedades_diabetes[]" value="Diabetes tipo 2">
                <label for="diabetes_tipo_2">Diabetes tipo 2</label><br>

                <input type="checkbox" id="prediabetes" name="enfermedades_diabetes[]" value="Prediabetes">
                <label for="prediabetes">Prediabetes</label><br>

                <input type="checkbox" id="ninguno_diabetes" name="ninguno_diabetes" value="Ninguno" onchange="toggleDiabetes(this)">
                <label for="ninguno_diabetes">Ninguno</label>
            </div>

            <div class="form-group">
                <label>Enfermedades Gastrointestinales:</label><br>
                <input type="checkbox" id="gastritis" name="enfermedades_gastrointestinales[]" value="Gastritis">
                <label for="gastritis">Gastritis</label><br>

                <input type="checkbox" id="celiaca" name="enfermedades_gastrointestinales[]" value="Enfermedad celíaca">
                <label for="celiaca">Enfermedad celíaca</label><br>

                <input type="checkbox" id="crohn" name="enfermedades_gastrointestinales[]" value="Enfermedad de Crohn">
                <label for="crohn">Enfermedad de Crohn</label><br>

                <input type="checkbox" id="sindrome" name="enfermedades_gastrointestinales[]" value="Síndrome del intestino irritable">
                <label for="sindrome">Síndrome del intestino irritable</label><br>

                <input type="checkbox" id="ninguno_gastrointestinales" name="ninguno_gastro" value="Ninguno" onchange="toggleGastrointestinales(this)">
                <label for="ninguno_gastrointestinales">Ninguno</label>
            </div>

            <div class="form-group">
                <label>Trastornos del Tiroides:</label><br>
                <input type="checkbox" id="hipotiroidismo" name="enfermedades_tiroides[]" value="Hipotiroidismo">
                <label for="hipotiroidismo">Hipotiroidismo</label><br>

                <input type="checkbox" id="hipertiroidismo" name="enfermedades_tiroides[]" value="Hipertiroidismo">
                <label for="hipertiroidismo">Hipertiroidismo</label><br>

                <input type="checkbox" id="bocio" name="enfermedades_tiroides[]" value="Bocio">
                <label for="bocio">Bocio</label><br>

                <input type="checkbox" id="ninguno_tiroides" name="ninguno_tiroides" value="Ninguno" onchange="toggleTiroides(this)">
                <label for="ninguno_tiroides">Ninguno</label>
            </div>

            <div class="form-group">
                <label>Enfermedades Renales:</label><br>
                <input type="checkbox" id="insuficiencia_renal" name="enfermedades_renales[]" value="Insuficiencia renal">
                <label for="insuficiencia_renal">Insuficiencia renal</label><br>

                <input type="checkbox" id="nefritis" name="enfermedades_renales[]" value="Nefritis">
                <label for="nefritis">Nefritis</label><br>

                <input type="checkbox" id="calculos" name="enfermedades_renales[]" value="Cálculos renales">
                <label for="calculos">Cálculos renales</label><br>

                <input type="checkbox" id="ninguno_renales" name="ninguno_renales" value="Ninguno" onchange="toggleRenales(this)">
                <label for="ninguno_renales">Ninguno</label>
            </div>

           

            <div class="form-group">
                <label>Cáncer:</label><br>
                <input type="checkbox" id="cancer_mama" name="cancer[]" value="Cáncer de mama">
                <label for="cancer_mama">Cáncer de mama</label><br>

                <input type="checkbox" id="cancer_pulmon" name="cancer[]" value="Cáncer de pulmón">
                <label for="cancer_pulmon">Cáncer de pulmón</label><br>

                <input type="checkbox" id="cancer_prostata" name="cancer[]" value="Cáncer de próstata">
                <label for="cancer_prostata">Cáncer de próstata</label><br>

                <input type="checkbox" id="cancer_colon" name="cancer[]" value="Cáncer de colon">
                <label for="cancer_colon">Cáncer de colon</label><br>

                <input type="checkbox" id="ninguno_cancer" name="ninguno_cancer" value="Ninguno" onchange="toggleCancer(this)">
                <label for="ninguno_cancer">Ninguno</label>
            </div>

           
        </div>
    </div>
</section>

<script>
function toggleCardiacas(checkbox) {
    const cardiacas = document.querySelectorAll('input[name="enfermedades_cardiacas[]"]');
    cardiacas.forEach(c => c.checked = false);
    if (checkbox.checked) {
        cardiacas.forEach(c => c.disabled = true);
    } else {
        cardiacas.forEach(c => c.disabled = false);
    }
}

function toggleDiabetes(checkbox) {
    const diabetes = document.querySelectorAll('input[name="enfermedades_diabetes[]"]');
    diabetes.forEach(d => d.checked = false);
    if (checkbox.checked) {
        diabetes.forEach(d => d.disabled = true);
    } else {
        diabetes.forEach(d => d.disabled = false);
    }
}

function toggleRespiratorias(checkbox) {
    const respiratorias = document.querySelectorAll('input[name="enfermedades_respiratorias[]"]');
    respiratorias.forEach(r => r.checked = false);
    if (checkbox.checked) {
        respiratorias.forEach(r => r.disabled = true);
    } else {
        respiratorias.forEach(r => r.disabled = false);
    }
}

function toggleGastrointestinales(checkbox) {
    const gastrointestinales = document.querySelectorAll('input[name="enfermedades_gastrointestinales[]"]');
    gastrointestinales.forEach(g => g.checked = false);
    if (checkbox.checked) {
        gastrointestinales.forEach(g => g.disabled = true);
    } else {
        gastrointestinales.forEach(g => g.disabled = false);
    }
}

function toggleTiroides(checkbox) {
    const tiroides = document.querySelectorAll('input[name="enfermedades_tiroides[]"]');
    tiroides.forEach(t => t.checked = false);
    if (checkbox.checked) {
        tiroides.forEach(t => t.disabled = true);
    } else {
        tiroides.forEach(t => t.disabled = false);
    }
}

function toggleRenales(checkbox) {
    const renales = document.querySelectorAll('input[name="enfermedades_renales[]"]');
    renales.forEach(r => r.checked = false);
    if (checkbox.checked) {
        renales.forEach(r => r.disabled = true);
    } else {
        renales.forEach(r => r.disabled = false);
    }
}

function toggleAutoinmunitarias(checkbox) {
    const autoinmunitarias = document.querySelectorAll('input[name="enfermedades_autoinmunitarias[]"]');
    autoinmunitarias.forEach(a => a.checked = false);
    if (checkbox.checked) {
        autoinmunitarias.forEach(a => a.disabled = true);
    } else {
        autoinmunitarias.forEach(a => a.disabled = false);
    }
}

function toggleHigado(checkbox) {
    const higado = document.querySelectorAll('input[name="enfermedades_higado[]"]');
    higado.forEach(h => h.checked = false);
    if (checkbox.checked) {
        higado.forEach(h => h.disabled = true);
    } else {
        higado.forEach(h => h.disabled = false);
    }
}

function toggleCancer(checkbox) {
    const cancer = document.querySelectorAll('input[name="cancer[]"]');
    cancer.forEach(c => c.checked = false);
    if (checkbox.checked) {
        cancer.forEach(c => c.disabled = true);
    } else {
        cancer.forEach(c => c.disabled = false);
    }
}

function toggleOtras(checkbox) {
    const inputOtras = document.getElementById("otras_enfermedades");
    if (checkbox.checked) {
        inputOtras.value = ""; // Limpiar el campo si se selecciona "Ninguno"
        inputOtras.disabled = true;
    } else {
        inputOtras.disabled = false;
    }
}
</script>

>>>>>>> 36ca67da24f9d9ce44f30bb5add8d1e8ba05f9c1


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-layout>