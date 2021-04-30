<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;

class SearchController extends Controller
{
    public function index()
    {
        return Search::orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $Search = new Search($this->setToAll($request));

        if ($Search->save()) {
            return json_encode(['status' => '200', 'data' => $Search]);
        }
        return json_encode(['status' => '500']);
    }

    public function show($id)
    {
        return Search::where('id', $id)->get()->first();
    }

    public function delete($id)
    {
        $acesso = Search::find($id);
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
        $acesso = Search::where('id', $id)->get()->first();

        if ($acesso) {
            $update = $this->setToAll($request);

            if ($acesso->update($update)) {
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
