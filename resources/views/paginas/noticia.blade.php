@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-noticia-item :controller="this">
    </gerenciar-noticia-item>
  </div>
  <!-- Modal para upload de imagem -->
</div>

@stop