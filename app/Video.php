<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

        public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
