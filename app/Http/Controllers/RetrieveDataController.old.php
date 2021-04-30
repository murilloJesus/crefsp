<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Image;
use App\Arquivo;
use App\Pagina;
use App\Tema;
use App\AcessoRapido;
use App\Video;
use App\Search;
use App\Categoria;

class RetrieveDataController extends Controller
{

    // HOME E MENU
    public function home()
    {

        $home = $this->recursiveHome(1, true);

        // dd($home);
        return View("home")->with('home', $home);

    }

    public function recursiveHome($id, $home = false)
    {
        $root =  Pagina::find($id);
        $root['seccionais'] =  Pagina::where('parent_id', '=', 14)->get();
        $root['menu'] =  $this->recursiveMenu($id, 2);

        // dd($root['menu']);

        if($home){
            $root['itens'] = $this->recursiveItensHome($id);
            $root['acessos'] = $this->recursiveAcessos();
            $root['categorias_eventos'] = $this->recursiveCategoriasEventos();
        }

        $root['tema'] = $this->recursiveTema($root['tema_id']);

        return $final = $root;
    }

    public function recursiveMenu($id, $recursive)
    {
        $descendants = Pagina::where(['parent_id' => $id, 'status' => true])->orderBy('indice', 'asc')->orderBy('id', 'asc')->get();

        $array = array();
        $i = 0;
        foreach ($descendants as $pagina) {
            $id = $pagina->id;

            $pagina = $this->recursiveFihosMenu($id, $recursive-1);

             $array[$i] = $pagina;

             $i++;
        }

        return $array;
    }

    public function recursiveFihosMenu($id, $recursive = 3)
    {
        $root =  Pagina::find($id);

            if($recursive != 0 ){

                $root['children'] = $this->recursiveMenu($id, $recursive);

            }

        return $final = $root;
    }

    // LAYOUT BUSCA
    public function busca($id){

        $original_id = $id;

        $id = explode('nº-', $id);

        if(isset($id[1])){
            $id[1] = str_replace('-', '/', $id[1]);

            $id = $id[0].'nº-'.$id[1];
        }else{
            $id = $id[0];
        }

        $id = str_replace('CREF4-SP', 'CREF4/SP', $id);
        $id = str_replace('-#-', '/', $id);
        $id = str_replace('-', ' ', $id);

        $data['paginas']['Páginas por Nome'] = Pagina::where('name', 'ILIKE', "%$id%")
                                            ->get();

        $data['paginas']['Páginas por Conteúdo'] = Pagina::where('template', 'ILIKE', "%$id%")
                                            ->get();

        $data['itens']['Itens por Nome'] = Item::where('name', 'ILIKE', "%$id%")
                                            ->get();

        $data['itens']['Itens por Conteúdo'] = Item::where('template', 'ILIKE', "%$id%")
                                            ->get();

        $categorias = Categoria::where('name', 'ILIKE', "%$id%")
                        ->get();

        foreach ($categorias as $cat ) {
            $data['itens'][ucfirst($cat->type).' por Categoria '.$cat->name] = Item::where('categoria', $cat->id)
                                            ->get();
        }

        // dd($data);

        $patch = array(
            array("link" => "", "nome" => "Busca" ),
            array("link" => "", 'nome' => $id)
            );

        $home = $this->recursiveHome(1);


        return View("busca")
        ->with('json', $data)
        ->with('home', $home)
        ->with('patch', $patch)
        ->with('permissoes', false);
    }

    //LAYOUT MAPA
    public function mapa_site()
    {

        $data = $this->recursiveMenu(1, -1);
        $home = $this->recursiveHome(1);
        $patch = array(
                        array("link" => "/", "nome" => "Home" ),
                        array("link" => "/mapa_site", "nome" => "Mapa do Site")
                        );
        // dd($data);

        if (!session()->has('logged_user')) {
            $permissoes = false;
        } else {
            $permissoes = session('permissoes');
            if($permissoes->paginas){
                $permissoes  = true;
            }else{
                $permissoes  = false;
            }
        }

        return View("mapa_site")
                ->with('json', $data)
                ->with('home', $home)
                ->with('patch', $patch)
                ->with('permissoes', $permissoes);

    }

