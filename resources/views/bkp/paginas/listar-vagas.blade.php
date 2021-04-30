@extends('elementos.templates')


@section('content')
<div id="app_tabela" class="container-fluid">
  <div class="animated fadeIn">
    <ul class="list-group">
      <li class="list-group-item">
        <h3> Vagas </h3>
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
      href : 'http://localhost/admin/public/admin/vagas',
      colunas : ['#', 'Titulo', 'Categoria', 'Cidade', 'Cadastrada em'],
      linhas :  ['id', 'name', 'categoria',  'cidade', 'dataFormatada']
  }
</script>

@stop