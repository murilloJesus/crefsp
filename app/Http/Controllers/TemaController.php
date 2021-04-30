<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index()
    {
        return Tema::orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $insert = $this->setInsert($request);
        $tema = new Tema($insert);

        if ($tema->save()) {
            return ['status' => '200'];
        }
        return ['status' => '500'];
    }

    public function show($id)
    {
        return Tema::where('id', $id)->get()->first();
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $tema = Tema::where('id', $id)->get()->first();

        if ($tema) {
            $update = $this->setInsert($request);

            if ($tema->update($update)) {
                return ['status' => '200'];
            }
            return ['status' => '500'];
        }
        return ['status' => '404'];
    }

    public function destroy($id)
    {
        $tema = Tema::where('id', $id)->get()->first();

        if ($tema) {
            $tema->delete();
            return ['status' => '200'];
        }
        return ['status' => '404'];
    }

    private function setInsert(Request $request)
    {     

        return $request->all(); 

    }
}
