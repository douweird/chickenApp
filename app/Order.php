<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $table = "orders";

    public function product()
    {
        return $this->hasOne(Product::class, 'product');
    }
}