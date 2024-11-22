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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alergias:</label>
                                                <input name="alergia" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Discapacidad:</label>
                                                <select name="discapacidad" class="form-control">
                                                    <option value="Ninguno">Ninguno</option>
                                                    <option value="Implante de cadera">Manco</option>
                                                    <option value="Implante de rodilla">Implante de rodilla</option>
                                                    <option value="Implante de columna">Implante de columna</option>
                                                    <option value="Implante de hombro">Implante de hombro</option>
                                                    <option value="Implante de hombro">Implante de muñeca</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                                <h5>Examen</h5>
                                <section>
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <label>Seleccionar Tipos de Examen</label>
                                        <select class="custom-select2 form-control" name="examen" style="width: 100%; height: 38px;">
                                            @foreach($tipoExamen as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select><br>
                                    </div>
                                    <div class="col-md-4 col-sm-12 text-center">
                                        <div class="form-group">
                                            <label>Especifique</label><br>
                                            <input name="descripcion" type="text" class="form-control">
                                        </div>
                                    </div>

                                </section>

                        </div>
                    </div>




                    </form>
                </div>
            </div>

        </div>
        </div>
        </div>
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

            const url = 'https://magicloops.dev/api/loop/9a518445-038e-4ac1-a96e-f3cffba71966/run';

            const response = await fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    "peso": 70,
                    "altura": 1.75,
                    "condicion": "ninguna",
                    "enfermedades": "ninguna"
                }),
            });

            const responseJson = await response.json();
            console.log(responseJson);
        </script>

    </main>
</x-layout>