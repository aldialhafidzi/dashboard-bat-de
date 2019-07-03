<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MongoDB_Location_Stat extends Eloquent
{
    protected $connection = 'mongodb';
    // protected $table = 'ktp_stats';
    protected $collection = 'ktp_stats';
}
