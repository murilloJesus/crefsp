<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo('App\item');
    }

    public function heads()
    {
        return $this->hasOne('App\Tema', 'head');
    }

    public function foots()
    {
        return $this->hasOne('App\Tema', 'foot');
    }
}
