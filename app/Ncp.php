<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncp extends Model
{
    protected $table = 'ncp';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
