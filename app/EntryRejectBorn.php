<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntryRejectBorn extends Model
{
    protected $connection = 'pgsql_stat_consumer';
    protected $table = 'entry_reject_born';
}
