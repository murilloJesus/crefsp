<?php

namespace App\Http\Controllers;

use App\Item;
use App\Categoria;
use App\Image;
use App\Log;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function itemsFilhoItem($id){
        $item = Item::where('item_id', '=', $id)->orderBy('indice', 'asc')->orderBy('id', 'asc')->get();
        if ($item->count()) {
            return $item;
        }
        return [];
    }

    public function itemsFilhoPagina($id){
        $item = Item::where('pagina_id', '=', $id)->orderBy('indice', 'asc')->orderBy('id', 'asc')->get();
        if ($item->count()) {
            return $item;
        }
        return [];
    }


    public function itemByTypeNoticia()
    {
        $noticias = Item::where('type', '=', 'noticia')->orderBy('id', 'desc')->get();
        if ($noticias->count()) {
            return $noticias;
        }
        return [];
    }

    public function itemByTypeEvento()
    {
        $evento = Item::where(['type' => 'evento', 'referencia_id' => null])->orderBy('id', 'desc')->get();
        if ($evento->count()) {
            return $evento;
        }
        return [];
    }


    public function itemByTypeEventoUnidades()
    {
        $evento = Item::where(['type' => 'evento'])->orWhere('type', 'mapa')->orderBy('id', 'desc')->get();
        if ($evento->count()) {
            return $evento;
        }
        return [];
    }


    public function itemByTypeLicitacao()
    {
        $licitacao = Item::where(['type' => 'licitacao', 'referencia_id' => null])->orderBy('data', 'desc')->get();
        if ($licitacao->count()) {
            return $licitacao;
        }
        return [];
    }

    public function itemByTypeLicitacaoStatusFalso()
    {
        $where = ['type' => 'licitacao', 'status' => false];
        $licitacao = Item::where($where)->get();

        if ($licitacao->count()) {
            return $licitacao;
        }
        return [];
    }

    public function itemByTypeVaga()
    {
        $vaga = Item::where('type', '=', 'vaga')->orderBy('id', 'desc')->get();
        if ($vaga->count()) {
            return $vaga;
        }
        return [];
    }

    public function itemByTypePessoa()
    {
        $pessoa = Item::where(['type' => 'pessoa', 'referencia_id' => null, 'pagina_id' => null, 'item_id' => null])->orderBy('name', 'asc')->get();
        if ($pessoa->count()) {
            return $pessoa;
        }
        return [];
    }

    public function itemByTypePalestrante()
    {
        $pessoa = Item::where(['type' => 'pessoa', 'referencia_id' => null, 'destaque' => true])->orderBy('name', 'asc')->get();
        if ($pessoa->count()) {
            return $pessoa;
        }
        return [];
    }

    public function itemByTypeGaleria()
    {
        $galeria = Item::where('type', '=', 'galeria')->orderBy('id', 'desc')->get();
        if ($galeria->count()) {
            return $galeria;
        }
        return [];
    }

    public function itemByTypeClube()
    {
        $clube = Item::where('type', '=', 'clube')->orderBy('id', 'desc')->get();
        if ($clube->count()) {
            return $clube;
        }
        return [];
    }

    public function itemByTypeBanner()
    {
        $banner = Item::where('type', '=', 'banner')->orderBy('id', 'desc')->get();
        if ($banner->count()) {
            return $banner;
        }
        return [];
    }

    public function itemByTypeVideo()
    {
        $video = Item::where(['type' => 'video', 'referencia_id' => null])->orderBy('name', 'asc')->get();
        if ($video->count()) {
            return $video;
        }
        return [];
    }


    public function itemByTypeMapa()
    {
        $mapa = Item::where('type', '=', 'mapa')->orderBy('id', 'desc')->get();
        if ($mapa->count()) {
            return $mapa;
        }
        return [];
    }

    public function itemByTypeMultimidia()
    {
        $multimidia = Item::where('type', '=', 'multimidia')->orderBy('id', 'desc')->get();
        if ($multimidia->count()) {
            return $multimidia;
        }
        return [];
    }

    public function itemByTypeAgenda()
    {
        $agenda = Item::where('type', '=', 'agenda')->orderBy('id', 'desc')->get();
        if ($agenda->count()) {
            return $agenda;
        }
        return [];
    }

    public function store(Request $request)
    {
        $item = $this->getFromRequest($request);

        if( $item->type == 'noticia' && $item->autor === ''){
            $item->autor = session('nome');
        }

        if ($item->save()) {

                $usuario = session('nome');
                $tipo = 'create';
                $log = "Usuario $usuario criou ".$this->formatar_tipo($item->type)." #$item->id ";
                $this->log($usuario, $tipo, $log);

             $response = [
                'status' => '200',
                'data' => $item
            ];

            return $response;

        }
        return json_encode(['status' => '500']);
    }

    public function storeDiversos(Request $request)
    {
        $itens = $request->get('itens');

        foreach ($itens as $item) {

            if( isset($item['categoria']) ){

                $item['categoria'] = $this->insertRecursiveCategoria($item['categoria']);

            }

            if( isset($item['image_id']) ){

            $item['image_id'] = $this->insertRecursiveImage($item['image_id']);

            }

            Item::create($item);

        }

        return json_encode(['status' => '200']);
    }

    public function show($item)
    {
        $item = Item::find($item);
        return [
            'item' => $item,
            'imagem' => $item->image,
            'pdf' => $item->pdfs,
            'flash' => $item->flashs,
            'zip' => $item->zips,
            'video' => $item->videos,
        ];
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $item_id = Item::where('id', $id)->get()->first();

        if ($item_id) {

            $update = $request->all();
            $item_id->update($update);

                $usuario = session('nome');
                $tipo = 'update';
                $log = "Usuario $usuario atualizou ".$this->formatar_tipo($item_id->type)." #$id";
                $this->log($usuario, $tipo, $log);

            return ['status' => '200'];
        }
        return ['status' => '500'];

    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if (!is_null($item)) {
            $item->delete();
            $this->deleteRecursive($id);
                $usuario = session('nome');
                $tipo = 'delete';
                $log = "Usuario $usuario deletou ".$this->formatar_tipo($item->type)." #$id";
                $this->log($usuario, $tipo, $log);
            return json_encode(['status' => '200']);
        } else {
            return json_encode(['status' => '404']);
        }
    }

    public function deleteRecursive($id)
    {
        $itens = Item::where('item_id', $id)->get();

        foreach($itens as $item){
            $this->destroy($item->id);
        }

        return true;
    }


    public function cloneItemItem($id_de, $id_para)
    {
        $itens = Item::where('item_id', $id_de)->get();

        foreach($itens as $item){
            unset($item['id']);
            $item['item_id'] = $id_para;
            $item->create($item->attributesToArray());
        }

        return json_encode(['status' => '200']);
    }

    public function cloneItemPagina($id_de, $id_para)
    {
        $itens = Item::where('pagina_id', $id_de)->get();

        foreach($itens as $item){
            unset($item['id']);
            $item['pagina_id'] = $id_para;
            $item->create($item->attributesToArray());
        }

        return json_encode(['status' => '200']);
    }

    private function getFromRequest(Request $request)
    {
     return new Item($request->all());
    }

    private function getFromObject($obj)
    {
     return new Item([
          "pagina_id" => $obj->pagina_id,
          "item_id" => $obj->item_id,
          "referencia_id" => $obj->referencia_id,
          "arquivo_id" => $obj->arquivo_id,
          "image_id" => $obj->image_id,
          "status" => $obj->status,
          "type" => $obj->type,
          "icone" => $obj->icone,
          "arquive" => $obj->arquive,
          "name" => $obj->name,
          "source" => $obj->source,
          "href" => $obj->href,
          "imagem" => $obj->imagem,
          "categoria" => $obj->categoria,
          "cidade" => $obj->cidade,
          "datamm" => $obj->datamm,
          "datayy" => $obj->datayy,
          "data" => $obj->data,
          "flash" => $obj->flash,
          "video" => $obj->video,
          "zip" => $obj->zip,
          "pdf" => $obj->pdf,
          "descricao" => $obj->descricao,
          "template" => $obj->template,
          "atividade" => $obj->atividade,
          "autor" => $obj->autor,
          "endereco" => $obj->endereco,
          "local" => $obj->local,
          "site" => $obj->site,
          "telefone" => $obj->telefone,
          "cargo" => $obj->cargo,
          "doc" => $obj->doc,
          "credencial" => $obj->credencial,
          "formato" => $obj->formato,
          "numero" => $obj->numero,
          "processo" => $obj->processo,
          "latitude" => $obj->latitude,
          "longitude" => $obj->longitude,
          "destaque" => $obj->destaque,
          "obrigatorio" => $obj->obrigatorio,
          "ticket_publico" => $obj->ticket_publico,
          "ticket_estudante" => $obj->ticket_estudante,
          "ticket_credenciado" => $obj->ticket_credenciado,
          "externo_id" => $obj->externo_id,
          "externo_pai_id" => $obj->externo_pai_id,
     ]);
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

    public function insertRecursiveImage($src)
    {

        $imagem = new Image();
        $imagem->source = $src;

        $imagem->save();

        return $imagem->id;

    }

    private function formatar_tipo($tipo){
        if($tipo == 'mapa') return 'Unidade Móvel';
        if($tipo == 'noticia') return 'Notícia';
        if($tipo == 'pessoa') return 'Pessoa';
        if($tipo == 'editorial') return 'Editorial';
        if($tipo == 'accordion') return 'Accordion';
        if($tipo == 'banner') return 'Banner';
        if($tipo == 'arquivo') return 'Arquivo';
        if($tipo == 'link') return 'Link';
        if($tipo == 'template') return 'Link Interno';
        if($tipo == 'evento') return 'Evento';
        if($tipo == 'input') return 'Input para Formulário';
        if($tipo == 'agenda') return 'Agenda de Inscrições';
        if($tipo == 'agenda') return 'Agenda de Inscrições';
        if($tipo == 'video') return 'Video';
        if($tipo == 'multimidia') return 'Multimidia';
        if($tipo == 'vaga') return 'Vaga';
        if($tipo == 'clube') return 'Benefício';
        if($tipo == 'licitacao') return 'Licitação';
        return $tipo;
    }

    private function log($nome, $tipo, $log){
        $loggin = new Log;

        $loggin->usuario = $nome;
        $loggin->tipo = $tipo;
        $loggin->log = $log;

        $loggin->save();
    }

    // public function mudar_arquivos()
    // {
    //     $itens = Item::where('type', 'noticia')->get();

    //     foreach($itens as $item){
    //         // if($item->descricao){
    //         //     $aux = explode('<', $item->descricao);
    //         //     $item->descricao = $aux[0];
    //         // }

    //         if($item->template){
    //             // $item->template = str_replace('p style="text-align: justify;">(Revogada', 'Revogada', $item->template );
    //             // $item->template = str_replace('%', '-', $item->template );
    //             $item->template = str_replace('href="https://www.crefsp.gov.br/', '_href="https://www.crefsp.gov.br/', $item->template );
    //             $item->template = str_replace('href="http://localhost/', '_href="http://localhost/', $item->template );
    //         }

    //         if($item->template){
    //             $item->update();
    //         }


    //     }

    //     return json_encode(['status' => '200']);

    // }

}
