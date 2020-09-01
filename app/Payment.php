<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo('App\User', 'used');
    }
}
