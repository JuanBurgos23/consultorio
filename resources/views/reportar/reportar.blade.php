<x-layout bodyClass="g-sidenav-show bg-gray-200">
    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <div class="container-fluid py-4">
            <header>
                <center>
                    <h1>Enviar correo</h1>
                </center>
                
            </header>
            <main>
                <center>
                    <form action="{{ route('contactoStore') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nombre">Nombre:</label><br>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre"><br>
                            @error('nombre')
                            <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div><br>

                        <div>
                            <label for="correo_remitente">Correo Remitente:</label><br>
                            <input type="email" id="correo_remitente" name="correo_remitente"
                                placeholder="Ingrese su correo"><br>
                            @error('correo_remitente')
                            <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div><br>

                        <div>
                            <label for="correo_destino_select">Correo Destinatario:</label>
                            <select id="correo_destino_select" name="correo_destino[]" multiple="multiple"
                                style="width: 100%;">
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->email }}">{{ $usuario->email }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="selectAll">Seleccionar Todos</button>
                            <button type="button" id="deselectAll">Deseleccionar Todos</button>
                            @error('correo_destino')
                            <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div><br>

                        <div>
                            <label for="asunto">Asunto:</label><br>
                            <input type="text" id="asunto" name="asunto" placeholder="Ingrese el asunto"><br>
                            @error('asunto')
                            <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div><br>

                        <div>
                            <label for="mensaje">Mensaje:</label><br>
                            <textarea name="mensaje" id="mensaje" cols="30" rows="5"
                                placeholder="Ingrese el mensaje"></textarea><br>
                            @error('mensaje')
                            <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div><br>

                        <div>
                            <button type="submit">Enviar Mensaje</button>
                        </div>
                    </form>
                    @if (Session::has('info'))
                    <div>
                        <br>
                        <strong style="color:blue;">Enviado!!{{ Session::get('info') }}</strong>
                    </div>
                    @endif
                </center>
            </main>
            <footer>
                <center>

                </center>
            </footer>
        </div>
        <script>
            $(document).ready(function() {
                $('#correo_destino_select').select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                    placeholder: "Seleccione o ingrese correos",
                    width: '100%'
                });

                $('#selectAll').on('click', function() {
                    var options = $('#correo_destino_select option');
                    options.each(function() {
                        if ($(this).val().includes('@felcc.com')) {
                            $(this).prop('selected', true);
                        }
                    });
                    $('#correo_destino_select').trigger('change');
                });

                $('#deselectAll').on('click', function() {
                    var options = $('#correo_destino_select option');
                    options.each(function() {
                        $(this).prop('selected', false);
                    });
                    $('#correo_destino_select').trigger('change');
                });
            });
        </script>
    </main>
</x-layout>