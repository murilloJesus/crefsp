<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{

	protected $guarded = [];

    public function heads()
    {
        return $this->belongsTo('App\Image', 'head');
    }

    public function foots()
    {
        return $this->belongsTo('App\Image', 'foot');
    }
}
