<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    public $timestamps = false;

    public function getLevel(){
        return $this->belongsTo("App\Level", "level");
    }

    public function getTrack(){
        return $this->belongsTo("App\Track", "track");
    }

}
