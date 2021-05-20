<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    public $table ='avances';

    public function Employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
}
