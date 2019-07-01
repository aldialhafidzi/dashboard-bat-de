<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Code extends Model
{
    protected $table = 'user_codes';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
