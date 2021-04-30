@extends('elementos.templates')

@section('content')
          <div class="animated fadeIn">
            <div class="row">

              <?php foreach ($formularios as $formulario) : ?>

                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <a class="no-link-style" href="/admin/listar-formulario/<?= $formulario->id ?>">
                      <div class="card-body pb-0">
                          <div>Novo Formulario(s) Recebido</div>
                          <div><b><?= $formulario->name ?></b></div>
                          <br>
                      </div>
                    </a>
                  </div>
                </div>

              <?php endforeach; ?>

              <?php foreach ($inscricoes as $formulario) : ?>

              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                  <a class="no-link-style" href="/admin/listar-agenda/<?= $formulario->item_id ?>">
                    <div class="card-body pb-0">
                    <div>Novas Inscrições Recebidas</div>
                    <br>
                    </div>
                  </a>
                </div>
              </div>

            <?php endforeach; ?>

            </div>

            <!-- /.row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                      <thead class="thead-light">
                        <tr>
                          <th>Ultimas Notícias</th>
                          <th>Usuario</th>
                          <th>Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($noticias as $noticia) : ?>
                        <tr>
                          <td>
                              <a href="/admin/noticia/<?= $noticia->id ?>"> <?= $noticia->name ?></a>
                          </td>
                          <td>
                            <strong><?= $noticia->autor ?></strong>
                          </td>
                          <td>
                            <div class="small text-muted"><?= formata_data( $noticia->updated_at ) ?></div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>

            <!-- /.row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                      <thead class="thead-light">
                        <tr>
                          <th>Ultimos Logs</th>
                          <th>Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($logs as $log) : ?>
                        <tr>
                          <td>
                              <?= $log->log ?>
                          </td>
                          <td>
                            <div class="small text-muted"><?= formata_data( $log->created_at ) ?></div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>

          </div>

@stop

<?php

    function formata_data($data)
    {
      $data = explode(' ', $data);

      $data_ = explode('-', $data[0]);

      $data[0] = $data_[2].'/'.$data_[1].'/'.$data_[0];

      return $data[0].' '.$data[1]; 

    }

?>