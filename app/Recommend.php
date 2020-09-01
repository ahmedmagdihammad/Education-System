<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'Recommend'; 

    public $timestamps = false;

    public function getBranch(){
        return $this->belongsTo("App\Location", "branch");
    }
}
