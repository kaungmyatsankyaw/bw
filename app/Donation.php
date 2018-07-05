<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable=['client_user_id','money','date'];

    public function client_user(){
      return $this->belongsTo('App\Client_user');
    }

}
