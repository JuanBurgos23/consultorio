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
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Data Table with Export Buttons</h4>
                        </div>
                        <div class="pb-20">
                            <table class="table hover multiple-select-row data-table-export nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nombre Completo</th>
                                        <th>Edad</th>

                                        <th>Direccion</th>
                                        <th>Motivo Consulta</th>
                                        <th>Peso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($consultas as $consulta)
                                    <tr>
                                        <td class="table-plus">{{$consulta->paciente->nombre_completo ?? "hola"}}</td>
                                        <td class="table-plus">{{$consulta->paciente->edad ?? "hola"}}</td>
                                        <td class="table-plus">{{$consulta->paciente->direccion ?? "hola"}}</td>
                                        <td class="table-plus">{{$consulta->motivo ?? "hola"}}</td>
                                        <td class="table-plus">{{$consulta->imc->peso ?? "hola"}}</td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No hay consultas registrados.</td>
                                    </tr>
                                    @endforelse




                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Export Datatable End -->
                </div>

            </div>
        </div>
        </div>

    </main>
</x-layout>