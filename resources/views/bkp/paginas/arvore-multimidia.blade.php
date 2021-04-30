@extends('elementos.templates')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-3">
        <ul class="list-group connectedSortable">
          <li id="institucional" class="list-group-item sortables">Instucional</li>
          <li id="estrutura" class="list-group-item sortables">Estrutura</li>
          <li id="quem" class="list-group-item sortables">Quem é Quem</li>
        </ul>          
      </div>
      <div class="col-3">
        <ul id="list_institucional" class="list-group connectedSortable sortabled">
            <li id="sobre" class="list-group-item sortables">Sobre o CREF4/SP</li>
            <li id="competencias" class="list-group-item sortables">Competências do CREF4/SP</li>
            <li id="estatuto" class="list-group-item sortables">Estatuto</li>
            <li id="codigo" class="list-group-item sortables">Código de Ética</li>
            <li id="agenda" class="list-group-item sortables">Agenda dos Diretores</li>
            <li id="sistemas" class="list-group-item sortables">Sistema CONFEF/CREFs</li>
            <li id="links" class="list-group-item sortables">Links Úteis</li>
        </ul>
        <ul id="list_estrutura" class="list-group connectedSortable sortabled">
          <li class="list-group-item">Organograma</li>
          <li class="list-group-item">Plenário</li>
          <li class="list-group-item">Atas</li>
          <li class="list-group-item">Diretoria</li>
          <li class="list-group-item">Presidência</li>
        </ul>
        <ul id="list_quem" class="list-group connectedSortable sortabled">
          <li class="list-group-item">Conselheiros</li>
          <li class="list-group-item">Diretoria</li>
          <li class="list-group-item">Delegados</li>
          <li class="list-group-item">Fiscalização</li>
          <li class="list-group-item">Equipe</li>
        </ul>          
      </div>
      <div class="col-3">
       
      </div>
      <div class="col-3">
         
      </div>
    </div>
  </div>
</div>
@stop