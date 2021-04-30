@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-galerias-item
    :controller="this"
    ></gerenciar-galerias-item>
  </div>
</div>

@stop