<?php

namespace App\Http\Controllers;

use App\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    public function index()
    {
        return Arquivo::all();
    }

    public function store(Request $request)
    {
        // $this->validaArquivo($request);

        $tipo = $request->file('arquivo')->extension();
        $tamanho = $request->file('arquivo')->getSize();
        $name = md5($request->file('arquivo'));
        $source = $name. '.'. $tipo;
        $originalName = $request->file('arquivo')->getClientOriginalName();

        $request->file('arquivo')->storeAs(
            'arquivos', $source
        );

        $arquivo = new Arquivo([
            'name' => $request->get('name'),
            'item_id' => $request->get('item_id'),
            'pagina_id' => $request->get('pagina_id'),
            'source' => $source,
            'original_source' => $originalName
        ]);

        if ($arquivo->save()) {
            $response = [
                'status' => '200',
                'data' => $arquivo
            ];
            return $response;
        }
        
        return ['status' => '500'];  
    }

    public function storeDiversos(Request $request)
    {
        $itens = json_decode($request->get('itens'));

        // dd($itens);
        foreach ($itens as $item) {
            // dd($item);
            $item = $this->getFromObject($item);
            $item->save();
            
        }

        return json_encode(['status' => '200']);
    }

    public function show($id)
    {
        return Arquivo::where('id', $id)->get()->first();
    }

    public function update(Request $request)
    {
        // $this->validaArquivo($request);
        $tipo = $request->file('arquivo')->extension();
        $tamanho = $request->file('arquivo')->getSize();
        $name = md5($request->file('arquivo'));
        $source = $name. '.'. $tipo;
        $originalName = $request->file('arquivo')->getClientOriginalName();

        $id = $request->get('id');
        $arquivo = Arquivo::where('id', $id)->get()->first();
        return $oldSource = Arquivo::where('id', $id)->get()->first();
        if ($arquivo) {
            $update = [
                'name' => $request->get('name'),
                'source' => $source,
                'original_source' => $originalName
            ];

            if ($arquivo->update($update)) {
                if (Storage::disk('local')->delete("arquivos/$oldSource->source")) {
                    $request->file('arquivo')->storeAs(
                        'arquivos', $source
                    );
                    return ['status' => '200'];
                }
                return ['status' => '500'];
            }
        }
        return ['status' => '404'];
    }

    public function delete($id)
    {
        $arquivo = Arquivo::where('id', $id)->get()->first();

        if ($arquivo) {
            $source = $arquivo->source;
            $arquivo->delete();

            if (Storage::disk('local')->delete("arquivos/$source")) {
                return ['status' => "200"];
            }
            return ['status' => "500"];

        }
        return ['status' => '404'];
    }

    public function arquivoByItem($id)
    {
        return Arquivo::where('item_id', $id)->get();
    }

    public function arquivoByPagina($id)
    {
        return Arquivo::where('pagina_id', $id)->get();
    }

    public function cloneItem($id_de, $id_para)
    {
        $arquivos = Arquivo::where('item_id', $id_de)->get();

        foreach($arquivos as $arquivo){
            unset($arquivo->id);
            $arquivo['item_id'] = $id_para;
            $arquivo->create($arquivo->attributesToArray());
        }

        return json_encode(['status' => '200']);
    }

    public function clonePagina($id_de, $id_para)
    {
        $itens = Arquivo::where('pagina_id', $id_de)->get();

        foreach($itens as $item){
            unset($item['id']);
            $item['pagina_id'] = $id_para;
            $item->create($arquivo->attributesToArray());
        }

        return json_encode(['status' => '200']);
    }

    private function validaArquivo(Request $request)
    {
        return $this->validate($request, [
            'arquivo' => 'required|max:2048'
        ]);
    }

    private function getFromObject($obj)
    {
        return new Arquivo([
          "name" => $obj->name,
          "source" => $obj->source,
          "original_source" => $obj->original_source,
          "item_id" => $obj->item_id,
        ]);
    }
}
