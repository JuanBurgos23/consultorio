<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <head>
        <!-- Asegúrate de incluir Bootstrap o tu framework CSS preferido si no está ya en el layout -->
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
                    <div class="container mt-5">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <!-- Título principal -->
                            <div class="card-header bg-primary text-white text-center">
                                <h2 class="mb-0">Plan Nutricional</h2>
                            </div>

                            <!-- Menú desplegable -->
                            <div class="p-4">
                                <label for="mealSelect" class="form-label">Selecciona una comida:</label>
                                <select id="mealSelect" class="form-select">
                                    <option value="desayuno" selected>Desayuno</option>
                                    <option value="almuerzo">Almuerzo</option>
                                    <option value="cena">Cena</option>
                                    <option value="merienda">Merienda</option>
                                </select>
                            </div>

                            <!-- Contenedor para mostrar la información -->
                            <div id="mealContent" class="p-4">
                                <!-- Contenido de las comidas -->
                                @php
                                $comidas = [
                                'desayuno' => $planNutricional->dieta->detalleDietas2->filter(fn($detalle) => \Carbon\Carbon::parse($detalle->horario->hora)->between('06:00', '10:00')),
                                'almuerzo' => $planNutricional->dieta->detalleDietas2->filter(fn($detalle) => \Carbon\Carbon::parse($detalle->horario->hora)->between('12:00', '15:00')),
                                'cena' => $planNutricional->dieta->detalleDietas2->filter(fn($detalle) => \Carbon\Carbon::parse($detalle->horario->hora)->between('18:00', '21:00')),
                                'merienda' => $planNutricional->dieta->detalleDietas2->filter(fn($detalle) => !\Carbon\Carbon::parse($detalle->horario->hora)->between('06:00', '21:00')),
                                ];
                                @endphp

                                @foreach($comidas as $tipo => $detalles)
                                <div id="{{ $tipo }}-content" class="meal-details" style="display: none;">
                                    <h3 class="text-center mb-4">{{ ucfirst($tipo) }}</h3>
                                    @if($detalles->isEmpty())
                                    <p class="text-center text-muted">No hay datos disponibles.</p>
                                    @else
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Alimento</th>
                                                <th>Día</th>
                                                <th>Hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                            <tr>
                                                <td>{{ $detalle->alimento->nombre }}</td>
                                                <td>{{ $detalle->dia->nombre }}</td>
                                                <td>{{ \Carbon\Carbon::parse($detalle->horario->hora)->format('H:i') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Script para manejar el select -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const mealSelect = document.getElementById('mealSelect');
                            const allContents = document.querySelectorAll('.meal-details');

                            function showMealContent() {
                                allContents.forEach(content => content.style.display = 'none'); // Ocultar todos
                                const selectedMeal = mealSelect.value;
                                document.getElementById(selectedMeal + '-content').style.display = 'block'; // Mostrar seleccionado
                            }

                            // Mostrar la comida seleccionada al inicio
                            showMealContent();

                            // Evento al cambiar la opción
                            mealSelect.addEventListener('change', showMealContent);
                        });
                    </script>

                    <!-- Ejercicios asociados al Plan Nutricional -->
                    <h2>Ejercicios del Plan Nutricional</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ejercicio</th>
                                <th>Tipo de Ejercicio</th>
                                <th>Series</th>
                                <th>Repeticiones</th>
                                <th>Descanso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ejercicios as $ejercicio)
                            <tr>
                                <td>{{ $ejercicio->nombre  ?? 'No disponible' }}</td>
                                <td>{{ $ejercicio->tipoEjercicio->nombre ?? 'No disponible' }}</td>
                                <td>{{ $ejercicio->series ?? 'No disponible' }}</td>
                                <td>{{ $ejercicio->repeticiones ?? 'No disponible' }}</td>
                                <td>{{ $ejercicio->descanso ?? 'No disponible' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pie de página con botón de impresión -->
                <div class="card-footer text-center bg-light">
                    <a href="{{ route('plan_pdf', $planNutricional->id) }}" class="btn btn-success">Generar PDF</a>
                </div>
                <div class="card-footer text-center bg-light">
                    
                        <a href="{{ route('historial')}}"class="btn btn-success">Volver al Historial</a>
                    
                </div>
                
            </div>
        </div>
        </div>
        </div>
        </div>
    </main>
</x-layout>