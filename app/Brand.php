<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    protected $primaryKey = 'bid';
    
    public function product()
    {
        return $this->hasMany('App\Product', 'bid');
    }
}
