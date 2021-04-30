@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-formularios-item
    :controller="this"
    ></gerenciar-formularios-item>
  </div>
</div>

@stop