<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'id_village';

    public function consumer()
    {
        return $this->belongsToMany("App\Consumer", "city", "id_regency");
    }

    public function consumer_kec()
    {
        return $this->belongsToMany("App\Consumer", "kecamatan", "id_district");
    }
}
