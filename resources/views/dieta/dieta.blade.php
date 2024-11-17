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
                                <h4 class="text-blue h4">Registrar Dieta</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <form method="POST" action="registrar-alimento" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nombre Dieta</label>
                                        <input name="nombreDieta" class="form-control" type="text" required>
                                    </div>

                                    <div>
                                        <div id="contenedorAlimentos">
                                            <!-- Aquí se añadirán dinámicamente los alimentos -->
                                        </div>
                                        <br>


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
                              <!-- Selección de Alimentos -->                                                               
                                            <div class="form-group">
                                                <label>Seleccionar Alimento</label>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alimentosModal">
                                                    Seleccionar Alimento
                                                </button>
                                            </div>                                  
                                    
                                    <div id="alimentosSeleccionados" class="mt-4">
                                        <h5>Alimentos Seleccionados:</h5>
                                        <!-- Campo oculto para almacenar los IDs de los alimentos seleccionados -->
                                        <input type="hidden" id="alimentosSeleccionadosInput" name="alimentosSeleccionados">
                                        <ul id="listaAlimentosSeleccionados" class="list-group">
                                            <!-- Los alimentos seleccionados se mostrarán aquí -->
                                        </ul>
                                    </div>
                                    <br>
                                    <!-- Modal -->
                                    <div class="modal fade" id="alimentosModal" tabindex="-1" role="dialog" aria-labelledby="alimentosModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content bg-light-gray">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="alimentosModalLabel">Seleccionar Alimento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="filtroTipoAlimento">Filtrar por Tipo de Alimento:</label>
                                                        <select id="filtroTipoAlimento" class="form-control">
                                                            <option value="">Todos</option>
                                                            <!-- Opciones dinámicas según tus tipos de alimentos -->
                                                            @foreach($tiposDeAlimentos as $tipo)
                                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div id="listaAlimentos" class="row">
                                                        @foreach($alimentos as $alimento)
                                                        <div class="col-md-4 alimento-item" data-tipo="{{ $alimento->id_tipoAlimento }}">
                                                            <div class="card mb-4">
                                                                <img src="{{ $alimento->imagen }}" class="card-img-top" alt="Imagen del alimento">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $alimento->nombre }}</h5>
                                                                    <button type="button" class="btn btn-success" onclick="seleccionarAlimento({{ $alimento->id }}, '{{ $alimento->nombre }}')">Seleccionar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            `;

                                                // Añadir nuevo div de alimento al contenedor
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

                                                    // Ocultar el botón de eliminar si queda solo un alimento
                                                    if (contadorAlimentos === 1) {
                                                        btnEliminarAlimento.style.display = 'none';
                                                    }
                                                }
                                            }
                                        });




                                        document.addEventListener('DOMContentLoaded', function() {
                                            const listaAlimentosSeleccionados = document.getElementById('listaAlimentosSeleccionados');
                                            const alimentosSeleccionadosInput = document.getElementById('alimentosSeleccionadosInput');
                                            const filtroTipoAlimento = document.getElementById('filtroTipoAlimento');
                                            const listaAlimentos = document.getElementById('listaAlimentos');

                                            // Filtrar alimentos por tipo
                                            filtroTipoAlimento.addEventListener('change', function() {
                                                const tipoSeleccionado = filtroTipoAlimento.value;
                                                document.querySelectorAll('.alimento-item').forEach(item => {
                                                    if (!tipoSeleccionado || item.getAttribute('data-tipo') === tipoSeleccionado) {
                                                        item.style.display = '';
                                                    } else {
                                                        item.style.display = 'none';
                                                    }
                                                });
                                            });

                                            // Seleccionar un alimento
                                            window.seleccionarAlimento = function(id, nombre) {
                                                // Crear el contenedor para el alimento seleccionado y sus inputs
                                                const li = document.createElement('li');
                                                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                                                li.dataset.id = id;

                                                // Crear los select dinámicamente para Periodo, Día y Hora
                                                li.innerHTML = `
        ${nombre}
        <!-- Select para el Periodo -->
        <select class="form-control form-control-sm mt-2" id="periodoSelect_${id}">
            <option value="">Seleccione un Periodo</option>
            <!-- Los periodos se cargarán dinámicamente aquí -->
        </select>
        
        <!-- Select para el Día -->
        <select class="form-control form-control-sm mt-2" id="diaSelect_${id}" disabled>
            <option value="">Seleccione un Día</option>
            <!-- Los días se cargarán dinámicamente aquí -->
        </select>
        
        <!-- Select para la Hora -->
        <select class="form-control form-control-sm mt-2" id="horaSelect_${id}" disabled>
            <option value="">Seleccione una Hora</option>
            <!-- Las horas se cargarán dinámicamente aquí -->
        </select>
        
        <button type="button" class="btn btn-danger btn-sm ml-2" data-id="${id}">Eliminar</button>
    `;

                                                // Añadir el alimento a la lista de seleccionados
                                                listaAlimentosSeleccionados.appendChild(li);

                                                // Cargar los periodos
                                                cargarPeriodos(id);

                                                // Actualizar el input oculto con los IDs seleccionados
                                                actualizarAlimentosSeleccionados();

                                                // Cerrar el modal
                                                $('#alimentosModal').modal('hide');
                                            };

                                            // Función para cargar los periodos
                                            function cargarPeriodos(id) {
                                                fetch('/periodos')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const periodoSelect = document.getElementById(`periodoSelect_${id}`);
                                                        data.forEach(periodo => {
                                                            const option = document.createElement('option');
                                                            option.value = periodo.id;
                                                            option.textContent = periodo.nombre;
                                                            periodoSelect.appendChild(option);
                                                        });

                                                        // Escuchar cambios en el select de periodo para cargar los días
                                                        periodoSelect.addEventListener('change', function() {
                                                            cargarDias(id, periodoSelect.value);
                                                        });
                                                    });
                                            }

                                            // Función para cargar los días según el periodo
                                            function cargarDias(id, periodoId) {
                                                const diaSelect = document.getElementById(`diaSelect_${id}`);
                                                const horaSelect = document.getElementById(`horaSelect_${id}`);

                                                // Limpiar los días y las horas
                                                diaSelect.innerHTML = '<option value="">Seleccione un Día</option>';
                                                horaSelect.innerHTML = '<option value="">Seleccione una Hora</option>';
                                                horaSelect.disabled = true;

                                                if (periodoId) {
                                                    fetch(`/dias/${periodoId}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            data.forEach(dia => {
                                                                const option = document.createElement('option');
                                                                option.value = dia.id;
                                                                option.textContent = dia.nombre;
                                                                diaSelect.appendChild(option);
                                                            });
                                                            diaSelect.disabled = false;

                                                            // Escuchar cambios en el select de día para cargar las horas
                                                            diaSelect.addEventListener('change', function() {
                                                                cargarHoras(id, diaSelect.value);
                                                            });
                                                        });
                                                } else {
                                                    diaSelect.disabled = true;
                                                }
                                            }

                                            // Función para cargar las horas según el día
                                            function cargarHoras(id, diaId) {
                                                const horaSelect = document.getElementById(`horaSelect_${id}`);

                                                // Limpiar las horas
                                                horaSelect.innerHTML = '<option value="">Seleccione una Hora</option>';

                                                if (diaId) {
                                                    fetch(`/horas/${diaId}`)
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            data.forEach(hora => {
                                                                const option = document.createElement('option');
                                                                option.value = hora.id;
                                                                option.textContent = hora.hora;
                                                                horaSelect.appendChild(option);
                                                            });
                                                            horaSelect.disabled = false;
                                                        });
                                                } else {
                                                    horaSelect.disabled = true;
                                                }
                                            }

                                            // Delegación de eventos para eliminar un alimento
                                            document.getElementById('listaAlimentosSeleccionados').addEventListener('click', function(event) {
                                                // Verificar si el elemento clickeado es un botón de eliminar
                                                if (event.target && event.target.matches('button.btn-danger')) {
                                                    const li = event.target.closest('li');
                                                    if (li) {
                                                        // Eliminar el alimento de la lista
                                                        li.remove();
                                                        // Actualizar los IDs de los alimentos seleccionados
                                                        actualizarAlimentosSeleccionados();
                                                    }
                                                }
                                            });

                                            // Actualizar el input oculto con los IDs seleccionados
                                            function actualizarAlimentosSeleccionados() {
                                                const ids = Array.from(listaAlimentosSeleccionados.children).map(li => li.dataset.id);
                                                alimentosSeleccionadosInput.value = ids.join(',');
                                            }
                                        });
                                    </script>
                            </div>

                            <div class="col-md-12 mt-4 text-center">
                                <button type="submit" class="btn btn-success">Registrar Dieta</button>
                            </div>
                            </form>
                        </div>
                    </div>


                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix mb-20">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Alimentos</h4>
                                <table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Tipo Alimento</th>
                                            <th>Alimentos</th>

                                        </tr>
                                    </thead>
                                    <tbody>

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