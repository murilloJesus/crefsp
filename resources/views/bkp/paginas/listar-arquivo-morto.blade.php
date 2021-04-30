@extends('elementos.templates')

@section('content')

<div id="app_tabela" class="container-fluid">
  <div class="animated fadeIn">
    <ul class="list-group">
      <li class="list-group-item">
        <h3> Licitações </h3>
        <pesquisa-item
          :controller="controller"
          :data="pesquisa"
          :output="output"
        >
        </pesquisa-item>
      </li>
      <li class="list-group-item">
        <tabela-item 
          :data="tabela"
          >
        </tabela-item>
        <paginator-item
          :controller="controller"
          >
        </paginator-item>
      </li>
    </ul>
  </div>
</div>

<script type="text/javascript">
  var resource = {
      href : 'http://localhost/admin/public/admin/arquivo-licitacoes',
      colunas : ['#', 'Objeto', 'Número', 'Processo', 'Abertura', 'Local'],
      linhas :  ['id', 'name', 'numero', 'processo','dataFormatada', 'local']
  }
</script>

@stop