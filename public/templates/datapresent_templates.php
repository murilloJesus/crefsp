
<!-- APRESENTAÇÃO DE DADOS -->


	<!-- FORMULARIOS -->
	 <template id="formularios-view-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
			<div>			
				<button class="btn btn-danger" @click="relatorio" type="button">
					Relatório
				</button>
			</div>
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="controller.data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	<!-- FORMULARIOS -->
	<template id="formularios-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="controller.data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	 	<!-- FORMULARIOS -->
	 <template id="logs-view-data-template">
		<div>
			<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	<!-- AGENDA
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="agendas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- EDITORIAIS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="editorials-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- LISTAS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="listas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	<!-- FORMULARIOS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="agenda-formularios-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>






	<!-- BANNERS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="banners-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>




	<!-- VIDEOS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="videos-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- ACCORDION
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="accordions-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- PAGINAS
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="paginas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- EVENTOS
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="eventos-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
			<div>			
				<button class="btn btn-danger" @click="relatorio" type="button">
					Relatório
				</button>
			</div>
			<br>
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="controller.data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	<!-- CATEGORIAS EVENTOS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="categorias-eventos-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	 	<!-- CATEGORIAS EVENTOS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="categorias-licitacoes-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- CATEGORIAS VAGA
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="categorias-vagas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	<!-- CATEGORIAS EVENTOS
		ACTION : [ DELETE, EDIT, DUPLICA]
	 -->
	 <template id="categorias-noticia-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>





	<!-- VAGAS
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="vagas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- VIDEOS
		TITULO : TEXTO
		ACTION : [ DELETE ]
	 -->
	 <template id="video-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



<!-- MULTIMIDIA
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="multimidias-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>




<!-- NOTICIA
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="noticia-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- LICITACAO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="licitacoes-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="controller.data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- UNIDADES
		LOCAL : TEXTO
		DATA HORA: DATA
		DESCRICAO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="unidades-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
			<div>			
				<button class="btn btn-danger" @click="relatorio" type="button">
					Relatório
				</button>
			</div>
			<br>
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="controller.data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- MAPAS
		LOCAL : TEXTO
		DATA HORA: DATA
		DESCRICAO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="mapas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
			<div>			
				<button class="btn btn-danger" @click="relatorio" type="button">
					Relatório
				</button>
			</div>
			<br>
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="controller.data"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>




	<!-- ARQUIVOS
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="arquivo-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>



	<!-- ACESSO RAPIDO
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="acesso-rapido-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>

	<!-- BANNER
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="banner-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- CLUBE
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="clube-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- PESSOAS
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="pessoas-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- GALERIAS
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="galerias-data-template">
	 	<div>
	 		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
		      	></pesquisa-item>
		    <galerias-item
		          :controller="this"
		        ></galerias-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
	 	</div>
	 </template>


	<!-- PERMISSOES
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT, COPY ]
	 -->
	 <template id="permissoes-data-template">
	 	<div>
	 		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
		      	></pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
		        ></tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
	 	</div>
	 </template>


	<!-- USUARIOS
		TITULO : TEXTO
		ACTION : [ DELETE , EDIT ]
	 -->
	 <template id="usuarios-data-template">
		<div>
		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
				  >
			</pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
				>
			</tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
		</div>
	 </template>


	<!-- TEMA
		TITULO : TEXTO
		TOPO : IMAGEM
		RODAPÉ : IMAGEM
		ACTION : [ DELETE , EDIT ]
	 -->
	 <template id="tema-data-template">
	 	<div>
	 		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
		      	></pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
		        ></tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
	 	</div>
	 </template>

	<!-- 
		AGENDAS
	 -->
	 <template id="agenda-data-template">
	 	<div>
	 		<input type="hidden" v-model="controller.id">
	    	<pesquisa-item
		          :controller="this"
		          :data="pesquisa"
		          :output="output"
		      	></pesquisa-item>
		    <tabela-item
		          :controller="this"
		          :data="tabela"
		        ></tabela-item>
		    <paginator-item
		          :controller="this"
		        ></paginator-item>
	 	</div>
	 </template>



