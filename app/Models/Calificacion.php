<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificaciones';

    protected $fillable = [
        'user_id',
        'receta_id',
        'estrellas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
    
    public function comentario()
{
    return $this->belongsTo(Comentario::class);
}
}