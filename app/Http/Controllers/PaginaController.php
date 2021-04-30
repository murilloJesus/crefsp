<?php

namespace App\Http\Controllers;

use App\Item;
use App\Image;
use App\Arquivo;
use App\Pagina;
use App\Tema;
use App\AcessoRapido;
use App\Video;
use App\Search;
use App\Categoria;
use App\Log;
use Illuminate\Http\Request;

class PaginaController extends Controller
{

    //INSERT DATA METHODS

    public function index()
    {
        return Pagina::where('id', '!=', 1)->orderBy('id', 'asc')->get();
    }

    public function recursivePaginas($id = 1)
    {
        $paginas = Pagina::where('parent_id', $id)->orderBy('indice', 'asc')->get();

        $i = 0;
        $array = array();

        foreach ($paginas as $pagina) {
            $id = $pagina->id;

            $pagina['children'] = $this->recursivePaginas($id);          

             $array[$i] = $pagina;

             $i++;
        }

        return $array;
    }

    public function indexFilhos($id)
    {
        return Pagina::where('parent_id', $id)->get();
    }

    public function indexTemplates()
    {
        return Pagina::where(['parent_id' => null])->get();
    }

    public function store(Request $request)
    {
        $pagina = $this->setInsertPagina($request);
        if ($insert = Pagina::create($pagina)) {
           
                $usuario = session('nome');
                $tipo = 'create';
                $log = "Usuario $usuario criou Pagina #$insert->id";
                $this->log($usuario, $tipo, $log);

            return [
                'status' => '200',
                'data' => $insert
            ];
        }
        return ['status' => '500'];
    }


    public function storeParent(Request $request)
    {
        $pagina = $this->setInsertPagina($request);
        if ($insert = Pagina::create($pagina)) {
            return [
                'status' => '200',
                'pagina' => $insert
            ];
        }
        return ['status' => '500'];
    }

    public function storeChildren(Request $request)
    {
        $parent = $request->parent;
        $children = $this->setInsertPagina($request);

        
        if ($parentInstance = Pagina::where('id', $parent)->get()->first()) {
            return Pagina::create($children, $parentInstance);
        }

        return ['status' => '404', 'erro' => 'pagina pai nao encontrada'];
    }

    public function show($pagina)
    {
        // $pagina = Pagina::descendantsAndSelf($pagina)->toTree()->first();
        $pagina = Pagina::find($pagina);
        if ($pagina) {
            return $pagina;
        } 
        return ['status' => '404'];
    }


    public function update(Request $request)
    {
        $id = $request->get('id');
        $pagina = Pagina::where('id', $id)->get()->first();

        if ($pagina) {
            
            $update = $request->all();
            $pagina->update($update);

            $usuario = session('nome');
            $tipo = 'update';
            $log = "Usuario $usuario atualizou Pagina #$id ";
            $this->log($usuario, $tipo, $log);

            return ['status' => '200'];
        }
        return ['status' => '500'];
    }


    //DELETE METODOS
    public function delete($id)
    {
        if ($pagina = Pagina::where('id', $id)->get()->first()) {
            $pagina->delete();
            $this->deleteRecursive($id);

                $usuario = session('nome');
                $tipo = 'delete';
                $log = "Usuario $usuario deletou Pagina #$id e todos os seus dependentes";
                $this->log($usuario, $tipo, $log);

            return ['status' => '200'];
        }
        return ['status' => '404'];
    }

    public function deleteRecursive($id)
    {
        $paginas = Pagina::where('parent_id', $id)->get();

        foreach($paginas as $pagina){
            $this->delete($pagina->id);
        }

        $itens = Item::where('pagina_id', $id)->get();

        foreach($itens as $item){
            $this->deleteItem($item->id);
        }

        return true;
    }

    public function deleteItem($id)
    {
        if ($item = Item::where('id', $id)->get()->first()) {
            $item->delete();
            $this->deleteItemRecursive($id);
            return ['status' => '200'];
        }
        return ['status' => '404'];
    }

    public function deleteItemRecursive($id)
    {
        $itens = Item::where('item_id', $id)->get();

        foreach($itens as $item){
            $this->deleteItem($item->id);
        }

        return true;
    }


    //CLONE PAGINA
    public function clonePagina($id_de, $id_para)
    {
        $paginas = Pagina::where('parent_id', $id_de)->get();
        $this->cloneItemPagina($id_de, $id_para);

        $usuario = session('nome');
        $tipo = 'clone';
        $log = "Usuario $usuario clonou Pagina #$id_de para #$id_para e todos os seus dependentes";
        $this->log($usuario, $tipo, $log);

        foreach($paginas as $pagina){
            $pagina_id_de = $pagina['id'];
            unset($pagina['id']);
            $pagina['parent_id'] = $id_para;
            $aux = $pagina->create($pagina->attributesToArray());
            $this->clonePagina($pagina_id_de, $aux->id);
        }

        return json_encode(['status' => '200']);
    }

    public function cloneItemPagina($id_de, $id_para)
    {
        $itens = Item::where('pagina_id', $id_de)->get();

        foreach($itens as $item){
            $item_id_de = $item['id'];
            unset($item['id']);
            $item['pagina_id'] = $id_para;
            $aux = $item->create($item->attributesToArray());
            $this->cloneItemItem($item_id_de, $item->id);
        }

        return json_encode(['status' => '200']);
    }

    public function cloneItemItem($id_de, $id_para)
    {
        $itens = Item::where('item_id', $id_de)->get();

        foreach($itens as $item){
            $item_id_de = $item['id'];
            unset($item['id']);
            $item['item_id'] = $id_para;
            $aux = $item->create($item->attributesToArray());
            $this->cloneItemItem($item_id_de, $item->id);
        }

        return json_encode(['status' => '200']);
    }

    //ARVORE
    public function updateArvore(Request $request)
    {
        $array = $request->all();

        $this->saveGalho($array['children'], $array['id']);

    }

    
    private function saveGalho($galho, $pai_id){

        $i = 1;
        foreach ($galho as $array) {

            $id = $array['id'];

            $page = Pagina::find($id);

            if($page) {
                $page->parent_id = $pai_id;
                $page->indice =  $i;
                $page->save();
            }

            $this->saveGalho($array['children'], $array['id']);
            $i++;
        }

        return true;

    }


    private function log($nome, $tipo, $log){
        $loggin = new Log;

        $loggin->usuario = $nome;
        $loggin->tipo = $tipo;
        $loggin->log = $log;

        $loggin->save();
    }

    private function setInsertPagina($request)
    {
        return [
            'referencia_id' => $request->get('referencia_id'),
            'parent_id' => $request->get('parent_id'),
            'tema_id' => $request->get('tema_id'),
            'galeria_id' => $request->get('galeria_id'),
            'search_id' => $request->get('search_id'),
            'name' => $request->get('name'),
            'source' => $request->get('source'),
            'status' => $request->get('status'),
            'template' => $request->get('template'),
        ];
    }

    // public function mudar_arquivos()
    // {
    //     $paginas = Pagina::get();

    //     foreach($paginas as $pagina){
    //         // if(mb_strpos($pagina->template, 'https://www.crefsp.gov.br/wp-content/uploads/')) dd($pagina);

    //         $pagina->template = str_replace('/wp-content/uploads/', '/storage/app/uploads/', $pagina->template );
    //         $pagina->update();
    //         // if(mb_strpos($pagina->template, 'storage/app/uploads/')) dd($pagina);
    //     }

    //     return json_encode(['status' => '200']);        
        
    // }

    //RETRIEVE DATA METHODS NOW ON RETRIEVEDATACONTROLLER
}
