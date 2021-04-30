<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['UserSession']], function () {

    Route::get('/logs-pagina', 'Controller@logs');


    Route::post('/usuario', 'AuthController@store');
    Route::post('/update-usuario', 'AuthController@update');
    Route::get('/usuarios', 'AuthController@index');
    Route::get('/usuario/{id}', 'AuthController@show');
    Route::get('/usuario/delete/{id}', 'AuthController@destroy');
    Route::get('/logoutUser', 'AuthController@logout');
    Route::get('/mudarSenha', 'AuthController@mudarSenha');

    Route::get('/cidades', 'CidadeController@index');
    Route::get('/cidade/{id}', 'CidadeController@show');

    // ITEM
    Route::post('/item', 'ItemController@store');
    Route::post('/items', 'ItemController@storeDiversos');
    Route::get('/items', 'ItemController@index');
    Route::post('/item/update', 'ItemController@update');
    Route::get('/item/{id}', 'ItemController@show');
    Route::get('/item/delete/{id}', 'ItemController@destroy');
    Route::get('/item/item/{id}', 'ItemController@itemsFilhoItem');
    Route::get('/item/item/clone/{id_de}/{id_para}', 'ItemController@cloneItemItem');
    Route::get('/item/pagina/{id}', 'ItemController@itemsFilhoPagina');
    Route::get('/item/pagina/clone/{id_de}/{id_para}', 'ItemController@cloneItemPagina');

    
    
    // LISTA DE ITENS IDENTIFICADOS
    Route::get('/noticias', 'ItemController@itemByTypeNoticia');
    Route::get('/eventos', 'ItemController@itemByTypeEvento');
    Route::get('/licitacoes', 'ItemController@itemByTypeLicitacao');
    Route::get('/vagas', 'ItemController@itemByTypeVaga');
    Route::get('/pessoas', 'ItemController@itemByTypePessoa');
    Route::get('/palestrantes', 'ItemController@itemByTypePalestrante');
    Route::get('/galerias', 'ItemController@itemByTypeGaleria');
    Route::get('/clube', 'ItemController@itemByTypeClube');
    Route::get('/banner', 'ItemController@itemByTypeBanner');
    Route::get('/unidades', 'ItemController@itemByTypeMapa');
    Route::get('/videos', 'ItemController@itemByTypeVideo');
    Route::get('/multimidia', 'ItemController@itemByTypeMultimidia');
    Route::get('/licitacao-false', 'ItemController@itemByTypeLicitacaoStatusFalso');
    Route::get('/eventos_unidades', 'ItemController@itemByTypeEventoUnidades');
    Route::get('/agendas', 'ItemController@itemByTypeAgenda');
    
    
    // IMAGEM
    Route::post('/upload', 'ImageController@store');
    Route::post('/imagem/update', 'ImageController@update');
    Route::get('/imagens', 'ImageController@index');
    Route::get('/imagem/{id}', 'ImageController@show');
    Route::get('/imagem/delete/{id}', 'ImageController@delete');
    Route::get('/imagens/galeria/{id}', 'ImageController@imagensByGaleria');
    Route::post('/upload-url', 'ImageController@imageUrl');
    Route::post('/update-image-url', 'ImageController@updateImageUrl');
    Route::get('/delete-imagem-url/{id}', 'ImageController@deleteImageUrl');
    
    // ACESSO RAPIDO
    Route::get('/acessos', 'AcessoRapidoController@index');
    Route::post('/acesso', 'AcessoRapidoController@store');
    Route::post('/acesso/update', 'AcessoRapidoController@update');
    Route::get('/acesso/{id}', 'AcessoRapidoController@show');
    Route::get('/acesso/delete/{id}', 'AcessoRapidoController@delete');
    
    // BUSCA
    Route::post('/busca', 'SearchController@store');
    Route::post('/busca/update', 'SearchController@update');
    Route::get('/busca/{id}', 'SearchController@show');
    Route::get('/busca/delete/{id}', 'SearchController@delete');
    
    // PAGINAS
    Route::get('/pagina/arvore', 'PaginaController@recursivePaginas');
    Route::get('/paginas', 'PaginaController@index');
    Route::get('/paginas/templates', 'PaginaController@indexTemplates');
    Route::get('/paginas/{id}', 'PaginaController@indexFilhos');
    Route::post('/pagina', 'PaginaController@store');
    Route::get('/pagina/{id}', 'PaginaController@show');
    Route::get('/pagina/delete/{id}', 'PaginaController@delete');
    Route::post('/pagina/update/', 'PaginaController@update');
    Route::get('/pagina/estrutura/{id}', 'PaginaController@recursivePaginas');
    Route::get('/pagina/clone/{id_de}/{id_para}', 'PaginaController@clonePagina');
    Route::post('/pagina/update-arvore', 'PaginaController@updateArvore');
    
    // CATEGORIAS
    Route::get('/categorias', 'CategoriaController@index');
    Route::get('/categorias/{type}', 'CategoriaController@categoriaByType');
    Route::post('/categoria', 'CategoriaController@store');
    Route::get('/categoria/{id}', 'CategoriaController@show');
    Route::post('/categoria/update', 'CategoriaController@update');
    Route::get('/categoria/delete/{id}', 'CategoriaController@delete');
    
    
    // TEMPLATES
    Route::get('/templates', 'TemplateController@index');
    Route::get('/template/{id}', 'TemplateController@show');
    Route::get('/template/delete/{id}', 'TemplateController@delete');
    Route::post('/template/update/', 'TemplateController@update');
    Route::post('/template', 'TemplateController@store');
    
    
    // ARQUIVO
    Route::get('/arquivos', 'ArquivoController@index');
    Route::post('/arquivo', 'ArquivoController@store');
    Route::post('/arquivos', 'ArquivoController@storeDiversos');
    Route::get('/arquivo/{id}', 'ArquivoController@show');
    Route::get('/arquivos', 'ArquivoController@index');
    Route::get('/arquivo/delete/{id}', 'ArquivoController@delete');
    Route::post('/arquivo/update', 'ArquivoController@update');
    Route::get('/arquivos/item/{id}', 'ArquivoController@arquivoByItem');
    Route::get('/arquivos/pagina/{id}', 'ArquivoController@arquivoByPagina');
    Route::get('/arquivo/item/clone/{id_de}/{id_para}', 'ArquivoController@cloneItem');
    Route::get('/arquivo/pagina/clone/{id_de}/{id_para}', 'ArquivoController@clonePagina');

    
    
    // TEMA
    Route::post('/tema', 'TemaController@store');
    Route::post('/update-tema', 'TemaController@update');
    Route::get('/temas', 'TemaController@index');
    Route::get('/tema/{id}', 'TemaController@show');
    Route::get('/tema/delete/{id}', 'TemaController@destroy');
    
    // PERMISSOES
    Route::post('/permissao', 'PermissoeController@store');
    Route::get('/permissoes', 'PermissoeController@index');
    Route::get('/permissao/{id}', 'PermissoeController@show');
    Route::get('/permissao/delete/{id}', 'PermissoeController@destroy');
    Route::post('/permissao/update', 'PermissoeController@update');
    
    // FORMULARIOS
    Route::get('/formularios', 'FormularioController@index');
    Route::get('/formularios-pagina', 'FormularioController@byPage');
    Route::get('/formulario/{id}', 'FormularioController@show');
    Route::get('/formulario/delete/{id}', 'FormularioController@destroy');
    Route::post('/formulario/update', 'FormularioController@update');
    Route::get('/formulario/agenda/{id}', 'FormularioController@agenda');

    
    // DUMP
    // Route::get('/dump', 'ControllerDump@dump');
    // Route::post('/dump', 'ControllerDump@dumpDataBase');
    
    //CIDADES
    Route::get('/dump/{senha}/cidades', 'CidadeController@dump');
    
    // DUMP XML ASSOCIADOS
    Route::get('/upload/xml', function () {
        return view('upload-xml');
    });
    
    Route::post('/upload/xml/submit', 'Controller@uploadXml');

    // // DUMP FACULDADES
    // Route::get('/dump/faculdades', 'FaculdadeController@dump');

    // Route::get('/replace/item/arquivo', 'ItemController@mudar_arquivos');
    // Route::get('/replace/pagina/arquivo', 'PaginaController@mudar_arquivos');
});


// Route::get('/admin', function () {
//     return view('paginas.home');
// });
