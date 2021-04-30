@extends('elementos.templates')

@section('content')
<div id="app" class="container-fluid">
  <div class="animated fadeIn">
            <gerenciar-home-item
            :controller="this"
            ></gerenciar-home-item>
  </div>
</div>
@stop