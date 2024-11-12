<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDieta extends Model
{
    use HasFactory;
    protected $table = 'detalle_dierta';
    protected $fillable = [
        'noombre',
        'cantidad',
        'id_dieta',
        'id_alimento',
        'id_periodo',
        'id_dia'
    ];

    public function dieta(){
        return $this->belongsTo(Dieta::class,'id_dieta');
    }
    public function alimento(){
        return $this->belongsTo(Alimento::class,'id_alimento');
    }
    public function horarios()
    {
        return $this->belongsToMany(Horario::class, 'horario', 'id_periodo', 'id_dia');
    }
}
