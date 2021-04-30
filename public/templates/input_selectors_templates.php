<!-- SELECTORS INPUTS -->

	<!-- PAGINAS -->
    <template id="input-pagina-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.id">
            <input class="form-control" type="text" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='open_upload' v-if="controller.uploader"><small><i class="fa fa-plus"></i> Upload</small></a>
              </div>
            </div>
            <!-- Modal para upload -->
          <div class="modal fade" ref="modal_upload" v-if="controller.uploader" tabindex="-1" role="dialog" aria-hidden="true">
            <uploader-pagina-formulario-item placeholder="Adicionar Pagina" :controller="this">
            </uploader-pagina-formulario-item>
          </div>
        </div>
    </template>

	<!-- TEMPLATES -->
    <template id="input-templates-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.pagina">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='controller.template = 1'><small><i class="fa fa-list"></i> Pessoas </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.template = 2'><small><i class="fa fa-list"></i> Lista </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.template = 3'><small><i class="fa fa-list"></i> Editorial </small></a>
              </div>
            </div>
        </div>
    </template>

    <!-- EDITORIAL -->
    <template id="input-editorials-template">
        <div class="input-group">
            <input type="hidden">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(1)'><small><i class="fa fa-list"></i> Livros e Revistas </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(2)'><small><i class="fa fa-list"></i> Faculdade </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(3)'><small><i class="fa fa-list"></i> Video </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(4)'><small><i class="fa fa-list"></i> Tudo </small></a>
            </div>
        </div>
    </template>



	<!-- FORMATO -->
    <template id="input-formato-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.formato">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='controller.formato = "seccao"'><small><i class="fa fa-list"></i> Seção </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.formato = "text"'><small><i class="fa fa-list"></i> Texto </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.formato = "textarea"'><small><i class="fa fa-list"> </i> Area de Texto </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.formato = "checkbox"'><small><i class="fa fa-list"></i> Checkbox </small></a>

              </div>
            </div>
        </div>
    </template>


	<!-- DATAMM -->
    <template id="input-datamm-template">
        <div class="input-group">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="controller.datamm" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Janeiro"'><small><i class="fa fa-list"></i> Janeiro </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Fevereiro"'><small><i class="fa fa-list"></i> Fevereiro </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Março"'><small><i class="fa fa-list"></i> Março </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Abril"'><small><i class="fa fa-list"></i> Abril </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Maio"'><small><i class="fa fa-list"></i> Maio </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Junho"'><small><i class="fa fa-list"></i> Junho </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Julho"'><small><i class="fa fa-list"></i> Julho </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Agosto"'><small><i class="fa fa-list"></i> Agosto </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Setembro"'><small><i class="fa fa-list"></i> Setembro </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Outubro"'><small><i class="fa fa-list"></i> Outubro </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Novembro"'><small><i class="fa fa-list"></i> Novembro </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.datamm = "Dezembro"'><small><i class="fa fa-list"></i> Dezembro </small></a>
              </div>
            </div>
        </div>
    </template>


    <!-- MENU -->
    <template id="input-menu-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.data">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal"  @click="open_search"><small><i class="fa fa-search"></i> Buscar</small></a>
              </div>
            </div>

            <div class="modal fade" ref="modal_search" tabindex="-1" role="dialog" aria-hidden="true">
              <searcher-pagina-formulario-item field="parent_id" placeholder="Procurar Paginas" :controller="this">
              </searcher-pagina-formulario-item>
            </div>
        </div>
    </template>


    <!-- LISTA -->
    <template id="input-listas-template">
        <div class="input-group">
            <input type="hidden">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(1)'><small><i class="fa fa-list"></i> Arquivo </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(2)'><small><i class="fa fa-list"></i> Link </small></a>
                <a class="dropdown-item"  data-toggle="modal" @click='controller.open(3)'><small><i class="fa fa-list"></i> Conteudo </small></a>
            </div>
        </div>
    </template>

	<!-- CIDADE -->
    <template id="input-cidade-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.cidade">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item"  data-toggle="modal" @click='open_search'><small><i class="fa fa-search"></i> Buscar</small></a>
              </div>
            </div>
            <!-- Modal para upload -->
			<div class="modal fade" ref="modal_search" tabindex="-1" role="dialog" aria-hidden="true">
				<searcher-cidade-formulario-item placeholder="Procurar Cidades" :controller="this">
				</searcher-cidade-formulario-item>
			</div>
        </div>
    </template>

	<!-- IMAGEM -->
	<template id="input-imagem-template">
		<div class="input-group">
			<input type="hidden" v-model="controller[field]">
			<input class="form-control" type="text" v-model="name" disabled :placeholder="placeholder">
			<div class="input-group-append">
				<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					<span class="caret"></span>
				</button>
				<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
					<a class="dropdown-item"  data-toggle="modal" @click="open_upload"><small><i class="fa fa-upload"></i>Upload</small></a>
					<a class="dropdown-item"  data-toggle="modal" @click="open_link"><small><i class="fa fa-link"></i>Link</small></a>
					<a class="dropdown-item" @click="$null" v-if="!require"><small><i class="fa fa-ban"></i>Sem Imagem</small></a>
				</div>
			</div>
			<!-- Modal para upload -->
			<div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-imagem-formulario-item placeholder="Enviar Imagem" :controller="this">
				</uploader-imagem-formulario-item>
			</div>
			<!-- Modal para link -->
			<div class="modal fade" ref="modal_link" tabindex="-1" role="dialog" aria-hidden="true">
				<linker-imagem-formulario-item placeholder="Linkar Imagem" :controller="this">
				</linker-imagem-formulario-item>
			</div>
		</div>
	</template>

	<template id="input-head-template">
		<div class="input-group">
			<input type="hidden" name="head" v-model="controller.head">
			<input class="form-control" type="text" v-model="name" disabled :placeholder="placeholder">
			<div class="input-group-append">
				<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					<span class="caret"></span>
				</button>
				<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
					<a class="dropdown-item"  data-toggle="modal" @click="open_upload"><small><i class="fa fa-upload"></i>Upload</small></a>
					<a class="dropdown-item"  data-toggle="modal" @click="open_link"><small><i class="fa fa-link"></i>Link</small></a>
					<a class="dropdown-item" @click="$null" v-if="!require"><small><i class="fa fa-ban"></i>Sem Imagem</small></a>
				</div>
			</div>
			<!-- Modal para upload -->
			<div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-imagem-formulario-item placeholder="Enviar Imagem do Topo" :controller="this">
				</uploader-imagem-formulario-item>
			</div>
			<!-- Modal para link -->
			<div class="modal fade" ref="modal_link" tabindex="-1" role="dialog" aria-hidden="true">
				<linker-imagem-formulario-item placeholder="Linkar Imagem do Topo" :controller="this">
				</linker-imagem-formulario-item>
			</div>
		</div>
	</template>

	<template id="input-foot-template">
		<div class="input-group">
			<input type="hidden" name="imagem" v-model="controller.foot">
			<input class="form-control" type="text" v-model="name" disabled :placeholder="placeholder">
			<div class="input-group-append">
				<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					<span class="caret"></span>
				</button>
				<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
					<a class="dropdown-item"  data-toggle="modal" @click="open_upload"><small><i class="fa fa-upload"></i>Upload</small></a>
					<a class="dropdown-item"  data-toggle="modal" @click="open_link"><small><i class="fa fa-link"></i>Link</small></a>
					<a class="dropdown-item" @click="$null" v-if="!require"><small><i class="fa fa-ban"></i>Sem Imagem</small></a>
				</div>
			</div>
			<!-- Modal para upload -->
			<div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-imagem-formulario-item placeholder="Enviar Imagem do Rodapé" :controller="this">
				</uploader-imagem-formulario-item>
			</div>
			<!-- Modal para link -->
			<div class="modal fade" ref="modal_link" tabindex="-1" role="dialog" aria-hidden="true">
				<linker-imagem-formulario-item placeholder="Linkar Imagem do Rodapé" :controller="this">
				</linker-imagem-formulario-item>
			</div>
		</div>
	</template>


	<!-- DATA E HORA -->
	<template id="input-data-hora-template">
		<div class="input-group">
			<input type="hidden" v-model="controller.data">
			<input class="form-control" type="text" v-model="name" disabled :placeholder="placeholder">
			<div class="input-group-append">
				<button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					<span class="caret"></span>
				</button>
				<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
					<a class="dropdown-item" @click="selector(1)" data-toggle="modal">
						<small>
							<i class="fa fa-calendar"></i>'Dia/Mês/Ano'
						</small>
					</a>
					<a class="dropdown-item" @click="selector(2)" data-toggle="modal"  v-if="type > 1">
						<small>
							<i class="fa fa-calendar"></i>'Dia/Mês/Ano Hora:Min'
						</small>
					</a>
					<a class="dropdown-item" @click="selector(3)" v-if="type > 2">
						<small>
							<i class="fa fa-calendar"></i>'Dia/Mês/Ano Hora:Min' até 'Hora:Min'
						</small>
					</a>
					<a class="dropdown-item" @click="selector(4)" v-if="type > 3">
						<small>
							<i class="fa fa-calendar"></i>'Dia/Mês/Ano Hora:Min' até 'Dia/Mês/Ano Hora:Min'
						</small>
					</a>
				</div>
			</div>
			<!-- Modal para upload -->
			<div class="modal fade" ref="modal" tabindex="-1" role="dialog" aria-hidden="true">
				<data-hora-formulario-item :field="field" placeholder="Data e Hora" :controller="this">
				</data-hora-formulario-item>
			</div>
		</div>		
	</template>


	<!-- ARQUIVO -->
    <template id="input-arquivo-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.id">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item" data-toggle="modal" @click="open_upload"><small><i class="fa fa-plus"></i> Novo</small></a>
                <a class="dropdown-item"  data-toggle="modal"  @click="open_search"><small><i class="fa fa-search"></i> Buscar</small></a>
              </div>
            </div>
            <!-- Modal para upload -->
			<div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-arquivo-formulario-item placeholder="Adicionar Arquivo" :controller="this">
				</uploader-arquivo-formulario-item>
			</div>
			<div class="modal fade" ref="modal_search" tabindex="-1" role="dialog" aria-hidden="true">
				<searcher-arquivo-formulario-item placeholder="Procurar Arquivo" :controller="this">
				</searcher-arquivo-formulario-item>
			</div>
          </div>
    </template>


	<!-- CATEGORIA-->
	<template id="input-categoria-template">
    <div class="input-group">
      
      <input class="form-control" type="text" required disabled v-model="name" :placeholder="placeholder">
      <div class="input-group-append">
        <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
          <span class="caret"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
          <input type="hidden" v-model="controller.categoria">
            <a class="dropdown-item" v-for="(el, index) in data" @click="submit(index)">{{el.name}}</a>
            <a class="dropdown-item" data-toggle="modal"  @click="open_upload"><small><i class="fa fa-plus"></i> ADICIONAR</small></a>
          </div>
          <div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-categoria-formulario-item placeholder="Adicionar Categoria" :controller="this">
				</uploader-categoria-formulario-item>
			</div>
        </div>
      </div>
	</template>


  <!-- TEMA -->
  <template id="input-tema-template">
       <div class="input-group">
        <input class="form-control" type="text" required disabled v-model="name" :placeholder="placeholder">
        <input type="hidden" v-model="controller.tema">
        <div class="input-group-append">
          <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
            <a class="dropdown-item" v-for="(el, index) in data" @click="submit(index)">{{el.name}}</a>
          </div>
        </div>
      </div>
  </template>
  	

	<!-- PERMISSOES -->
	<template id="input-permissoes-template">
       <div class="input-group">
		<input class="form-control" type="text" required disabled name="permissoes" v-model="name" :placeholder="placeholder">
		<input type="hidden" v-model="controller.permissoes">
        <div class="input-group-append">
          <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
            <a class="dropdown-item" v-for="(el, index) in data" @click="submit(index)">{{el.name}}</a>
          </div>
        </div>
      </div>
    </template>


	<!-- PESSOA -->
    <template id="input-pessoa-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.id">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item" data-toggle="modal" @click="open_upload"><small><i class="fa fa-plus"></i> Novo</small></a>
                <a class="dropdown-item"  data-toggle="modal"  @click="open_search"><small><i class="fa fa-search"></i> Buscar</small></a>
              </div>
            </div>
            <!-- Modal para upload -->
			<div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-pessoa-formulario-item placeholder="Adicionar Pessoa" :controller="this">
				</uploader-pessoa-formulario-item>
			</div>
			<div class="modal fade" ref="modal_search" tabindex="-1" role="dialog" aria-hidden="true">
				<searcher-pessoa-formulario-item placeholder="Procurar Pessoa" :controller="this">
				</searcher-pessoa-formulario-item>
			</div>
          </div>
    </template>


	<!-- SOURCE -->
    <template id="input-source-template">
        <div class="input-group">
            <input type="hidden" v-model="controller">
            <input class="form-control" type="text" name="input3-group3" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item" data-toggle="modal" @click="open_link"><small><i class="fa fa-link"></i> Link</small></a>
                <a class="dropdown-item"  data-toggle="modal"  @click="open_search"><small><i class="fa fa-search"></i> Buscar</small></a>
              </div>
            </div>
            <!-- Modal para upload -->
			<div class="modal fade" ref="modal_link" tabindex="-1" role="dialog" aria-hidden="true">
				<linker-source-formulario-item placeholder="Link Externo" :controller="this">
				</linker-source-formulario-item>
			</div>
			<div class="modal fade" ref="modal_search" tabindex="-1" role="dialog" aria-hidden="true">
				<searcher-source-formulario-item placeholder="Procurar Paginas Internas" :controller="this">
				</searcher-source-formulario-item>
			</div>
        </div>
    </template>


	<!-- VIDEO -->
    <template id="input-video-template">
        <div class="input-group">
            <input type="hidden" v-model="controller.id">
            <input class="form-control" type="text" disabled v-model="name" :placeholder="placeholder">
            <div class="input-group-append">
              <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
                <a class="dropdown-item" data-toggle="modal" @click="open_upload"><small><i class="fa fa-upload"></i> Upload</small></a>
                <a class="dropdown-item"  data-toggle="modal"  @click="open_search"><small><i class="fa fa-search"></i> Buscar</small></a>
              </div>
            </div>
            <!-- Modal para upload -->
			<div class="modal fade" ref="modal_upload" tabindex="-1" role="dialog" aria-hidden="true">
				<uploader-video-formulario-item placeholder="Linker Video" :controller="this">
				</uploader-video-formulario-item>
			</div>
			<div class="modal fade" ref="modal_search" tabindex="-1" role="dialog" aria-hidden="true">
				<searcher-video-formulario-item placeholder="Procurar Videos" :controller="this">
				</searcher-video-formulario-item>
			</div>
        </div>
    </template>


