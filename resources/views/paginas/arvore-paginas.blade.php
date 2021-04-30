@extends('elementos.templates')

@section('content')
<div class="container-fluid extended-height">
  <div id="app"></div>
  <div class="animated fadeIn">
    <div class="tool-box">
      <div>
        {{-- <button class="btn btn-ghost-primary btn-square" id="duplicate" alt="Duplicar Elemento">
          <i class="fa fa-copy"></i>
        </button> --}}
        <button class="btn btn-ghost-primary btn-square" id="remove" alt="Remover Elemento">
          <i class="fa fa-trash"></i>
        </button>
        <button class="btn btn-ghost-primary btn-square" id="save" alt="Salvar">
          <i class="fa fa-save"></i>
        </button>
        {{-- <button class="btn btn-ghost-primary btn-square" id="save" alt="Descartar">
          <i class="fa fa-ban"></i>
        </button> --}}
      </div>
    </div>
    <h3>Menu Principal</h3>
    <!-- USAR CLASSE BLOCK EM DIV PARA HABILITAR O SUB MENU -->
    <div class="content-tree">
      <div data-id="1" class="content-tree-child1">
        <ul class="list-group sortable list-unstyled" id="sortable">
          <?php 
            foreach ($array as $key) : 
              galho($key);
            endforeach; 
          ?>
        </ul>
      </div>
      
      <div data-id="null"  class="content-tree-child2">
        <ul class="list-group sortable list-unstyled" id="sortable2">
          <h5 style="margin: 10px auto;"> Paginas Não Indexadas </h5>
          <?php 
            foreach ($array_2 as $key) : 
              galho($key);
            endforeach; 
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
@stop

<?php

    function galho($array)
    {
      ?>
        <li data-id="<?= $array['id'] ?>" class="list-group-item">
          <div class="block block-title"><?= $array['name']?></div>
          <?php if( count( $array['children'] ) ): ?>
          <ul class="list-group sortable list-unstyled">
            <?php 
              foreach ($array['children'] as $key) : 
                galho($key);
              endforeach; 
             ?>
          </ul><!-- /.menu-sortable -->
          <?php endif; ?>
        </li>
      <?php
    }



?>