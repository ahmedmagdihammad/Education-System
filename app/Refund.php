<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $table = 'refund'; 

    public $timestamps = false;

    public function getCustomer(){
        return $this->belongsTo("App\Payment", "customer_id");
    }
}
