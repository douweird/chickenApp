<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $table = "orders";

    public function productinfo()
    {
        return $this->hasOne(Product::class, 'name', 'product');
    }
}