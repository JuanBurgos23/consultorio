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
                                <form method="POST" action="registrar-dieta" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nombre Dieta</label>
                                        <input name="nombreDieta" class="form-control" type="text" required>

                                    </div>
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
                                        <input type="hidden" id="alimentosSeleccionadosInput" name="alimentosSeleccionados" multiple>

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

                                    <script>
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
                                            // Generar un identificador único basado en el tiempo o un contador
                                            const uniqueId = `${id}_${Date.now()}`;

                                            // Crear el contenedor para el alimento seleccionado
                                            const li = document.createElement('li');
                                            li.className = 'list-group-item d-flex justify-content-between align-items-center';
                                            li.dataset.id = uniqueId;

                                            // Crear los select dinámicamente con IDs únicos
                                            li.innerHTML = `
                                        ${nombre} 
                                        <!--Select para el Periodo-->
                                        <select class="form-control form-control-sm mt-2"id = "periodoSelect_${uniqueId}" name="periodos[]">
                                         <option id="listaPeriodosSeleccionados" value = ""> Seleccione un Periodo </option> 
                                         <!--Los periodos se cargarán dinámicamente aquí-->
                                        </select> 
                                        <select class="form-control form-control-sm mt-2" id = "diaSelect_${uniqueId}" disabled name="dias[]">
                                         <option value=""> Seleccione un Día </option> 
                                        </select> 
                                        <select class="form-control form-control-sm mt-2" id = "horaSelect_${uniqueId}" disabled name="horas[]">
                                         <option value=""> Seleccione una Hora </option> 
                                        </select> 
                                        <button type="button" class="btn btn-danger btn-sm ml-2" data- id="${uniqueId}"> Eliminar</button>
                                        `;

                                            // Añadir el alimento a la lista
                                            listaAlimentosSeleccionados.appendChild(li);

                                            // Cargar los periodos
                                            cargarPeriodos(uniqueId);

                                            // Actualizar el input oculto con los IDs seleccionados
                                            actualizarAlimentosSeleccionados();

                                            // Cerrar el modal
                                            $('#alimentosModal').modal('hide');
                                        };

                                        // Función para cargar los periodos
                                        function cargarPeriodos(uniqueId) {
                                            fetch('/periodos')
                                                .then(response => response.json())
                                                .then(data => {
                                                    const periodoSelect = document.getElementById(`periodoSelect_${uniqueId}`);
                                                    data.forEach(periodo => {
                                                        const option = document.createElement('option');
                                                        option.value = periodo.id;
                                                        option.textContent = periodo.nombre;
                                                        periodoSelect.appendChild(option);

                                                    });

                                                    // Escuchar cambios en el select de periodo para cargar los días
                                                    periodoSelect.addEventListener('change', function() {
                                                        cargarDias(uniqueId, periodoSelect.value);
                                                    });
                                                });
                                        }
                                        // Función para cargar los días según el periodo
                                        function cargarDias(id, periodoId) {
                                            const diaSelect = document.getElementById(`diaSelect_${id}`);
                                            const horaSelect = document.getElementById(`horaSelect_${id}`);

                                            // Limpiar los días y las horas
                                            diaSelect.innerHTML = '<option name="dias[]  value="">Seleccione un Día</option>';
                                            horaSelect.innerHTML = '<option name="horas[]  value="">Seleccione una Hora</option>';
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
                                            horaSelect.innerHTML = '<option name="horas[] value="">Seleccione una Hora</option>';

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
                                                    actualizarPeriodosSeleccionados();
                                                }
                                            }
                                        });

                                        // Actualizar el input oculto con los IDs seleccionados
                                        function actualizarAlimentosSeleccionados() {
                                            const ids = Array.from(listaAlimentosSeleccionados.children).map(li => li.dataset.id);
                                            alimentosSeleccionadosInput.value = ids.join(',');
                                        }

                                        function obtenerPeriodosSeleccionados() {
                                            const periodosSeleccionados = [];
                                            document.querySelectorAll('[id^="periodoSelect_"]').forEach(select => {
                                                if (select.value) {
                                                    periodosSeleccionados.push(select.value);
                                                }
                                            });
                                            return periodosSeleccionados;
                                        }

                                        // Función para actualizar periodos seleccionados
                                        function actualizarPeriodosSeleccionados() {
                                            const ids = Array.from(listaPeriodosSeleccionados.children).map(li => li.dataset.id);
                                            periodosSeleccionadosInput.value = ids.join(',');
                                        }
                                    </script>
                            </div>
                            <div class="col-md-4 col-sm-12 text-center">
                                <label>Descripcion Dieta</label>
                                <input name="descripcionDieta" class="form-control" type="text" required>

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
                                            <th class="table-plus datatable-nosort">Dieta Nombre</th>
                                            <th class="table-plus datatable-nosort">Dieta Descripcion</th>
                                            <th>Alimento</th>
                                            <th>Periodo</th>
                                            <th>Dia</th>
                                            <th>Hora</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dietas as $dieta)
                                        @foreach ($dieta->detalleDietas2 as $detalle)
                                        <tr>
                                            <td>{{ $dieta->nombre }}</td>
                                            <td>{{ $dieta->descripcion }}</td>
                                            <td>{{ $detalle->alimento->nombre ?? 'No disponible' }}</td>
                                            <td>{{ $detalle->periodo->nombre ?? 'No disponible' }}</td>
                                            <td>{{ $detalle->dia->nombre ?? 'No disponible' }}</td>
                                            <td>{{ $detalle->horario->hora ?? 'No disponible' }}</td>
                                        </tr>
                                        @endforeach
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