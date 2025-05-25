<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'current_stock',
    ];

    // Relación N:N con Pizza
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_raw_material', 'raw_material_id', 'pizza_id')
                    ->withTimestamps();
    }
}
