<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    protected $table = 'consumer';

    public function product()
    {
      return $this->belongsTo("App\Product", "current_product", "pid");
    }

    public function location()
    {
      return $this->belongsTo('App\Location', 'city', 'id_regency');
    }

    public function location_kecamatan()
    {
      return $this->belongsTo('App\Location', 'kecamatan', 'id_district');
    }

    public function log_game()
    {
        return $this->hasMany("App\Log_Game", "consumer_id");
    }

    public function user_code()
    {
        return $this->hasMany("App\User_Code", "consumer_id");
    }

    public function user_quiz()
    {
        return $this->hasMany("App\User_Quiz", "consumer_id");
    }

    public function ncp()
    {
        return $this->hasMany("App\Ncp", "consumer_id");
    }

    public function user_epostcard()
    {
        return $this->hasMany("App\User_Epostcard", "consumer_id");
    }

    public function social_seller()
    {
        return $this->hasMany("App\Social_Seller", "consumer_id");
    }

    public function dlab()
    {
        return $this->hasMany("App\Dlab", "consumer_id");
    }

    public function onetoone()
    {
        return $this->hasMany("App\OneToOne", "consumer_id");
    }
}
