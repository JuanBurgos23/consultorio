<x-layout bodyClass="g-sidenav-show bg-gray-200">
<head>
    <!-- CSS para DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <!-- JS para jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- JS para DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    
    <!-- Librerías adicionales necesarias para el botón PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
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
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Historial</h4>
                        <form action="{{ route('historialFecha') }}" method="GET">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" required>
                            <label for="fecha_fin">Fecha Final</label>
                            <input type="date" name="fecha_fin" required>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                        <form action="{{ route('historialEdad') }}" method="GET">
                        <label for="edad_minima">Edad Mínima</label>
                        <input type="number" name="edad_minima" min="0" required>
                        
                        <label for="edad_maxima">Edad Máxima</label>
                        <input type="number" name="edad_maxima" min="0" required>
                        
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    </div>
                    <div class="pb-20">
                        <table class="table hover multiple-select-row data-table-exports nowrap" style="font-size: 0.8rem; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">Objetivo</th>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">Motivo</th>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">Peso</th>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">edad</th>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">Fecha Consulta</th>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">Acción</th>
                                    <th style="font-size: 0.9rem; padding: 5px 10px;">Plan Nutricional</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($diagnosticos as $diagnostico)
                                <tr>
                                    <td style="padding: 5px 10px; font-size: 0.8rem;">{{ $diagnostico->consulta->objetivo ?? 'N/A' }}</td>
                                    <td style="padding: 5px 10px; font-size: 0.8rem;">{{ $diagnostico->consulta->motivo ?? 'N/A' }}</td>
                                    <td style="padding: 5px 10px; font-size: 0.8rem;">{{ optional($diagnostico->consulta->imc)->peso ?? 'N/A' }}</td>
                                    <td style="padding: 5px 10px; font-size: 0.8rem;">    {{ optional($diagnostico->consulta->paciente)->edad ?? 'N/A' }}</td>
                                    <td style="padding: 5px 10px; font-size: 0.8rem;">{{ $diagnostico->consulta->fecha_consulta ?? 'N/A' }}</td>
                                    <td class="align-middle text-center" style="padding: 5px;">
                                        <a href="{{ route('detalle_historial', $diagnostico->id) }}" class="btn btn-success" style="font-size: 0.8rem; padding: 4px 8px;">Ver Detalles</a>
                                    </td>
                                    <td class="align-middle text-center" style="padding: 5px;">
                                        <a href="{{ route('plan_nutriHistorial', $diagnostico->id) }}" class="btn btn-success" style="font-size: 0.8rem; padding: 4px 8px;">Ver Plan</a>
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center" style="font-size: 0.8rem;">No hay Historial.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Inicialización de DataTables -->
                        <script>
                            $(document).ready(function() {
                                $('.data-table-exports').DataTable({
                                    dom: 'Bfrtp', // Habilita botones
                                    buttons: [
                                        {
                                            extend: 'copyHtml5',
                                            text: 'Copiar',
                                            className: 'btn btn-primary'
                                        },
                                        {
                                            extend: 'csvHtml5',
                                            text: 'Exportar a CSV',
                                            className: 'btn btn-success'
                                        },
                                        {
                                            extend: 'excelHtml5',
                                            text: 'Exportar a Excel',
                                            className: 'btn btn-info'
                                        },
                                        {
                                            extend: 'pdfHtml5',
                                            text: 'Exportar a PDF',
                                            className: 'btn btn-danger',
                                            orientation: 'landscape',
                                            pageSize: 'A4' // Asegúrate de agregar esta opción
                                            
                                        },
                                        {
                                            extend: 'print',
                                            text: 'Imprimir',
                                            className: 'btn btn-warning'
                                        }
                                    ],
                                    responsive: true,
                                    language: {
                                        url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</x-layout>
