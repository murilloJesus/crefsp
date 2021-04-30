@extends('elementos.templates')

@section('content')
<div class="container-fluid extended-height">
  <div class="animated fadeIn">
    <div class="tool-box">
      <div>
        <button class="btn btn-ghost-primary btn-square" id="duplicate" alt="Duplicar Elemento">
          <i class="fa fa-copy"></i>
        </button>
        <button class="btn btn-ghost-primary btn-square" id="remove" alt="Remover Elemento">
          <i class="fa fa-trash"></i>
        </button>
        <button class="btn btn-ghost-primary btn-square" id="save" alt="Salvar">
          <i class="fa fa-save"></i>
        </button>
        <button class="btn btn-ghost-primary btn-square" id="save" alt="Descartar">
          <i class="fa fa-ban"></i>
        </button>
      </div>
    </div>
    <h3>Menu Principal</h3>
    <!-- USAR CLASSE BLOCK EM DIV PARA HABILITAR O SUB MENU -->
    <div class="content-tree">
      <ul class="list-group sortable list-unstyled" id="sortable">
        <li class="list-group-item">
          <div class="block block-title">Acesso a Informação</div>
          <ul class="list-group sortable list-unstyled">
            <li class="list-group-item">
              <div class="block-title">Design</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Develope</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block block-title">SEO</div>
              <ul class="list-group sortable list-unstyled">
                <li class="list-group-item">
                  <div class="block-title">Design</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Develope</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">SEO</div>
                  <ul class="list-group sortable list-unstyled">
                    
                  </ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Support</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Support</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
          </ul><!-- /.menu-sortable -->
        </li>
        <li class="list-group-item">
          <div class="block block-title">Registro</div>
          <ul class="list-group sortable list-unstyled">
            <li class="list-group-item">
              <div class="block-title">Design</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Develope</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block block-title">SEO</div>
              <ul class="list-group sortable list-unstyled">
                <li class="list-group-item">
                  <div class="block-title">Design</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Develope</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">SEO</div>
                  <ul class="list-group sortable list-unstyled">
                    
                  </ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Support</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Support</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
          </ul><!-- /.menu-sortable -->
        </li>
        <li class="list-group-item">
          <div class="block block-title">Orientação e Fiscalização</div>
          <ul class="list-group sortable list-unstyled">
            <li class="list-group-item">
              <div class="block-title">Design</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Develope</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block block-title">SEO</div>
              <ul class="list-group sortable list-unstyled">
                <li class="list-group-item">
                  <div class="block-title">Design</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Develope</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">SEO</div>
                  <ul class="list-group sortable list-unstyled">
                    
                  </ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Support</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Support</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
          </ul><!-- /.menu-sortable -->
        </li>
        <li class="list-group-item">
          <div class="block block-title">Comunicação</div>
          <ul class="list-group sortable list-unstyled">
            <li class="list-group-item">
              <div class="block-title">Design</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Develope</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block block-title">SEO</div>
              <ul class="list-group sortable list-unstyled">
                <li class="list-group-item">
                  <div class="block-title">Design</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Develope</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">SEO</div>
                  <ul class="list-group sortable list-unstyled">
                    
                  </ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Support</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Support</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
          </ul><!-- /.menu-sortable -->
        </li>
        <li class="list-group-item">
          <div class="block block-title">Pra Você</div>
          <ul class="list-group sortable list-unstyled">
            <li class="list-group-item">
              <div class="block-title">Design</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Develope</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block block-title">SEO</div>
              <ul class="list-group sortable list-unstyled">
                <li class="list-group-item">
                  <div class="block-title">Design</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Develope</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">SEO</div>
                  <ul class="list-group sortable list-unstyled">
                    
                  </ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Support</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Support</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
          </ul><!-- /.menu-sortable -->
        </li>
        <li class="list-group-item">
          <div class="block block-title">Atendimento</div>
          <ul class="list-group sortable list-unstyled">
            <li class="list-group-item">
              <div class="block-title">Design</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Develope</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
            <li class="list-group-item">
              <div class="block block-title">SEO</div>
              <ul class="list-group sortable list-unstyled">
                <li class="list-group-item">
                  <div class="block-title">Design</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Develope</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">SEO</div>
                  <ul class="list-group sortable list-unstyled">
                    
                  </ul>
                </li>
                <li class="list-group-item">
                  <div class="block-title">Support</div>
                  <ul class="list-group sortable list-unstyled"></ul>
                </li>
              </ul>
            </li>
            <li class="list-group-item">
              <div class="block-title">Support</div>
              <ul class="list-group sortable list-unstyled"></ul>
            </li>
          </ul><!-- /.menu-sortable -->
        </li>
      </ul>
    </div>
  </div>
</div>
@stop