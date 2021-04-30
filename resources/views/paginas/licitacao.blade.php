@extends('elementos.templates')

@section('content')
<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-licitacao-item
    :controller="this"
    ></gerenciar-licitacao-item>
  </div>
</div>

@stop