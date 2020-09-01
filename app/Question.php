<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    public function getExam(){
        return $this->belongsTo("App\Exam", "exam_id");
    }
}
