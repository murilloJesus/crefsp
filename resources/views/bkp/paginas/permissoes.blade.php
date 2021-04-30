@extends('elementos.templates')

@section('content')
<div id="app" class="container-fluid">
  <div class="animated fadeIn">
    <gerenciar-permissoes-item :controller="this"></gerenciar-permissoes-item>
  </div>
</div>
@stop