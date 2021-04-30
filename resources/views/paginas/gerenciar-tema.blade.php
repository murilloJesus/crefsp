@extends('elementos.templates')

@section('content')


        <div id="app" class="container-fluid">
          <div class="animated fadeIn">
            <gerenciar-tema-item
            :controller="this"
            ></gerenciar-tema-item>
          </div>
        </div>

@stop