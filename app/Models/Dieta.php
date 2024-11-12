<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    use HasFactory;
    protected $table = 'dieta';
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    public function detalleDietas()
    {
        return $this->belongsToMany(DetalleDieta::class, 'detalle_dieta', 'id_dieta', 'id_alimento');
    }
}
