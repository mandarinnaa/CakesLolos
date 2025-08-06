<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'receta_id',
        'comentario',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con la receta
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    public function calificacion()
{
    return $this->hasOne(Calificacion::class);
}
}