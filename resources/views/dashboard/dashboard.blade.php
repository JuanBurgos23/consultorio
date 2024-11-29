<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Pacientes Registrados</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead class="bg-light">
                        <tr>
                            <th>Foto</th>
                            <th>Nombre Completo</th>
                            <th>Correo Electrónico</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pacientes as $paciente)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $paciente->foto) }}" alt="Foto de {{ $paciente->nombre }}" class="rounded-circle" style="width: 50px; height: 50px;">
                            </td>
                            <td>{{ $paciente->nombre }} {{ $paciente->apellido }}</td>
                            <td>{{ $paciente->correo }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-muted">No hay pacientes registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
