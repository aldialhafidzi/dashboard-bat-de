<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top_Consumer_District extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'top_consumer_district';
}
