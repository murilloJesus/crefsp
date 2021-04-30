@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-pessoas-item
    :controller="this"
    ></gerenciar-pessoas-item>
  </div>
</div>

@stop