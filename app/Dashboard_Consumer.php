<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard_Consumer extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'dashboard_consumer';
}
