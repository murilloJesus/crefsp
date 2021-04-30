@extends('elementos.templates')

@section('content')
<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-vaga-item :controller="this">
    </gerenciar-vaga-item>
  </div>
</div>

@stop