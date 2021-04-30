@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-logs-item
    :controller="this"
    ></gerenciar-pagina-item>
  </div>
</div>
@stop