<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah_2018 extends Model
{
    protected $connection = 'pgsql_wilayah_2018';
    protected $table = 'wilayah_2018';
    protected $primaryKey = 'kode';
}
