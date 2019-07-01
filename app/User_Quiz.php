<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Quiz extends Model
{
    protected $table = 'user_quiz';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
