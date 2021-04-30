<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{

    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }

    public function pagina()
    {
        return $this->belongsTo('App\Pagina', 'pagina_id', 'id');
    }

}
