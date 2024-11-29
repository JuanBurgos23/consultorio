<x-layout bodyClass="g-sidenav-show bg-gray-200">

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
                        <div class="clearfix text-center">
                            <h4 class="text-blue h4">
                                <img src="{{ asset('src/images/nutrilogo.png') }}" alt="Logo" style="max-width: 40px; margin-right: 10px;">
                                REALIZA TU CONSULTA
                            </h4>
                            <p class="mb-30">Contesta los siguientes campos para que tengas un diagnostico bien espefecifico para ti!</p>
                        </div>

                        <div class="wizard-content">
                            <form class="tab-wizard wizard-circle wizard" method="POST" action="{{route('registrar_adicional')}}">
                                @csrf
                                <input type="hidden" name="consulta_id" value="{{ request()->get('consulta_id') }}">

                                <!-- IMC Step -->
                                <h5 class="text-center">
                                    <img src="{{ asset('src/images/imc.png') }}" alt="Logo" style="max-width: 30px; margin-right: 10px;">
                                    IMC
                                </h5>
                                <section>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5 d-flex align-items-center justify-content-center">
            <label for="peso" class="mr-3">
                <img src="{{ asset('src/images/balanza.png') }}" alt="Logo" style="max-width: 30px; margin-right: 10px;">
                Peso (kg): 
            </label>
            <input name="peso" type="number" class="form-control text-center mb-3 rounded" id="peso" placeholder="¿cuanto pesas?" required style="max-width: 200px;">
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-5 d-flex align-items-center justify-content-center">
            <label for="altura" class="mr-3">
                <img src="{{ asset('src/images/altura.png') }}" alt="Logo" style="max-width: 30px; margin-right: 10px;">
                Altura (m):
            </label>
            <input name="altura" type="number" step="0.01" class="form-control text-center mb-3 rounded" id="altura" placeholder="¿cuanto mides?" required style="max-width: 200px;">
        </div>
    </div>
</section>



                                <!-- Condición Step -->
                                <h5 class="text-center mt-5">
                                    <img src="{{ asset('src/images/condicion.png') }}" alt="Logo" style="max-width: 30px; margin-right: 10px;">
                                    Condición
                                </h5>
                                <section>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="operaciones"><i class="fas fa-syringe"></i> Operaciones:</label>
                                                <select name="operaciones" id="operaciones" class="form-control rounded">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Implante de cadera">Implante de cadera</option>
                                                    <option value="Implante de rodilla">Implante de rodilla</option>
                                                    <option value="Implante de columna">Implante de columna</option>
                                                    <option value="Implante de hombro">Implante de hombro</option>
                                                    <option value="Implante de muñeca">Implante de muñeca</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="alergia"><i class="fas fa-allergies"></i> Alergias:</label>
                                                <input name="alergia" type="text" class="form-control rounded" id="alergia" placeholder="Ingrese alergias conocidas">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="discapacidad"><i class="fas fa-wheelchair"></i> Discapacidad:</label>
                                                <select name="discapacidad" id="discapacidad" class="form-control rounded">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Manco">Manco</option>
                                                    <option value="Implante de rodilla">Implante de rodilla</option>
                                                    <option value="Implante de columna">Implante de columna</option>
                                                    <option value="Implante de hombro">Implante de hombro</option>
                                                    <option value="Implante de muñeca">Implante de muñeca</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Examen Step -->
                                <h5 class="text-center mt-5">
                                    <img src="{{ asset('src/images/examen.png') }}" alt="Logo" style="max-width: 30px; margin-right: 10px;">
                                    Examen
                                </h5>
                                <section>
                                    <div class="col-md-6 text-center mx-auto">
                                        <label><i class="fas fa-clipboard-list"></i> Seleccionar Tipos de Examen</label>
                                        <select class="custom-select2 form-control rounded" name="examen" style="width: 100%; height: 38px;">
                                            @foreach($tipoExamen as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                    <div class="col-md-6 text-center mx-auto">
                                        <div class="form-group">
                                            <label for="descripcion"><i class="fas fa-pencil-alt"></i> Especifique</label><br>
                                            <input name="descripcion" type="text" class="form-control rounded" id="descripcion" placeholder="Especifique el examen">
                                        </div>
                                    </div>
                                </section>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

    </main>
</x-layout>