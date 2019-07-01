<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top_Customer_Location extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'top_customer_location';
}
