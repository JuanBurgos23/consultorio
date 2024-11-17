<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Models\Dieta;
use App\Models\TipoAlimento;
use Illuminate\Http\Request;

class DietaController extends Controller
{
    public function index()
    {
        $alimentos = Alimento::with('tipoAlimento')->get(); // Cargar relación
        $tiposDeAlimentos = TipoAlimento::all();
        return view('dieta.dieta', compact('alimentos', 'tiposDeAlimentos'));
    }
}
