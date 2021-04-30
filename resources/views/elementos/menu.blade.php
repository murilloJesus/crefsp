@extends('admin')

@section('menu')

<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/">
          <i class="nav-icon icon-speedometer"></i> Pagina Inicial
        </a>
      </li>
      <li class="nav-title">Ferramentas</li>
      <?php if( $permissoes->home ) :?>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-star"></i> Home</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/gerenciar-home" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Gerenciar
              </small>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/acesso-rapido" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Acesso Rapido
              </small>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/gerenciar-banners"
              target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Banners
              </small>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/gerenciar-tema" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Tema
              </small>
            </a>
          </li>
        </ul>
      </li>
      <?php 
        endif;
        if( $permissoes->paginas ) :
      ?>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-star"></i> Paginas</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/arvore-paginas" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Arvore de Paginas
              </small>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/pagina" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Gerenciar
              </small>
            </a>
          </li>
        </ul>
      </li>
      <?php 
        endif;
        if( $permissoes->noticias ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/noticia" target="_top">
            <i class="nav-icon icon-star"></i> Notícias
        </a>
      </li>
      <?php 
        endif;
        if( $permissoes->eventos ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/evento" target="_top">
            <i class="nav-icon icon-star"></i> Eventos
        </a>
      </li>
      <?php 
        endif;
        if( $permissoes->licitacoes ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/licitacao" target="_top">
            <i class="nav-icon icon-star"></i> Licitações
        </a>
      </li>
      <?php 
        endif;
        if( $permissoes->emprego ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/vaga" target="_top">
            <i class="nav-icon icon-star"></i> Emprego e Concurso
        </a>
      </li>
      <?php 
        endif;
        if( $permissoes->multimidia ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/multimidia" target="_top">
            <i class="nav-icon icon-star"></i> Multimídia
        </a>
      </li>
      <?php 
        endif;
        if( $permissoes->clube ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/beneficio" target="_top">
            <i class="nav-icon icon-star"></i> Parceiros e Benefícios
        </a>
      </li>
      <?php 
        endif;
        if( $permissoes->unidades ) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/unidade" target="_top">
            <i class="nav-icon icon-star"></i> Unidades Móveis
        </a>
      </li>
      <?php 
        endif; 
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/listar-logs" target="_top">
            <i class="nav-icon icon-star"></i> Logs
        </a>
      </li>
    <?php
      if( $permissoes->pessoas or $permissoes->formularios ) :
    ?>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-star"></i> Gerenciar </a>
        <ul class="nav-dropdown-items">
          <?php 
            if( $permissoes->pessoas ) :
          ?>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/listar-pessoas" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Pessoas
              </small>
            </a>
          </li>
          <?php 
            endif;
            if( $permissoes->formularios ) :
          ?>
          <li class="nav-item">
              <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/listar-agenda" target="_top">
                <small>
                  <i class="nav-icon icon-list"></i> Agendas e Inscrições
                </small>
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/listar-formulario" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Formulário
              </small>
            </a>
          </li>
          <?php
            endif;
            ?>
        </ul>
      </li>
      <?php
        endif;
        if( $permissoes->usuarios ) :
      ?>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-star"></i> Usuarios</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/usuario" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Gerenciar
              </small>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/admin/permissoes" target="_top">
              <small>
                <i class="nav-icon icon-list"></i> Permissões
              </small>
            </a>
          </li>
        </ul>
      </li>
      <?php
        endif;
      ?>
      <li class="nav-item">
        <a class="nav-link" href="{{ request()->getSchemeAndHttpHost() }}/api/upload/xml" target="_blank">
            <i class="nav-icon icon-star"></i> Associados XML
        </a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

@stop