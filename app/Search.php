<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $guarded = [];
    
    public function pagina()
    {
        return $this->hasOne('App\Pagina');
    }
}
