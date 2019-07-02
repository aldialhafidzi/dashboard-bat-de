<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValidConsumer extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'valid_consumer';
}
