<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcessoRapido extends Model
{
    protected $guarded = [];
    
    public function permissoes()
    {
        return $this->hasMany('App\Permissoe');
    }
}
