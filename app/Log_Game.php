<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_Game extends Model
{
    protected $table = 'log_games';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
