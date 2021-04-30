@extends('elementos.templates')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <ul class="list-group">
      <li class="list-group-item">
        <h3> Usuarios </h3>
        <form class="form-horizontal" action="" method="post">
          <div class="form-group row">
            <div class="col-md-9">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn btn-danger" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
                <input class="form-control" type="text" name="input1-group2" placeholder="Pesquisar">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <input class="form-control" id="input3-group3" type="text" name="input3-group3"
                  placeholder="Tipo de Usuario">
                <div class="input-group-append">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                    <a class="dropdown-item" href="#">Administrador</a>
                    <a class="dropdown-item" href="#">Home</a>
                    <a class="dropdown-item" href="#">Noticias e Eventos</a>
                    <a class="dropdown-item" href="#">Licitações</a>
                    <a class="dropdown-item" href="#">Outro</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </li>
      <li class="list-group-item">
        <table class="table table-responsive-sm">
          <thead>
            <tr>
              <th>Nome</th>
              <th>CREFº</th>
              <th>Tipo</th>
              <th>Ultimo Login</th>
              <th class="action">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Willian Soares</td>
              <td>18075890</td>
              <td>Administrativo</td>
              <td>31/05/2019 10:00</td>
              <td><i class="fa fa-edit"></i> <i class="fa fa-trash"></i></td>
            </tr>
            <tr>
              <td>Murillo Jesus</td>
              <td>65684490</td>
              <td>Noticia e Eventos</td>
              <td>31/05/2019 10:00</td>
              <td><i class="fa fa-edit"></i> <i class="fa fa-trash"></i></td>
            </tr>
            <tr>
              <td>Gustavo Lima</td>
              <td>36948490</td>
              <td>Outros</td>
              <td>31/05/2019 10:00</td>
              <td><i class="fa fa-edit"></i> <i class="fa fa-trash"></i></td>
            </tr>
          </tbody>
        </table>
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#">Anterior</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">Proximo</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
@stop