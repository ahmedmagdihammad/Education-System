<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    public $timestamps = false;

    protected $table = 'absent';

    public function getBranch()
    {
        return $this->belongsTo('App\Location', 'branch');
    }
}
