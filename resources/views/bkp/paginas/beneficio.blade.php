@extends('elementos.templates')

@section('content')

<div class="container-fluid">
  <div id="app" class="animated fadeIn">
    <gerenciar-clube-item
    :controller="this"
    ></gerenciar-clube-item>
  </div>
</div>

@stop