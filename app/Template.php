<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];
    public function pagina()
    {
        return $this->hasOne('App\Pagina');
    }
}
