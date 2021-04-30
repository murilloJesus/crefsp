@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-banner-item
    :controller="this"
    ></gerenciar-banner-item>
  </div>
</div>

@stop