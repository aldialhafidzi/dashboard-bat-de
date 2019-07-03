<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top_Consumer_Regency extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'top_consumer_regency';
}
