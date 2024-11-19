<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Ejercicio;
use App\Models\TipoEjercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index()
    {
        $diasE = Dia::all(); // Traer todos los días
        $ejercicios = Ejercicio::with(['tipoEjercicio', 'dia'])->get(); // Incluir relaciones
        return view('ejercicio.ejercicio', compact('ejercicios', 'diasE'));
    }

    // Método para guardar un nuevo ejercicio
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombreTipoEjercicio' => 'required|string|max:255', // Tipo de ejercicio
            'dia' => 'required|exists:dia,id', // Día seleccionado debe existir
            'nombreEjercicio' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'serie' => 'nullable|string',
            'repeticiones' => 'nullable|string',
            'descanso' => 'nullable|string',
        ]);

        // Crear el tipo de ejercicio
        $tipoEjercicio = new TipoEjercicio();
        $tipoEjercicio->nombre = $validatedData['nombreTipoEjercicio'];
        $tipoEjercicio->save();

        // Crear el ejercicio y asociarlo al día y tipo de ejercicio
        $ejercicio = new Ejercicio();
        $ejercicio->nombre = $validatedData['nombreEjercicio'];
        $ejercicio->descripcion = $validatedData['descripcion'];
        $ejercicio->id_tipoEjercicio = $tipoEjercicio->id;
        $ejercicio->id_dia = $validatedData['dia']; // Asocia el ID del día seleccionado
        $ejercicio->series = $validatedData['serie'] ?? null;
        $ejercicio->repeticiones = $validatedData['repeticiones'] ?? null;
        $ejercicio->descanso = $validatedData['descanso'] ?? null;
        $ejercicio->save();

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Ejercicio registrado con éxito.');
    }
}
