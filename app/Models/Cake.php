<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];


    public function hasStock($quantity)
{
    return $this->stock >= $quantity;
}

public function decreaseStock($quantity)
{
    $this->stock -= $quantity;
    $this->save();
}

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
{
    return $this->belongsToMany(Order::class, 'cake_order')
        ->withPivot('quantity', 'price');
}
}
