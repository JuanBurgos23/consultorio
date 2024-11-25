<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <head>

    </head>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="col-12">
                <div class="card my-4">
                    <div class="container-fluid py-4">
                        <div class="col-12">
                            <h4 class="text-blue h4">Historial</h4>
                            <div class="card my-4">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif



                                <table class="table hover multiple-select-row data-table-export nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Objetivo</th>
                                            <th class="table-plus datatable-nosort">Motivo</th>
                                            <th class="table-plus datatable-nosort">Peso</th>
                                            <th class="table-plus datatable-nosort ">fecha diagnostico</th>
                                            <th class="table-plus datatable-nosort text-center">Accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($diagnosticos as $diagnostico)
                                        <tr>

                                            <td>{{ $diagnostico->consulta->motivo }}</td>
                                            <td>{{ $diagnostico->consulta->objetivo }}</td>
                                            <td>{{ optional($diagnostico->consulta->imc)->peso ?? 'N/A' }}</td>

                                            <td>{{ $diagnostico->created_at->format('d-m-Y') }}</td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('detalle_historial', $diagnostico->id) }}" class="btn btn-success">Ver Detalles</a>
                                                <!-- Otras acciones como editar o eliminar si es necesario -->
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('plan_nutriHistorial', $diagnostico->id) }}" class="btn btn-success">Ver Plan</a>
                                                <!-- Otras acciones como editar o eliminar si es necesario -->
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No hay Historial.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layout>