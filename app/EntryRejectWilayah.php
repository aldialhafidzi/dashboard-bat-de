<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntryRejectWilayah extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'entry_reject_wilayah';
}
