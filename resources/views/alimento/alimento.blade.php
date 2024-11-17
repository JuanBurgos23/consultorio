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
                                <h4 class="text-blue h4">Registrar Alimento</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <form method="POST" action="registrar-alimento" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tipo Alimento</label>
                                        <input name="nombreAlimento" class="form-control" type="text" required>
                                    </div>


                                    <div>
                                        <div id="contenedorAlimentos">
                                            <!-- Aquí se añadirán dinámicamente los alimentos -->
                                        </div>
                                        <br>

                                        <button id="btnAgregarAlimento" type="button" class="btn btn-success btn-agregar">Agregar otro
                                            Alimento</button>
                                        <button id="btnEliminarAlimento" type="button" class="btn btn-danger" style="display: none;">Eliminar último
                                            Alimento</button>
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
                                    <legend style="font-weight: bold;">Alimento ${contadorAlimentos}</legend>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="nombreAlimento${contadorAlimentos}">Nombre:</label>
                                        <input type="text" style="border: 1px solid black;" id="nombreAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][nombre]" class="form-control" required>
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="caloriaAlimento${contadorAlimentos}">Caloria:</label>
                                        <input type="text" style="border: 1px solid black;" id="caloriaAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][caloria]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="carbohidratoAlimento${contadorAlimentos}">Carbohidrato:</label>
                                        <input type="text" style="border: 1px solid black;" id="carbohidratoAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][carbohidrato]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="proteinaAlimento${contadorAlimentos}">Proteina:</label>
                                        <input type="text" style="border: 1px solid black;" id="proteinaAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][proteina]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="grasaAlimento${contadorAlimentos}">Grasa:</label>
                                        <input type="text" style="border: 1px solid black;" id="grasaAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][grasa]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="fibraAlimento${contadorAlimentos}">Fibra:</label>
                                        <input type="text" style="border: 1px solid black;" id="fibraAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][fibra]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="vitaminaAlimento${contadorAlimentos}">Vitamina:</label>
                                        <input type="text" style="border: 1px solid black;" id="vitaminaAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][vitamina]" class="form-control">
                                    </div>
                                    <div class="campo" style="flex: 1 1 calc(33.333% - 10px); max-width: calc(33.333% - 10px);">
                                        <label for="potacioAlimento${contadorAlimentos}">Potacio:</label>
                                        <input type="text" style="border: 1px solid black;" id="potacioAlimento${contadorAlimentos}" name="alimentos[${contadorAlimentos}][potacio]" class="form-control">
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

                            <div class="col-md-12 mt-4 text-center">
                                <button type="submit" class="btn btn-success">Registrar Alimento</button>
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
                                        @forelse ($alimentos as $alimento)
                                        <tr>
                                            <td class="table-plus">{{$alimento->tipoAlimento->nombre ?? "N/A"}}</td>
                                            <td class="table-plus">{{$alimento->nombre ?? "N/A"}}</td>
                                            

                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay alimentos registrados.</td>
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