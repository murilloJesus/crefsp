<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissoe extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'permissoes');
    }

    public function paginas()
    {
        return $this->hasMany('App\Pagina');
    }

    public function acesso_rapido()
    {
        return $this->belongsTo('App\AcessoRapido', 'acesso_rapido_id');
    }
}
