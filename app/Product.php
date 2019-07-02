<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table = 'product_master';
    protected $primaryKey = 'pid';
    protected $searchableColumns = ['pid', 'p_name', 'p_desc', 'price'];



    public function consumer()
    {
        return $this->hasMany("App\Consumer", "current_product");
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'bid');
    }
}
