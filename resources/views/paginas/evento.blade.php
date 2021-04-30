
@extends('elementos.templates')

@section('content')

<div id="app" class="container-fluid">
  <div class="animated fadeIn">
  	<gerenciar-evento-item
  	:controller="this"
  	></gerenciar-evento-item>
	</div>
</div>

@stop