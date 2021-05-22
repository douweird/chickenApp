<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "products";

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}