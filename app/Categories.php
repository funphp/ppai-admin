<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

    protected $table = 'categories_2016_tbl';

    public function rounds()
    {
        return $this->belongsToMany('App\Rounds')->withPivot('events_id', 'events_id');
    }
}
