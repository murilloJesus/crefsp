<?php

namespace App\Http\Controllers;

use App\Image;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function store(Request $request)
    {
        // $this->validaImg($request);
        // dd($request);
        if ($request->file('imagem')) {
            
            $tipo =  $request->file('imagem')->extension();
            $tamanho = $request->file('imagem')->getSize();
            $name = md5($request->file('imagem'));
            $source = $name. '.'. $tipo;
            $originalName = $request->file('imagem')->getClientOriginalName();
    
            $request->file('imagem')->storeAs(
                'imagens', $source
            );
        
            $image = new Image([
                'galeria_id' => $request->get('galeria_id'),
                'name' => $request->get('name'),
                'descricao' => $request->get('descricao'),
                'source' => $source,
                'original_source' => $originalName
            ]);
                
            if ($image->save()) {
                $response = [
                    'status' => '200',
                    'data' => $image
                ];
                return $response;
            }
        } else {
            $upload = $request->all();

            if (isset($upload['id'])) {
                Item::where('id', '=', $upload['id'])->update(['image_id' => null]);
                return ['status' => '200', 'data' => ''];
            }
            return [
                'status' => '500',
                'data' => ''
            ];
        }
        
        return ['status' => '500'];        
    }

    public function show($id)
    {
        return Image::where('id', $id)->get()->first();
    }

    public function update(Request $request, Image $image)
    {

        $id = $request->get('id');
        $imagem = Image::where('id', $id)->get()->first();
        if (true) {
            $update = [
                'galeria_id' => $request->get('galeria_id'),
            ];

            if ($imagem->update($update)) {
                if (true) {
                    return ['status' => '200'];
                }
                return ['status' => '500'];
            }
        }
        return ['status' => '404'];
    }

    public function delete($id)
    {
        $image = Image::where('id', $id)->get()->first();

        if ($image) {
            $source = $image->source;
            $image->delete();

            if (Storage::disk('local')->delete("imagens/$source")) {
                return ['status' => "200"];
            }
            return ['status' => "500"];

        }
        return ['status' => '404'];
    }

    public function deleteImageUrl($id)
    {
        $image = Image::where('id', '=', $id)->get()->first();
        if (!is_null($image) && $image->count() > 0) {
            $image->delete();
            return ['status' => '200'];
        }
        return ['status' => '404', 'erro' => 'imagem nao encontrada'];
    }

    public function imageUrl(Request $request)
    {
        $image = $this->getFromRequestUrl($request);
        
        if ($image->save()) {
            $response = [
                'status' => '200',
                'data' => $image
            ];
            return $response;
        }

        return ['status' => '500'];
    }

    public function updateImageUrl(Request $request)
    {
        $request->all();
        $id = $request->get('id');
        $image = Image::where('id', $id)->get()->first();

        if ($image) {
            $update = $this->setUpdateUrl($request);

            if ($image->update($update)) {
                return ['status' => '200'];
            }
            return ['status' => '500'];
        }
        return ['status' => '404'];
    }

    public function setUpdateUrl(Request $request)
    {
        return [
            'galeria_id' => $request->get('galeria_id'),
            'name' => $request->get('name'),
            'descricao' => $request->get('descricao'),
            'source' => $request->get('source'),
        ];
    }

    private function getFromRequestUrl(Request $request)
    {
        return new Image([
            'galeria_id' => $request->get('galeria_id'),
            'name' => $request->get('name'),
            'descricao' => $request->get('descricao'),
            'source' => $request->get('source'),
        ]);
    }

    public function imagensByGaleria($id)
    {
        return Image::where('galeria_id', $id)->get();
    }

    private function getFromRequest(Request $request)
    {
        return new Image([
            'galeria_id' => $request->get('galeria_id'),
            'name' => $request->get('name'),
            'descricao' => $request->get('descricao'),
        ]);
    }
    
    // private function validaImg(Request $request)
    // {
    //     return $this->validate($request, [
    //         'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);
    // }

}
