<?php

namespace App\Http\Controllers;

use App\Permissoe;
use Illuminate\Http\Request;

class PermissoeController extends Controller
{
    public function index()
    {
        return Permissoe::orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $permissao = new Permissoe($request->all());
        if ($permissao->save()) {
            $response = [ 'status' => '200'
           ];
           return $response;
       }
       return ['status' => '500'];
    }

    public function show($id)
    {
        return Permissoe::where('id', $id)->get()->first();
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $permissoe = Permissoe::where('id', $id)->get()->first();
        
        if ($permissoe) {   
            $update = $request->all();

            if ($permissoe->update($update)) {
                return json_encode(['status' => '200']);
            }
            return json_encode(['status' => '500']);
        }
        return json_encode(['status' => '404']);
    }

    public function destroy($id)
    {
        $perm = Permissoe::where('id', $id)->get()->first();

        if ($perm) {
            $perm->delete();
            return ['status' => '200'];
        }
        return ['status' => '404'];
    }
}
