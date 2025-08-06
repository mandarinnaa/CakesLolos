<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'message',
        'subject',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $attributes = [
        'status' => 'pendiente'
    ];
    
    public static $statuses = [
        'pendiente' => 'Pendiente',
        'approved' => 'Aprobado',
        'rejected' => 'Rechazado'
    ];
}
