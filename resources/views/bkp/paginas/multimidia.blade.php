@extends('elementos.templates')

@section('content')


<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-multimidia-item
      :controller="this"
    ></gerenciar-multimidia-item>
  </div>
</div>


@stop