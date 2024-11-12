<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;
    protected $table = 'ejercicio';
    protected $fillable = [
        'nombre',
        'descripcion',
        'id_tipoEjercicio',
        'id_rutina',
        'id_dia'
    ];

    public function tipoEjercicio(){
        return $this->belongsTo(TipoEjercicio::class,'id_tipoEjercicio');
    }

    public function rutina(){
        return $this->belongsTo(Rutina::class,'id_rutina');
    }
    public function dia(){
        return $this->belongsTo(Dia::class,'id_dia');
    }

}
