<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'position', 'identification_number', 'salary', 'hire_date',
    ];

    // Relación con Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