    public function arvore_paginas()
    {

        $data = $this->recursiveMenu(1, -1);

        $data_null = $this->recursiveMenu(null, -1);
        $data_minus = $this->recursiveMenu(-1, -1);
        // dd($data);

        return View("paginas.arvore-paginas")
                ->with('array', $data)
                ->with('array_2', array_merge( $data_null, $data_minus) )
                ->with('permissoes', session('permissoes'));

    }

    // LAYOUT PAGINA

    public function layout($id)
    {

        $data = $this->recursivePaginas($id, 4, true);
        $home = $this->recursiveHome(1);
        $patch = $this->breadcrumbs($id);

        // dd($data);

        if (!session()->has('logged_user')) {
            $permissoes = false;
        } else {
            $permissoes = session('permissoes');
            if($permissoes->paginas){
                $permissoes  = true;
            }else{
                $permissoes  = false;
            }
        }

        return View("layout")
                ->with('json', $data)
                ->with('home', $home)
                ->with('patch', $patch)
                ->with('permissoes', $permissoes);

    }

    public function recursivePaginas($id, $recursive = 3, $get_itens = false)
    {
        $root =  Pagina::find($id);

        if($id == 8){

            $root['itens'] = [];
            $root['children'] = [
                [
                    'name' => 'Em Andamento',
                    'itens' => $this->recursiveItensLicitacaoAtiva($id),
                    'search' => [
                        'pesquisar' => true,
                        'categoria' => true,
                        'datarange' => true,
                    ]
                ],
                [
                    'name' => 'Encerrado',
                    'itens' => $this->recursiveItensLicitacaoInativa($id),
                    'search' => [
                        'pesquisar' => true,
                        'categoria' => true,
                        'datarange' => true,
                    ]
                ],
                [
                    'name' => 'Extrato',
                    'itens' => $this->recursiveItensLicitacaoExtrato($id),
                    'search' => [
                        'pesquisar' => true,
                        'categoria' => true,
                        'datarange' => true,
                    ]
                ]
            ];

         }
         elseif ($id == 9) {
            if($get_itens){
                $root['itens'] = $this->recursiveNoticias($id);
            }

            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['search'] = $root->search_id != '' ? Search::find($root->search_id) : false;

            if($recursive != 0 ){
                $root['children'] = $this->recursiveFilhos($id, $recursive);
            }
        }
        elseif($id == 10){

            $root['itens'] = [];
            $root['children'] = $this->recursiveMultimidias();
            // dd($root);

        }else if($id == 11){

            if($get_itens){
                $root['itens'] = $this->recursiveItensEventos($id);
            }

            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['search'] = $root->search_id != '' ? Search::find($root->search_id) : false;

            if($recursive != 0 ){
                $root['children'] = $this->recursiveFilhos($id, $recursive);
            }

        }else if($id == 13){

            $root['itens'] = [];
            $root['children'] = $this->recursiveVagas();

        }else if($id == 15){

            $root['itens'] = $this->recursiveMapas($id);
            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['search'] = $root->search_id != '' ? Search::find($root->search_id) : false;
            $root['children'] = $this->recursiveFilhos($id, $recursive);

        }else{

            if($get_itens){
                $root['itens'] = $this->recursiveItens($id);
            }

            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['search'] = $root->search_id != '' ? Search::find($root->search_id) : false;

            if($recursive != 0 ){
                $root['children'] = $this->recursiveFilhos($id, $recursive);
            }
        }


        return $final = $root;
    }

    public function recursiveFilhos($id, $recursive)
    {
        $descendants = Pagina::where(['parent_id' => $id, 'status' => true])->orderBy('indice', 'asc')->orderBy('id', 'asc')->get();

        if( count($descendants) < 1 ){
            return $this->recursivePaginasPessoas($id);
        }

        $array = array();
        $i = 0;
        foreach ($descendants as $pagina) {
            $id = $pagina->id;

            $pagina = $this->recursivePaginas($id, $recursive-1);

             $array[$i] = $pagina;

             $i++;
        }

        return $array;
    }



