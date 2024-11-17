<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\TipoAlimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    public function index()
    {
        $alimentos = Alimento::with('tipoAlimento')->get();
        return view('alimento.alimento',compact('alimentos'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'nombreAlimento' => 'required|string|max:255',
            'alimentos' => 'required|array',
            'alimentos.*.nombre' => 'required|string|max:255',
            'alimentos.*.caloria' => 'nullable|string',
            'alimentos.*.carbohidrato' => 'nullable|string',
            'alimentos.*.proteina' => 'nullable|string',
            'alimentos.*.grasa' => 'nullable|string',
            'alimentos.*.fibra' => 'nullable|string',
            'alimentos.*.vitamina' => 'nullable|string|max:255',
            'alimentos.*.potacio' => 'nullable|string',
        ]);


        // Crear el tipo de alimento
        $tipoAlimento = new TipoAlimento();
        $tipoAlimento->nombre = $validatedData['nombreAlimento'];
        $tipoAlimento->save();

        // Guardar los alimentos asociados
        foreach ($validatedData['alimentos'] as $alimentoData) {
            $alimento = new Alimento();
            $alimento->nombre = $alimentoData['nombre'];
            $alimento->caloria = $alimentoData['caloria'] ?? null;
            $alimento->carbohidrato = $alimentoData['carbohidrato'] ?? null;
            $alimento->proteina = $alimentoData['proteina'] ?? null;
            $alimento->grasa = $alimentoData['grasa'] ?? null;
            $alimento->fibra = $alimentoData['fibra'] ?? null;
            $alimento->vitamina = $alimentoData['vitamina'] ?? null;
            $alimento->potacio = $alimentoData['potacio'] ?? null;
            $alimento->id_tipoAlimento = $tipoAlimento->id;

            // Guardar cada alimento
            $alimento->save();
        }

        return redirect()->back()->with('success', 'Alimento registrado con éxito.');
    }
}
