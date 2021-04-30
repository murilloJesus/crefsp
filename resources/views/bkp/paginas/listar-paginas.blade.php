@extends('elementos.templates')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <ul class="list-group">
      <li class="list-group-item">
        <h3> Paginas </h3>
        <form class="form-horizontal" action="" method="post">
          <div class="form-group row">
            <div class="col-md-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn btn-danger" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
                <input class="form-control" type="text" name="input1-group2" placeholder="Pesquisar">
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
              <th>Pai</th>
              <th>Tipo</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Institucional</td>
              <td>Nenhum</td>
              <td>Arvore de Paginas</td>
              <td>
                <i class="fa fa-edit" ></i>
                <i class="fa fa-trash" ></i>
                <span class="badge badge-success">Ativa</span>
              </td>
            </tr>
            <tr>
              <td>Sobre o CREF4/SP</td>
              <td>Institucional</td>
              <td>Conteudo</td>
              <td>
                <i class="fa fa-edit" ></i>
                <i class="fa fa-trash" ></i>
                <span class="badge badge-success">Ativa</span>
              </td>
            </tr>
            <tr>
              <td>Legislação</td>
              <td>Nenhum</td>
              <td>Arvore de Paginas</td>
              <td>
                <i class="fa fa-edit" ></i>
                <i class="fa fa-trash" ></i>
                <span class="badge badge-secondary">Inativa</span>
              </td>
            </tr>
            <tr>
              <td>Renovação da Cédula de Identidade Profissional</td>
              <td>Pessoa Fisica</td>
              <td>Conteudo</td>
              <td>
                <i class="fa fa-edit" ></i>
                <i class="fa fa-trash" ></i>
                <span class="badge badge-secondary">Inativa</span>
              </td>
            </tr>
            <tr>
              <td>Links Rapidos</td>
              <td>Institucional</td>
              <td>Lista</td>
              <td>
                <i class="fa fa-edit" ></i>
                <i class="fa fa-trash" ></i>
                <span class="badge badge-success">Ativa</span>
              </td>
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
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">Próximo</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
@stop