<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dlab extends Model
{
    protected $table = 'dlab';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
