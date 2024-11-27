<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Nutricional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #004085;
            color: white;
        }

        .header img {
            height: 60px;
        }

        .section-title {
            background-color: #004085;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            background-color: white;
            padding: 20px;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #e9ecef;
        }

        .download-btn {
            margin: 20px;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <!-- Header with Logo and Company Name -->
        <div class="header">
            <div>
                <h1>Plan Nutricional</h1>
                <h4>Nutr-IA</h4>
                <h4>Fecha Inicio: {{$planNutricional->periodo->fecha_inicio}}</h4>
                <h4>Fecha Final: {{$planNutricional->periodo->fecha_fin}}</h4>
            </div>
            <div>
                <img src="{{ asset('vendors/images/favicon.png') }}" alt="Logo de la empresa">
            </div>
        </div>

        <!-- Plan details section -->
        <div class="card mt-4">
            <div class="section-title">
                <h3>Detalles del Plan Nutricional</h3>
            </div>
            <div class="content">
                <!-- Display plan data dynamically -->
                @php
                $detalles = $planNutricional->dieta->detalleDietas2;
                @endphp

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Alimento</th>
                            <th>Día</th>
                            <th>Horario</th>

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
            </div>
        </div>

        <!-- Exercise Section -->
        <div class="card mt-4">
            <div class="section-title">
                <h3>Ejercicios Recomendados</h3>
            </div>
            <div class="content">
                <ul class="list-group">
                    @foreach ($ejercicios as $ejercicio)
                    <li class="list-group-item">
                        <strong>{{ $ejercicio->nombre }}</strong> - {{ $ejercicio->tipoEjercicio->nombre }} (Días:
                        @foreach ($ejercicio->dias as $dia)
                        {{ $dia->nombre }}@if(!$loop->last), @endif
                        @endforeach
                        )
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
    <form action="{{ route('enviarPlanCorreo', $planNutricional->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Enviar Plan por Correo</button>
    </form>

    <!-- Include Bootstrap JS (Optional if using JS features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>