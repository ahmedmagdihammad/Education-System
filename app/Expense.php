<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $timestamps = false;

    public function getBranch()
    {
        return $this->belongsTo('App\Location', 'branch');
    }

    public function getUser()
    {
        return $this->belongsTo('App\User', 'userid');
    }
}
