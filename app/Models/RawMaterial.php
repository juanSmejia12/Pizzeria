<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $fillable = ['name', 'unit'];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_raw_material')->withPivot('quantity');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
