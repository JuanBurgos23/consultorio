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
                            <div class="col-md-4 col-sm-12">
                                <form method="POST" action="registrar-ejercicio" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tipo Ejercicio</label>
                                        <input name="nombreTipoEjercicio" class="form-control" type="text" required>
                                    </div>

                                    <div>
                                        <div id="contenedorAlimentos">
                                            <!-- Aquí se añadirán dinámicamente los alimentos -->
                                        </div>
                                        <br>

                                        <button id="btnAgregarAlimento" type="button" class="btn btn-success btn-agregar">Agregar otro
                                            ejercicio</button>
                                        <button id="btnEliminarAlimento" type="button" class="btn btn-danger" style="display: none;">Eliminar último
                                            ejercicio</button>
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const contenedorAlimentos = document.getElementById('contenedorAlimentos');
                                            const btnAgregarAlimento = document.getElementById('btnAgregarAlimento');
                                            const btnEliminarAlimento = document.getElementById('btnEliminarAlimento');
                                            let contadorAlimentos = 0;

                                            // Agregar el primer denunciado al cargar la página
                                            agregarAlimento();

                                            // Event listener para el botón de agregar denunciado
                                            btnAgregarAlimento.addEventListener('click', agregarAlimento);

                                            // Event listener para el botón de eliminar denunciado
                                            btnEliminarAlimento.addEventListener('click', eliminarUltimoAlimento);

                                            function agregarAlimento() {
                                                contadorAlimentos++;

                                                // Crear div para el nuevo denunciado
                                                const divAlimento = document.createElement('div');
                                                divAlimento.id = `alimento${contadorAlimentos}`;
                                                divAlimento.classList.add('campo');

                                                // Contenido del div para el nuevo denunciado
                                                divAlimento.innerHTML = `
                              <fieldset style="display: flex; flex-wrap: wrap; gap: 10px;">
                                    <legend style="font-weight: bold;">Ejercicio ${contadorAlimentos}</legend>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="nombreEjercicio${contadorAlimentos}">Nombre:</label>
                                        <input type="text" style="border: 1px solid black;" id="nombreEjercicio${contadorAlimentos}" name="ejercicios[${contadorAlimentos}][nombreEjercicio]" class="form-control" required>
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="descripcion${contadorAlimentos}">Descripcion:</label>
                                        <input type="text" style="border: 1px solid black;" id="descripcion${contadorAlimentos}" name="ejercicios[${contadorAlimentos}][descripcion]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="series${contadorAlimentos}">Series:</label>
                                        <input type="text" style="border: 1px solid black;" id="series${contadorAlimentos}" name="ejercicios[${contadorAlimentos}][series]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="repeticiones${contadorAlimentos}">Repeticiones:</label>
                                        <input type="text" style="border: 1px solid black;" id="repeticiones${contadorAlimentos}" name="ejercicios[${contadorAlimentos}][repeticiones]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="descanso${contadorAlimentos}">Descanso:</label>
                                        <input type="text" style="border: 1px solid black;" id="descanso${contadorAlimentos}" name="ejercicios[${contadorAlimentos}][descanso]" class="form-control">
                                    </div>
                                </fieldset>


                            `;

                                                // Añadir nuevo div de denunciado al contenedor
                                                contenedorAlimentos.appendChild(divAlimento);
                                                // Verifica los valores de los campos generados
                                                console.log(`Se agregó alimento ${contadorAlimentos}`);
                                                console.log(contenedorAlimentos); // Muestra el contenedor completo en la consola

                                                // Mostrar el botón de eliminar si hay más de un denunciado
                                                if (contadorAlimentos > 1) {
                                                    btnEliminarAlimento.style.display = 'block';
                                                }
                                            }


                                            function eliminarUltimoAlimento() {
                                                const ultimoAlimento = contenedorAlimentos.lastElementChild;
                                                if (ultimoAlimento && contadorAlimentos > 1) {
                                                    contenedorAlimentos.removeChild(ultimoAlimento);
                                                    contadorAlimentos--;

                                                    // Ocultar el botón de eliminar si queda solo un denunciado
                                                    if (contadorAlimentos === 1) {
                                                        btnEliminarAlimento.style.display = 'none';
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <label>Seleccionar Días</label>
                                <select id="dias_disponibles" name="dias[]" class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
                                    @foreach($diasE as $dia)
                                    <option value="{{ $dia->id }}">{{ $dia->nombre }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="col-md-12 mt-4 text-center">
                                <button type="submit" class="btn btn-success">Registrar Ejercicio</button>
                            </div>
                            </form>
                        </div>
                    </div>


                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Ejercicio</h4>
                                <table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Tipo Ejercicio</th>
                                            <th>Ejercicio Nombre</th>
                                            <th>Días</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ejercicios as $ejercicio)
                                        <tr>
                                            <td>{{ $ejercicio->tipoEjercicio->nombre ?? 'Sin tipo' }}</td>
                                            <td>{{ $ejercicio->nombre }}</td>
                                            <td>
                                                @if ($ejercicio->dias->isNotEmpty())
                                                {{ $ejercicio->dias->pluck('nombre')->join(', ') }}
                                                @else
                                                No asignado
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
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