<?php

namespace App;
use App\Item;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Pagina extends Model
{
    use NodeTrait;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function template()
    {
        return $this->belongsTo('App\Template');
    }

    public function search()
    {
        return $this->belongsTo('App\Seach');
    }

    public function permissoes()
    {
        return $this->belongsToMany('App\permissoe');
    }

    public function _paginas()
    {
        return $this->hasMany('App\Pagina', 'parent_id', 'id');
    }

    public function formularios()
    {
        return $this->hasMany('App\Formulario', 'pagina_id', 'id');
    }

}
