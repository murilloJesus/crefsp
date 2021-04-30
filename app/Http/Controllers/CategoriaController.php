<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $categoria = $this->setToInsert($request);

        if ($categoria->save()) {
            $response = [
                'status' => '200',
                'data' => $categoria
            ];

            return $response;
        }
        return json_encode(['status' => '500']);
    }

    public function categoriaByType($type)
    {
        $categoria = Categoria::where('type', '=', $type)->orderBy('indice', 'asc')->orderBy('name', 'asc')->get();
        if ($categoria->count()) {
            return $categoria;
        }
        // return response()->json(['Nenhum valor encontrado'], 404);
        return [];
    }

    public function show($categoria)
    {
        return Categoria::where('id', $categoria)->get()->first();
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $categoria_id = Categoria::where('id', $id)->get()->first();

        if ($categoria_id) {
            
            $update = $request->all();
            $categoria_id->update($update);

            return ['status' => '200'];
        }
        return ['status' => '500'];
        
    }

    public function delete($categoria)
    {
        $result = Categoria::find($categoria);
        if (!is_null($result)) {
            $result->delete();
            return json_encode(['status' => '200']);
        } else {
            return json_encode(['status' => '404']);
        }
        return json_encode(['status' => '500']);
    }

    private function setToInsert(Request $request)
    {
        return new Categoria($request->all());
    }
}
