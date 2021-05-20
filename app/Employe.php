<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public $table = "employees";

    public function avances()
    {
        return $this->hasMany(Avance::class)->orderBy('avance_date', 'DESC');
    }
}
