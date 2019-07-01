<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneToOne extends Model
{
    protected $table = 'public.121';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
    
}
