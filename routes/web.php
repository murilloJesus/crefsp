<?php

// Route::post('dd', 'Controller@dumpanddie');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('usuarios', ['as' => 'users.index', 'uses' => 'MainController@index']);

Route::get('/admin/login', function () {
    return view('auth.login');
});

Route::get('/admin/login/reset', function () {
    return view('auth.confirmar-email');
});
Route::post('/admin/login/redefinir-senha', 'RecuperarSenhaController@submit');
Route::get('/admin/login/reset/confirmar-senha', 'RecuperarSenhaController@novaSenha');
Route::post('/admin/verificar/login', 'AuthController@login');
Route::get('/admin/login/reset/{token}', 'RecuperarSenhaController@checkUserByToken');


Route::get('/admin', 'Controller@home')->middleware(['UserSession']);

// Route::get('/admin', function () {
//     return view('paginas.home')->with('permissoes', session('permissoes'));
// })->middleware(['UserSession']);

Route::prefix('admin')->group(function(){

    Route::get('/arvore-paginas', 'RetrieveDataController@arvore_paginas')->middleware(['UserSession']);

    Route::get('/{page}', function ($page) {
         return view('paginas.'.$page)->with('permissoes', session('permissoes'));
    })->middleware(['UserSession']);

    Route::get('/{page}/{id}', function ($page, $id) {

        if($id == 8) return view('paginas.licitacao')->with('permissoes', session('permissoes'));
        if($id == 9) return view('paginas.noticia')->with('permissoes', session('permissoes'));
        if($id == 10) return view('paginas.multimidia')->with('permissoes', session('permissoes'));
        if($id == 11) return view('paginas.evento')->with('permissoes', session('permissoes'));
        if($id == 12) return view('paginas.beneficio')->with('permissoes', session('permissoes'));
        if($id == 13) return view('paginas.vaga')->with('permissoes', session('permissoes'));
        if($id == 15) return view('paginas.unidade')->with('permissoes', session('permissoes'));

        return view('paginas.'.$page)->with('permissoes', session('permissoes'))->with('editar', $id);
    })->middleware(['UserSession']);

});





Route::get('/{id}-{slug}', 'RetrieveDataController@layout');
Route::get('/item/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/noticia/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/evento/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/licitacao/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/empregos_e_concursos/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/beneficio/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/unidades/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/link/{id}-{slug}', 'RetrieveDataController@item');
Route::get('/busca/{id}', 'RetrieveDataController@busca');
Route::get('/mapa_site', 'RetrieveDataController@mapa_site');



Route::get('/', 'RetrieveDataController@home');
Route::get('/{id}', 'RetrieveDataController@layout');
Route::get('/item/{id}', 'RetrieveDataController@item');
Route::get('/noticia/{id}', 'RetrieveDataController@item');
Route::get('/evento/{id}', 'RetrieveDataController@item');
Route::get('/licitacao/{id}', 'RetrieveDataController@item');
Route::get('/empregos_e_concursos/{id}', 'RetrieveDataController@item');
Route::get('/beneficio/{id}', 'RetrieveDataController@item');
Route::get('/unidades/{id}', 'RetrieveDataController@item');
Route::get('/link/{id}', 'RetrieveDataController@item');
Route::get('/updateData/{id}/{initial}', 'RetrieveDataController@recursiveNoticias');
Route::get('/getChilds/{id}', 'RetrieveDataController@recursiveFilhos');



//requests
Route::get('/acessos/count/{id}', 'AcessoRapidoController@count');
Route::get('/associados/find/{registro}/{cpf}', 'Controller@hasAssociado');
Route::get('/agenda/debitar/{item_id}/{tipo_inscricao}', 'Controller@debitar');
Route::post('/ticket', 'FormularioController@ticket');
Route::post('/formulario', 'FormularioController@store');
Route::get('/get/itens/{id}', 'RetrieveDataController@getItems');
