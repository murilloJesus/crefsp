@extends('elementos.templates')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <ul class="list-group">
        <li class="list-group-item">
          <h3>Pesquisa</h3>
          <form class="form-horizontal" action="" method="post">
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-danger" type="button">
                      <i class="fa fa-search"></i></button>
                  </span>
                  <input class="form-control" type="text" name="input1-group2" placeholder="">
                </div>
              </div>
            </div>
          </form>
        </li>
        <li class="list-group-item">
              <table class="table table-responsive-sm">
                <thead>
                  <tr>
                    <th>Titulo</th>
                    <th>Data</th>
                    <th class="action">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Video Aulas - Documentação e Regulamentação Crefsp </td>
                    <td>10/06/2019</td>
                    <td>
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash"></i>
                      <span class="badge badge-success">Ativa</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Livros</td>
                    <td>20/06/2019</td>
                    <td>
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash"></i>
                      <span class="badge badge-success">Ativa</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Video Aulas - Ginastica Laboreal</td>
                    <td>23/06/2019</td>
                    <td>
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash"></i>
                      <span class="badge badge-secondary">Inativa</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Testes de Eficiencia</td>
                    <td>08/05/2019</td>
                    <td>
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash"></i>
                      <span class="badge badge-secondary">Inativa</span>
                    </td>
                  </tr>
                </tbody>
              </table>
             </li>
             <li class="list-group-item">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#">Anterior</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">4</a>
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