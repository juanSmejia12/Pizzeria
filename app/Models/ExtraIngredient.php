<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExtraIngredient extends Model
{
    protected $fillable = ['name', 'price'];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_extra_ingredient')
                   ->withPivot('quantity');
    }
}