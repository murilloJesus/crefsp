@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-agenda-item
    :controller="this"
    ></gerenciar-agenda-item>
  </div>
</div>

@stop