    public function item($id)
    {

        $root = $this->recursiveItem( Item::find($id) );

        if($root['type'] == 'noticia'){

            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['itens'] = $this->recursiveItensNoticia($root);

            $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../9-Notícias", "nome" => 'Notícias'),
                array("link" => "../noticia/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        }elseif($root['type'] == 'licitacao'){

            $root['template'] = $root['objeto'];
            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['itens'] = $this->recursiveItensLicitacao($root);

            $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../8-Licitações-e-Contratos", "nome" => 'Licitações e Contratos'),
                array("link" => "../licitacao/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        }elseif($root['type'] == 'vaga'){

            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['itens'] = $this->recursiveItensLicitacao($root);

            $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../13-Empregos-e-Concursos", "nome" => 'Empregos e Concursos'),
                array("link" => "../empregos_e_concursos/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        }elseif($root['type'] == 'clube'){

            $root['html'] = $root['template'] != null ? md5($id) : false;

            $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../12-Parceirias-e-Benefícios", "nome" => 'Parceirias e Benefícios'),
                array("link" => "../beneficio/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        }elseif($root['type'] == 'evento'){

            $root['itens'] = $this->recursiveItensEvento($root);
            $root['html'] = $root['template'] != null ? md5($id) : false;
            $root['template'] = $this->templateEvento($root);

            $palestrantes = $this->recursiveItensEventoPessoasLista($id);
            $inscricoes = $this->recursiveItensEventoAgendas($id);

            if(count($palestrantes) and count($inscricoes)){
                $root['children'] = [
                    [
                        "name" => "Palestras",
                        'html' => $root['palestras'] != null ? md5('palestras') : false,
                        'template' => $root['palestras'],
                    ],
                    [
                        "name" => "Palestrantes",
                        "itens" => $this->recursiveItensEventoPessoasLista($id),
                        "children" => $this->recursiveItensEventoPessoas($id)
                    ],
                    [
                        "name" => "Inscreva-se!",
                        "itens" => $this->recursiveItensEventoAgendas($id)
                    ]
                ];
            }else if(count($palestrantes)){
                $root['children'] = [
                    [
                        "name" => "Palestras",
                        'html' => $root['palestras'] != null ? md5('palestras') : false,
                        'template' => $root['palestras'],
                    ],
                    [
                        "name" => "Palestrantes",
                        "itens" => $this->recursiveItensEventoPessoasLista($id),
                        "children" => $this->recursiveItensEventoPessoas($id)
                    ]
                ];
            }else if(count($inscricoes)){
                $root['children'] = [
                    [
                        "name" => "Palestras",
                        'html' => $root['palestras'] != null ? md5('palestras') : false,
                        'template' => $root['palestras'],
                    ],
                    [
                        "name" => "Inscreva-se!",
                        "itens" => $this->recursiveItensEventoAgendas($id)
                    ]
                ];
            }else{
                $root['children'] = [
                    [
                        "name" => "Palestras",
                        'html' => $root['palestras'] != null ? md5('palestras')  : false,
                        'template' => $root['palestras'],
                    ]
                    ];
            }


             $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../11-Eventos", "nome" => 'Eventos'),
                array("link" => "../evento/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        }elseif($root['type'] == 'mapa'){

            $root['name'] = $root['local'];

            $root['children'] = [
                [
                    "name" => "Inscreva-se!",
                    "itens" => $this->recursiveItensEventoAgendas($id)
                ]
            ];

             $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../15-Unidades-Móveis", "nome" => 'Unidades Móveis'),
                array("link" => "../agenda/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        } else {

            $root['html'] = $root['template'] != null ? md5($id) : false;

            $patch = array(
                array("link" => "/", "nome" => "Home" ),
                array("link" => "../item/".$id.'-'.$this->replace_for_SEO($root->name), "nome" => $root->name)
                );

        }

        $home = $this->recursiveHome(1);

        return View("item")->with('json', $root)->with('home', $home)->with('patch', $patch)->with('permissoes', false);

    }



    public function recursiveAcessos()
    {
        $acessos = AcessoRapido::where('status', true)->orderBy('destaque', 'desc')->orderBy('popularidade', 'desc')->get();
        $array = array();
        $i = 0;
        foreach ($acessos as $acesso) {

            $acesso = $this->recursiveAcesso($acesso);
            $acesso['type'] = 'acesso';

             $array[$i] = $acesso;

             $i++;
        }

        return $array;
    }

    public function recursiveCategoriasEventos()
    {
        return  Categoria::where(['status' => true, 'type' => 'evento'])->orderBy('indice', 'asc')->take(4)->get();

    }

    public function recursiveAcesso($acesso)
    {
        $acesso['imagem'] = $this->recursiveImagem($acesso['image_id']);

        return $acesso;

    }

    public function recursiveMultimidias()
    {
        $multimidias = Item::where('pagina_id', '=', 10)->where('status', true)->get();

        $array = array();
        $i = 0;
        foreach ($multimidias as $item) {
            $id = $item->id;

            $pagina = [
               'name' => $item->name,
               'search' =>  [
                'pesquisar' => true,
                    ],
               'itens' => $this->recursiveItensItem($id)
            ];

            $array[$i] = $pagina;

            $i++;
        }

        return $array;
    }

    public function recursiveVagas()
    {
        $categorias = Categoria::where('type', '=', 'vaga')->get();
        $array = array();
        $i = 0;
        foreach ($categorias as $categoria) {
            $id = $categoria->id;

            $pagina = [
               'name' => $categoria->name,
               'search' =>  [
                'pesquisar' => true,
                'datarange' => true,
                    ],
               'itens' => $this->recursiveItensCategoria($id)
            ];

            $array[$i] = $pagina;

            $i++;
        }

        return $array;
    }

    public function recursiveItens($id)
    {
        $itens = Item::where('pagina_id', '=', $id)->where('status', true)->orderBy('indice', 'asc')->orderBy('datayy', 'desc')->orderBy('name', 'asc')->orderBy('data', 'desc')->orderBy('id', 'asc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveNoticias($id, $initial = 1)
    {
        if ($initial) {
            $itens = Item::where('pagina_id', '=', $id)->where('status', true)
                        ->take(100)
                        ->orderBy('data', 'desc')->orderBy('indice', 'asc')->orderBy('datayy', 'desc')->orderBy('name', 'asc')->orderBy('data', 'desc')
                        ->select('id', 'name',  'type', 'descricao', 'categoria', 'destaque', 'destaque_pequeno', 'destaque_medio', 'destaque_grande', 'imagem', 'data')
                        ->get();
        } else {
            $itens = Item::where('pagina_id', '=', $id)->where('status', true)
                            ->orderBy('data', 'desc')->orderBy('indice', 'asc')->orderBy('datayy', 'desc')->orderBy('name', 'asc')->orderBy('data', 'desc')
                            ->select('id', 'name', 'type','descricao', 'categoria', 'destaque', 'destaque_pequeno', 'destaque_medio', 'destaque_grande', 'imagem', 'data')
                            ->get();
        }


        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveItensEventos($id)
    {
        $itens = Item::where('pagina_id', '=', $id)->where('status', true)->orderBy('indice', 'asc')->orderBy('datayy', 'desc')->orderBy('data', 'asc')->orderBy('id', 'asc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveMapas($id)
    {
        $itens = Item::where('pagina_id', '=', $id)->where('status', true)->orderBy('datayy', 'desc')->orderBy('data', 'asc')->orderBy('id', 'asc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;
    }

    public function recursiveItensEventoPessoas($id)
    {
        $itens = Item::where(['item_id' =>  $id, 'type' => 'pessoa'])->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            if(!$item->template) continue;

            $item = $this->recursiveItemPessoa($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;
    }

    public function recursiveItensEventoPessoasLista($id)
    {
        $itens = Item::where(['item_id' =>  $id, 'type' => 'pessoa'])->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItemPessoa($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;
    }



    public function recursivePaginasPessoas($id)
    {
        $itens = Item::where(['pagina_id' =>  $id, 'type' => 'pessoa'])->orderBy('id', 'asc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            if(!$item->template) continue;

            $item = $this->recursiveItemPessoa($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;
    }

    public function recursiveItensEventoAgendas($id)
    {
        $itens = Item::where(['item_id' =>  $id, 'type' => 'agenda'])->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;
    }

    public function recursiveItensLicitacaoAtiva($id)
    {
        $itens = Item::where(['pagina_id' => $id, 'status' => true, 'extrato' => false])->orderBy('data', 'desc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveItensLicitacaoInativa($id)
    {
        $itens = Item::where(['pagina_id' => $id, 'status' => false])->orderBy('data', 'desc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }
    public function recursiveItensLicitacaoExtrato($id)
    {
        $itens = Item::where(['pagina_id' => $id, 'extrato' => true])->orderBy('data', 'desc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveItensItem($id)
    {
        $itens = Item::where('item_id', '=', $id)->where('status', true)->orderBy('id', 'desc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;
    }

    public function recursiveItensCategoria($id)
    {
        $itens = Item::where('categoria', '=', $id)->where('status', true)->orderBy('data', 'asc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveItensEvento($item)
    {

        $array = array();
        $i = 0;

        if(isset($item['image_id']) and $item['image_id'] ){
            $banner = [
                'type' => 'banner',
                'image_id' => $item['image_id']
            ];

            $array[$i] = $this->recursiveItem($banner);
            $i++;
        }

        return $array;

    }

    public function recursiveItensNoticia($item)
    {
        $itens = Item::where('item_id', '=', $item['id'])->where('status', true)->get();

        $array = array();
        $i = 0;

        foreach ($itens as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
        }

        if(isset($item['image_id']) and $item['image_id'] ){
            $banner = [
                'type' => 'banner',
                'image_id' => $item['image_id']
            ];

            $array[$i] = $this->recursiveItem($banner);
            $i++;
        }

        if(isset($item['galeria_id']) and $item['galeria_id'] ){
            $array[$i] = $this->recursiveGaleria($item['galeria_id']);
            $i++;
        }

        return $array;

    }

    public function recursiveItensLicitacao($item)
    {
        $arquivos = Arquivo::where('item_id', '=', $item['id'])->orderBy('id', 'desc')->get();

        $array = array();
        $i = 0;

        foreach ($arquivos as $arquivo) {

            $item = [
                "type" => "arquivo",
                "arquivo_id" => $arquivo['id'],
                "name" => $arquivo['name'],
                "arquive" => "pdf",
                "source" => $arquivo['source']
            ];

             $array[$i] = $item;

             $i++;
        }

        return $array;

    }

    public function recursiveVideos()
    {
        $videos = Item::where('type', '=' , 'video')->where('item_id', '!=', 9337)->where('status', true)->take(4)->orderBy('id', 'desc')->get();
        $array = array();
        $i = 0;
        foreach ($videos as $video) {
            $array[$i] = $video;
             $i++;
        }

        return $array;
    }

    public function recursiveItensHome($id)
    {
        $itens[0] = Item::where('type', 'noticia')->where('status', true)->take(7)->orderBy('data', 'desc')->get();
        $itens[1] = Item::where('type', 'evento')->where('status', true)->take(20)->orderBy('data', 'asc')->get();
        $itens[2] = Item::where('pagina_id', $id)->where('status', true)->orderBy('id', 'desc')->get();

        $array = array();
        $i = 0;
        foreach ($itens as $items) {
            foreach ($items as $item) {

            $item = $this->recursiveItem($item);

             $array[$i] = $item;

             $i++;
            }
        }

        $videos = $this->recursiveVideos();

        return array_merge($array, $videos);

    }

    public function recursiveItem($item)
    {
        $item['html'] = (isset($item['template']) and $item['template'] != null) ? md5($item['name'].$item['id']) : false;
        $item['imagem'] =   isset($item['image_id'])  ? $this->recursiveImagem($item['image_id']) : '';
        $item['destaque_pequeno'] =   isset($item['destaque_pequeno'])  ? $this->recursiveImagem($item['destaque_pequeno']) : '';
        $item['destaque_medio'] =   isset($item['destaque_medio'])  ? $this->recursiveImagem($item['destaque_medio']) : '';
        $item['destaque_grande'] =   isset($item['destaque_grande'])  ? $this->recursiveImagem($item['destaque_grande']) : '';
        $item['categoria'] =   (isset($item['categoria']) and $item['categoria']) ? $this->recursiveCategoria($item['categoria'])['name'] : '';
        $item['cidade'] = $this->recursiveCidade($item);
        // $item['flash'] =  isset($item['flash'])  ? $this->recursiveArquivo($item['flash']) : '';
        $item['zip'] =  isset($item['zip'])  ? $this->recursiveArquivo($item['zip']) : '';
        $item['pdf'] =  isset($item['pdf'])  ? $this->recursiveArquivo($item['pdf']) : '';
        $item['video'] =  isset($item['video'])  ? Item::where('id', $item['video'])->get()->first()  : '';
        $item['arquivo'] =  isset($item['arquivo_id'])  ? $this->recursiveArquivo($item['arquivo_id']) : '';
        $item['itens'] = isset($item['id']) ? $this->recursiveItensItem($item['id']) : '';
        return $item;

    }

    public function recursiveCidade($item)
    {
        if(isset($item['cidade'])){
            if(is_numeric($item['cidade'])){
                return $item->f_cidade->name;
            }else{
                return $item['cidade'];
            }
        }

        return '';
    }

    public function recursiveItemPessoa($item)
    {
        $item['html'] = (isset($item['template']) and $item['template'] != null) ? md5($item['name'].$item['id']) : false;
        $item['imagem'] =   isset($item['image_id'])  ? $this->recursiveImagem($item['image_id']) : '';
        $item['itens'] = $this->recursiveItensEvento($item);
        return $item;
    }

    public function recursiveGaleria($id)
    {
       if($id){
            $galeria =  Item::where('id', '=', $id)->get()->first();
            $galeria['images'] = Image::where('galeria_id', '=', $id)->get();
            return $galeria;
       }
       return '';
    }


    public function recursiveImagem($id)
    {
       if($id){
            return Image::where('id', '=', $id)->get()->first();
       }
       return '';
    }

    public function recursiveArquivo($id)
    {
       if($id){
            return Arquivo::where('id', '=', $id)->get()->first();
       }
       return '';
    }

    public function recursiveCategoria($id)
    {
       if(is_numeric($id)){
            return Categoria::where('id', '=', $id)->get()->first();
       } else {
            return ['name' => $id];
       }
       return '';
    }

    public function recursiveTema($id)
    {
       if($id){
            $tema = Tema::where('id', '=', $id)->get()->first();
            $tema['head'] = $this->recursiveImagem($tema['head']);
            $tema['foot'] = $this->recursiveImagem($tema['foot']);
            return $tema;
       } else{
            $tema = Tema::get()->first();
            $tema['head'] = $this->recursiveImagem(125);
            $tema['foot'] = $this->recursiveImagem(126);
            return $tema;
       }
    }

    private function replace_for_SEO ($name){
        $retorno = str_replace(' ', '-', $name);
        $retorno = str_replace('/', '-', $retorno);

        return $retorno;
    }

    private function breadcrumbs($id){

        $i = 8;
        $array = array();

        while($id and $id != 1){
            $pagina = Pagina::find($id);
            $array[$i--] = array("link" => "/".$id.'-'.$this->replace_for_SEO($pagina->name), "nome" => $pagina->name);
            $id = $pagina->parent_id;

        }
        $array[0] = array("link" => "/", "nome" => "Home" );

        return array_reverse($array);
    }

    //API

    public function getItems($id)
    {
        return json_encode($this->recursiveItens($id));
    }


    //ALTERAÇÔES DE TEMPLATE

    private function templateEvento($item)
    {
        $retorno = '';
        if($item['cidade']){
            $retorno .= "<p> <b class='red'>Cidade:</b> ".$item['cidade']." </p>";
        }
        if($item['local']){
            $retorno .= "<p> <b class='red'>Local: </b> ". $item['local']." </p>";
        }
        if($item['endereco']){
            $retorno .= "<p> <b class='red'>Complemento: </b> ". $item['endereco']." </p>";
        }
        $retorno .= $item['template'];

        return $retorno;
    }

}
