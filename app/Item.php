<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    
    public function pagina()
    {
        return $this->belongsTo('App\Pagina');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'id');
    }

    public function video()
    {
        return $this->belongsTo('App\Video');
    }

    public function flashs()
    {
        return $this->hasMany('App\Arquivo', 'id');
    }

    public function videos()
    {
        return $this->hasMany('App\Arquivo', 'id');
    }

    public function zips()
    {
        return $this->hasMany('App\Arquivo', 'id');
    }

    public function pdfs()
    {
        return $this->hasMany('App\Arquivo', 'id');
    }

    public function formularios()
    {
        return $this->hasMany('App\Formulario');
    }

    public function paginas()
    {
        return $this->hasMany('App\Pagina', 'id');
    }

    public function f_cidade()
    {
        return $this->hasOne('App\Cidade', 'id', 'cidade');
    }
}
