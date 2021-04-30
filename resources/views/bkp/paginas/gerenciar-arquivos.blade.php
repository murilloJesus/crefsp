@extends('elementos.templates')


@section('content')
<div id="app" class="container-fluid">
  <div class="animated fadeIn">
      <gerenciar-arquivos-item
      :controller="this"
      ></gerenciar-arquivos-item>
  </div>
</div>

@stop