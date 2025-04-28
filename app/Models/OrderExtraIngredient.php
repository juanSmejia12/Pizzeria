<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtraIngredient extends Model
{
    use HasFactory;

    protected $table = 'order_extra_ingredient';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'extra_ingredient_id',
        'quantity',
    ];
}
