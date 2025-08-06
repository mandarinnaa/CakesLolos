<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'payment_status',
        'delivery_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cakes()
    {
        return $this->belongsToMany(Cake::class, 'cake_order')
            ->withPivot('quantity', 'price');
    }


}