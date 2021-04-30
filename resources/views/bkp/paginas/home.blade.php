@extends('elementos.templates')

@section('content')
          <div class="animated fadeIn">
            <div class="row">
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                  <div class="card-body pb-0">
                    <button class="btn btn-transparent p-0 float-right" type="button">
                      <i class="icon-location-pin"></i>
                    </button>
                    <div class="text-value"> 8 Novo(as)</div>
                    <div>Solicitação de Vaga</div>
                    <br>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                  <div class="card-body pb-0">
                    <button class="btn btn-transparent p-0 float-right" type="button">
                      <i class="icon-location-pin"></i>
                    </button>
                    <div class="text-value"> 87 Novo(as)</div>
                    <div>Envios de Formulario</div>
                    <br>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Ver</a>
                        <a class="dropdown-item" href="#">Relatorio</a>
                        <a class="dropdown-item" href="#">Não me mostre novamente</a>
                      </div>
                    </div>
                    <div class="text-value">Encerrado</div>
                    <div>Agenda 'Dia do  Profissional'</div>
                    <br>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Ver</a>
                        <a class="dropdown-item" href="#">Relatorio</a>
                        <a class="dropdown-item" href="#">Não me mostre novamente</a>
                      </div>
                    </div>
                    <div class="text-value">Encerrado</div>
                    <div>Licitação #593800 </div>
                    <br>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row --> 
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-5">
                    <h4 class="card-title mb-0">Tráfego e Desempenho</h4>
                    <div class="small text-muted">Maio 2019</div>
                  </div>
                  <!-- /.col-->
                  <div class="col-sm-7 d-none d-md-block">
                    <button class="btn btn-primary float-right" type="button">
                      <i class="icon-cloud-download"></i>
                    </button>
                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                      <label class="btn btn-outline-secondary">
                        <input id="option1" type="radio" name="options" autocomplete="off"> Dia
                      </label>
                      <label class="btn btn-outline-secondary active">
                        <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Mês
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input id="option3" type="radio" name="options" autocomplete="off"> Ano
                      </label>
                    </div>
                  </div>
                  <!-- /.col-->
                </div>
                <!-- /.row-->
                <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                  <canvas class="chart" id="main-chart" height="300"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="row text-center">
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Visitas</div>
                    <strong>29.703 Acessos</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Trafego</div>
                    <strong>1,6 GB de Tranferencia (67%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Desempenho</div>
                    <strong> 18 Alertas </strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Ultimas alterações</div>
                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                      <thead class="thead-light">
                        <tr>
                          <th class="text-center">
                            <i class="icon-people"></i>
                          </th>
                          <th>Usuario</th>
                          <th>Link</th>
                          <th class="text-center">Natureza</th>
                          <th>Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">
                            <div class="avatar">
                              <img class="img-avatar" src="img/avatars/1.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                          </td>
                          <td>
                            <div>Yiorgos Avraamu</div>
                            <div class="small text-muted">
                              Ultimo acesso: Junho 3, 2019 22h33</div>
                          </td>
                          <td>
                            <h5>Paginas/Institucional/Sobre o CREF4SAP</h5>
                          </td>
                          <td class="text-center">
                            <strong>Edição</strong>
                          </td>
                          <td>
                            <div class="small text-muted">a 10 segundos</div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar">
                              <img class="img-avatar" src="img/avatars/2.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                          </td>
                          <td>
                            <div>Avram Tarasios</div>
                            <div class="small text-muted">
                              Ultimo acesso: Junho 3, 2019 12h21</div>
                          </td>
                          <td>
                            <h5>Eventos/Dia do Profissional/Agenda</h5>
                          </td>
                          <td class="text-center">
                            <strong>Criação</strong>
                          </td>
                          <td>
                            <div class="small text-muted">a 22 horas</div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar">
                              <img class="img-avatar" src="img/avatars/3.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                          </td>
                          <td>
                            <div>Quintin Ed</div>
                            <div class="small text-muted">
                              Ultimo acesso: Maio 31, 2019 19h25</div>
                          </td>
                          <td>
                            <h5>Noticias/Novos Projetos CREF4SP</h5>
                          </td>
                          <td class="text-center">
                            <strong>Criação</strong>
                          </td>
                          <td>
                            <div class="small text-muted">a 4 dias</div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <div class="avatar">
                              <img class="img-avatar" src="img/avatars/5.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                          </td>
                          <td>
                            <div>Agapetus Tade</div>
                            <div class="small text-muted">
                              Ultimo acesso: Junho 06, 2019 14h49</div>
                          </td>
                          <td>
                            <h5>Paginas/Legistalção</h5>
                          </td>
                          <td class="text-center">
                            <strong>Menu</strong>
                          </td>
                          <td>
                            <div class="small text-muted">a 1 semana</div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>

          </div>

@stop