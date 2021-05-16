<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public $table = "clients";

    public function credits()
    {
        return $this->hasMany(Credit::class)->orderBy('credit_date', 'DESC');
    }
}