<!-- ORGANIZACAO DE DATA -->


	<!-- PESQUISA -->
	<template id="pesquisa-template">
		<form class="form-horizontal" action="javascript: void(0)">
			<div class="form-group row">
				<div class="col-md-6" v-if="pesquisar">
					<h5>Pesquisar</h5>
					<div class="input-group">
						<div class="input-group-prepend">
							<button class="btn btn-danger" type="button">
								<i class="fa fa-search"></i>
							</button>
						</div>
						<input v-model="controller.pesquisar" class="form-control" type="text" placeholder="Pesquisar">
					</div>
				</div>
				<div class="col-md-3" v-if="status">
					<h5>Status
					<label class="switch switch-label switch-pill switch-danger">
						<input class="switch-input" v-model="controller.status" type="checkbox">
						<span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
					</label>
					</h5>
				</div>
				<div class="col-md-3" v-if="destaque">
					<h5>Destaque
						<label class="switch switch-label switch-pill switch-danger">
							<input class="switch-input" v-model="controller.destaque" type="checkbox">
							<span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
						</label>
					</h5>
				</div>
				<div class="col-md-3" v-if="categoria">
					<h5>Categoria</h5>
					<div class="input-group">
						<input v-model="nome.categoria" disabled class="form-control" type="text" placeholder="Categoria">
						<div class="input-group-append">
							<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
							</button>
							<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
								<a class="dropdown-item" v-for="el in categoria" @click="controller.categoria = el[0]; nome.categoria = el[1]">{{el[1]}}</a>
								<a class="dropdown-item" @click="controller.categoria = ''; nome.categoria = ''">Todas</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3" v-if="cidade">
					<h5>Cidade</h5>					
					<div class="input-group">
						<input v-model="nome.cidade" disabled class="form-control" type="text" placeholder="Cidade">
						<div class="input-group-append">
							<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
							</button>
							<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="overflow-y: scroll; height:400px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
								<a class="dropdown-item" @click="controller.cidade = ''; nome.cidade = ''">Todas</a>
								<a class="dropdown-item" v-for="el in cidade" @click="controller.cidade = el[0]; nome.cidade = el[1]">{{el[1]}}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3" v-if="datayy">
					<h5>Ano</h5>
					<div class="input-group">
						<input v-model="controller.datayy" class="form-control" type="text" placeholder="Ano">
						<div class="input-group-append">
							<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
							</button>
							<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
								<a class="dropdown-item" v-for="el in datayy">{{el}}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3" v-if="datamm">
					<h5>Mês</h5>
					<div class="input-group">
						<input v-model="controller.datamm" class="form-control" type="text" placeholder="Mês">
						<div class="input-group-append">
							<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
							</button>
							<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(191px, 35px, 0px);">
								<a class="dropdown-item" v-for="el in datamm">{{el}}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3" v-if="datarange">
					<h5>Data de</h5>
					<div class="input-group">
						<span class="input-group-prepend">
							<button class="btn btn-danger" type="button">
								<i class="fa fa-calendar"></i>
							</button>
						</span>
						<input type="hidden" ref="dataup" id="dataUp" >
						<input  class="form-control calendario-up"  type="text" placeholder="Data de">
					</div>
				</div>
				<div class="col-md-3" v-if="datarange">
					<h5>Data até</h5>
					<div class="input-group">
						<span class="input-group-prepend">
							<button class="btn btn-danger" type="button">
								<i class="fa fa-calendar"></i>
							</button>
						</span>
						<input type="hidden" ref="datato" id="dataTo" >
						<input class="form-control calendario-to" type="text" placeholder="Data até">
					</div>
				</div>
			</div>
		</form>
	</template>

	<!-- GALERIAS DE ACOES -->
	<template id="galerias-template">
	        <div class="row">
	          <div class="col-sm-6 col-md-4" v-for="(el, index) in galerias">
	            <div class="card">
	              <div class="card-header">{{el.name}} 
	                <div class="card-header-actions">
	                  <a class="card-header-action btn-setting" @click="controller.controller.editar(el.id)">
	                    <i class="icon-settings"></i>
	                  </a>
	                  <a class="card-header-action btn-close" @click="controller.controller.deletar(el.id)">
	                    <i class="icon-close"></i>
	                  </a>
	                </div>
	              </div>
	              <div class="card-body">
	              	<output-galeria-item
	              	:id="el.id"
	              	></output-galeria-item>
	              </div>
	            </div>
	          </div>
	        </div>
	</template >


	<!-- TABELA DE ACOES -->
	<template id="tabela-template">
		<table class="table table-responsive-sm">
			<thead>
				<tr>
					<th
					v-for="linha in thead"
					>
					{{linha}}
				</th>
				<th class="action" v-if="controller.hasView || controller.hasEdit || controller.hasCopy || controller.hasDelete">Ações</th>
			</tr>
		</thead>
		<tbody>
			<tr
				v-for="(el, index) in tbody"
				:key="el.id"
				>
				<td v-for="campo in campos">
					<template v-if="campo.type  == 'imagem'">
						<show-name-imagem-item
						:id="el[campo.val]"
						></show-name-imagem-item>
					</template>
					<template v-else-if="campo.type == 'pagina'">
						<show-name-pagina-item
						:id="el[campo.val]"
						></show-name-pagina-item>
					</template>
					<template v-else-if="campo.type == 'cidade'">
						<show-name-cidade-item
						:id="el[campo.val]"
						></show-name-cidade-item>
					</template>
					<template v-else-if="campo.type == 'permissao'">
						<show-name-permissao-item
						:id="el[campo.val]"
						></show-name-permissao-item>
					</template>
					<template v-else-if="campo.type == 'categoria'">
						<show-name-categoria-item
						:id="el[campo.val]"
						></show-name-categoria-item>
					</template>
					<template v-else-if="campo.type == 'eventos_unidades'">
						<show-name-evento-item
						:id="el[campo.val]"
						></show-name-evento-item>
					</template>
					<template v-else-if="campo.type == 'data'">
						<show-data-item
						:data="el[campo.val]"
						></show-data-item>
					</template>
					<template v-else-if="campo.type == 'server_data'">
						<show-server-data-item
						:data="el[campo.val]"
						></show-server-data-item>
					</template>
					<template v-else>
						<show-texto-item
							:texto="el[campo.val]"
						></show-texto-item>
					</template>
				</td>
				<td v-if="controller.hasView || controller.hasEdit || controller.hasCopy || controller.hasDelete">
					<i v-if="controller.hasView" class="fa fa-eye" title="Ver" @click="controller.controller.ver(el.id)" ></i>
					<i v-if="controller.hasEdit" class="fa fa-edit" title="Editar" @click="controller.controller.editar(el.id)" ></i>
					<i v-if="controller.hasCopy" class="fa fa-copy" title="Duplicar" @click="controller.controller.duplicar(el.id)"></i>
					<i v-if="controller.hasDelete" class="fa fa-trash" title="Excluir" @click="controller.controller.deletar(el.id)"></i>
					<span v-if="el.status && controller.hasStatus" class="badge badge-success" title="Clique para Destivar o Item" @click="controller.controller.desativar(el.id)">Ativa</span>
					<span v-else-if="controller.hasStatus" class="badge badge-secondary" title="Clique para Ativar o Item" @click="controller.controller.ativar(el.id)">Inativa</span>
					<span v-if="el.destaque && controller.hasDestaque" class="badge badge-danger" title="Clique para Remover o Destaque" @click="controller.controller.desativar_destaque(el.id)">Destaque</span>
					<span v-if="!el.destaque && controller.hasDestaque" class="badge badge-secondary" title="Clique para Destacar" @click="controller.controller.ativar_destaque(el.id)">Destaque</span>
				</td>
			</tr>
		</tbody>
		</table>
	</template >

	<!-- SELECAO DE ITEM -->
	<template id="selecao-template">
		<div>
			<input type="hidden" v-model="controller.id">
			<table class="table table-responsive-sm">
				<tbody>
					<tr
					v-for="(el, index) in tbody"
					:key="el.id"
					>
					<td><a href="#" @click="controller.submit(index)">{{el.name}}</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</template >

	<!-- LISTA -->
	<template id="lista-template">
        <table class="table table-responsive-sm">
          <tbody>
            <tr
			v-for="(el, index) in tbody"
			:key="el.id"
			>
			  <td v-for="e in el">{{e}}</td>
              <td class="action">
                <i class="fa fa-remove"></i>
              </td>
            </tr>
          </tbody>
        </table>
	</template>


	<!-- PAGINACAO -->
	<template id="paginator-template">
		<ul class="pagination" v-if="controller.hasPage">
			<li class="page-item" @click="controller.toward">
				<a class="page-link" >Anterior</a>
			</li>
			<li class="page-item" :class="{ active: controller.page == el}" @click="controller.toPage(el)" v-for="el in controller.pages">
				<a class="page-link" >{{el+1}}</a>
			</li>
			<li class="page-item" @click="controller.foward" >
				<a class="page-link" >Proximo</a>
			</li>
		</ul>
	</template>
