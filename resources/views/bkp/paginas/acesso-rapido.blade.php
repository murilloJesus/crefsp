@extends('elementos.templates')

@section('content')
<div id="app" class="container-fluid">
  <div class="animated fadeIn">
      <gerenciar-acesso-rapido-item
      :controller="this"
      ></gerenciar-acesso-rapido-item>
    </ul>
  </div>
</div>
@stop
