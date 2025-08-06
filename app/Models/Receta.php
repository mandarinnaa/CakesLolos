<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'tiempo_preparacion',
        'tiempo_coccion',
        'porciones',
        'dificultad',
        'ingredientes',
        'instrucciones',
        'imagen',
    ];

    protected $casts = [
        'ingredientes' => 'array',
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }
}
