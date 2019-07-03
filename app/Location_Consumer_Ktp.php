<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location_Consumer_Ktp extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'location_consumer_ktp';
}
