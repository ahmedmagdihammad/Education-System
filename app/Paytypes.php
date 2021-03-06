<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paytypes extends Model
{
    public $timestamps = false;

    public function getTrack()
    {
        return $this->belongsTo('App\Track', 'track');
    }
}
