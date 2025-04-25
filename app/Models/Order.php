<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'delivery_person_id', 'branch_id', 'status', 'total', 'order_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function deliveryPerson()
    {
        return $this->belongsTo(Employee::class, 'delivery_person_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany(PizzaSize::class, 'order_pizza')->withPivot('quantity');
    }
}
