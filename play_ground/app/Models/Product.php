<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, UuidTrait;

    public function wishlist(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function cart(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function media(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Media::class);
    }
}
