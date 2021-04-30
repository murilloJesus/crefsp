<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $guarded = [];
    
    public function flashs()
    {
        return $this->belongsTo('App\Item', 'flash');
    }
    
    public function pdfs()
    {
        return $this->belongsTo('App\Item', 'pdf');
    }

    public function videos()
    {
        return $this->belongsTo('App\Item', 'video');
    }

    public function zips()
    {
        return $this->belongsTo('App\Item', 'zip');
    }
}
