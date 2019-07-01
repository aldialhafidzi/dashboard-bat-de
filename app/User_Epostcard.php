<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Epostcard extends Model
{
    protected $table = 'user_epostcards';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
