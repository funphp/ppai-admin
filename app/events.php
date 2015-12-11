<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    protected $table = 'events_tbl';

    public function rounds()
    {
        return $this->belongsToMany('App\Rounds');
    }

}
