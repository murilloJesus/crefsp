<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcessoRapido;

class AcessoRapidoController extends Controller
{
    public function index()
    {
        return AcessoRapido::orderBy('popularidade', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $acessoRapido = new AcessoRapido($this->setToAll($request));

        if ($acessoRapido->save()) {
            return json_encode(['status' => '200']);
        }
        return json_encode(['status' => '500']);
    }

    public function show($id)
    {
        return AcessoRapido::where('id', $id)->get()->first();
    }

    public function delete($id)
    {
        $acesso = AcessoRapido::find($id);
        if (!is_null($acesso)) {
            $acesso->delete();
            return json_encode(['status' => '200']);
        } else {
            return json_encode(['status' => '404']);
        }
        return json_encode(['status' => '500']);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $acesso = AcessoRapido::where('id', $id)->get()->first();

        if ($acesso) {
            $update = $this->setToAll($request);
            
            if ($acesso->update($update)) {
                return ['status' => '200'];
            }
            return ['status' => '500'];
        }
        return ['status' => '404'];
    }

    public function count($id)
    {
        $acesso = AcessoRapido::where('id', $id)->get()->first();

        if ($acesso) {
            $array = array(
                'id' => $id,
                'popularidade' => $acesso['popularidade'] + 1
            );

            if ($acesso->update($array)) {
                return ['status' => '200'];
            }
            return ['status' => '500'];
        }
        return ['status' => '404'];
    }
    
    private function setToAll(Request $request)
    {
        return $request->all(); 
    }
}
