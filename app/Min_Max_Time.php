<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Min_Max_Time extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'min_max_time';
}
