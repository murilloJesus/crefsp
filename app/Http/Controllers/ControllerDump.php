<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Pagina;
use App\Search;
use App\Item;
use App\Image;
use App\Arquivo;
use App\Categoria;

class ControllerDump extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dumpDataBase(Request $request)
    {

      $data =  $request->get('json');

      // dd($data);
      foreach ($data as $pagina) {
      
          $this->insertRecursivePagina($pagina);
      }
    }

    public function insertRecursivePagina($pagina, $pai = false)
    {

      // dd($pagina);

      $verificar = Pagina::where('name', $pagina['name'])->get()->first();

      if($verificar and !$pai){
        return false;
      }

      $insert = new Pagina($pagina);

      unset($insert['children']);
      unset($insert['itens']);
      unset($insert['search']);

      $insert['status'] = true;

      if($insert['source'] == false) $insert['source'] = '';

      if ($pai) {
        $insert['parent_id'] = $pai;
      }

      if( isset($pagina['search']) and $pagina['search'] ){
          $pagina['search']['pesquisar'] = $pagina['search']['pesquisa'];
          unset($pagina['search']['pesquisa']);
          $search =  new Search($pagina['search']);
          $search->save();
          $insert['search_id'] = $search->id;
      }

      $insert->save();
      if(isset($pagina['children'])){
        foreach ($pagina['children'] as $child) {
          $this->insertRecursivePagina($child, $insert->id );
        }     
      }

      if(isset($pagina['itens'])){
        foreach ($pagina['itens'] as $item) {
          $this->insertRecursiveItem($item, $insert->id );
        }
      }

    }

    public function insertRecursiveItem($item, $pagina_id)
    {
      $insert = new Item($item);
      $insert['pagina_id'] = $pagina_id;
      $insert['doc'] = $insert['credencial'];
      $insert['source'] = $insert['href'];
      unset($insert['credencial']);
      unset($insert['dataFormatada']);
      unset($insert['hash']);
      if($insert->imagem != ''){
        $insert['image_id'] = $this->insertRecursiveImagem($insert->imagem);
      }
      if($insert->arquivo != ''){
        $insert['arquivo_id'] = $this->insertRecursiveArquivo($insert->arquivo);
      }
      if($insert->categoria != ''){
        $insert['categoria'] = $this->insertRecursiveCategoria($insert->categoria);
      }
      if($insert->video != ''){
        $insert['video'] = $this->insertRecursiveVideo($insert->video);
      }
      if($insert->pdf != ''){
        $insert['pdf'] = $this->insertRecursiveArquivo($insert->pdf);
      }
      if($insert->flash != ''){
        $insert['flash'] = $this->insertRecursiveArquivo($insert->flash);
      }
      if($insert->zip != ''){
        $insert['zip'] = $this->insertRecursiveArquivo($insert->zip);
      }
      unset($insert['imagem']);
      unset($insert['arquivo']);
      unset($insert['editora']);
      $insert->save();

      return true;
    }

    public function insertRecursiveVideo($video)
    {
      $novo_video = new Item();
      $novo_video->type = 'video';
      $novo_video->source = $video['href'];

      $novo_video->save();
      return $novo_video->id;
    }


    public function insertRecursiveCategoria($categoria)
    {

      $categoria = strtolower($categoria);
      $categoria = ucwords($categoria);

      $find_categoria = Categoria::where('name', $categoria)->get()->first();

      if($find_categoria){

        return $find_categoria->id;

      }else{

        $nova_categoria = new Categoria();
        $nova_categoria->name = $categoria;

        $nova_categoria->save();

        return $nova_categoria->id;
      }

    }

    public function insertRecursiveImagem($imagem)
    {
      if(!is_array($imagem)) dd($imagem);
      $insert = new Image($imagem);
      unset($insert['backgroundSource']);
      $insert->save();
      return $insert->id;
    }

    public function insertRecursiveArquivo($arquivo)
    {
      // dd($arquivo);
      unset($arquivo['type']);
      unset($arquivo['arquive']);
      unset($arquivo['icone']);
      unset($arquivo['href']);
      unset($arquivo['datamm']);
      unset($arquivo['datayy']);
      unset($arquivo['categoria']);
      unset($arquivo['data']);
      unset($arquivo['dataFormatada']);
      unset($arquivo['descricao']);
      unset($arquivo['editora']);

      $insert = new Arquivo($arquivo);

      $insert->save();
      return $insert->id;
    }


    public function dump()
    {
      $this->dumpDataBase($this->data());
    }

    public function data()
    {
      return false;
    }
  }

