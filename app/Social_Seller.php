<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social_Seller extends Model
{
    protected $table = 'social_seller';

    public function consumer()
    {
        return $this->belongsTo("App\Consumer", "consumer_id", "id");
    }
}
