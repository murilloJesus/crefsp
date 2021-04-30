
	<!-- EDITORIAL -->
	<template id="editorial-pagina-formulario-template">
		<ul class="list-group">
			<input type="hidden" v-model="controller.id">
			<li class="list-group-item" v-if="busca"> 
				<div class="form-group row">
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.categoria">
					<h5>Categoria</h5>
						<input-categoria-item
							type="editorial"
							placeholder="Categoria"
							:controller="this.data"
						></input-categoria-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.datamm">
					<h5>Mês</h5>
						<input-datamm-item
							placeholder="Mês"
							:controller="this.data"
						></input-mes-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.datayy">
					<h5>Ano</h5>
						<input-datayy-item
							placeholder="Ano"
							:controller="this.data"
						></input-ano-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.datarange">
					<h5>Data</h5>
						<input-data-hora-item
							placeholder="Data"
							:controller="this.data"
						></input-data-hora-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.cidade">
					<h5>Cidade</h5>
						<input-cidade-item
							placeholder="Cidade"
							:controller="this.data"
						></input-cidade-item>
					</div>
				</div>
			</li>

			<!-- LIVROS E REVISTAS -->
			<li class="list-group-item" v-if="controller.tipo == 1"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome do Item"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Autor</h5>
					<input-text-item
						field="autor"
						placeholder="Autor"
						:controller="this.data"
					>
					</input-text-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="form-group">
				<h5>PDF</h5>
					<input-arquivo-item
						placeholder="PDF"
						field="pdf"
						:controller="this.data"
						>
					</input-arquivo-item>
				</div>
				<div class="form-group">
				<h5>ZIP</h5>
					<input-arquivo-item
						placeholder="ZIP"
						field="zip"
						:controller="this.data"
						>
					</input-arquivo-item>
				</div>
				<div class="form-group">
				<h5>Flash</h5>
					<input-link-item
						placeholder="Flash"
						field="flash"
						:controller="this.data"
						>
					</input-link-item>
				</div>
			</li>

			<!-- Faculdade -->
			<li class="list-group-item" v-if="controller.tipo == 2"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Imagem</h5>
					<input-imagem-item
						placeholder="Imagem"
						:controller="this.data"
					>
					</input-imagem-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="form-group">
				<h5>Cidade</h5>
					<input-cidade-item
						placeholder="Cidade"
						:controller="this.data"
					>
					</input-cidade-item>
				</div>
				<div class="form-group">
				<h5>Endereço</h5>
					<input-endereco-item
						placeholder="Endereço"
						:controller="this.data"
					>
					</input-endereco-item>
				</div>
				<div class="form-group">
				<h5>Site</h5>
					<input-site-item
						placeholder="Site"
						:controller="this.data"
					>
					</input-site-item>
				</div>

				<div class="form-group">
				<h5>Telefone</h5>
					<input-telefone-item
						placeholder="Telefone"
						:controller="this.data"
					>
					</input-telefone-item>
				</div>
			</li>


			<!-- Video -->
			<li class="list-group-item" v-if="controller.tipo == 3"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="form-group">
				<h5>Video</h5>
					<input-video-item
						placeholder="Video"
						:controller="this.data"
					>
					</input-video-item>
				</div>
			</li>

			<!-- Tudo -->
			<li class="list-group-item" v-if="controller.tipo == 4"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Imagem</h5>
					<input-imagem-item
						placeholder="Imagem"
						:controller="this.data"
					>
					</input-imagem-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="form-group">
				<h5>Cidade</h5>
					<input-cidade-item
						placeholder="Cidade"
						:controller="this.data"
					>
					</input-cidade-item>
				</div>
				<div class="form-group">
				<h5>Autor</h5>
					<input-autor-item
						placeholder="Autor"
						:controller="this.data"
					>
					</input-autor-item>
				</div>
				<div class="form-group">
				<h5>Endereço</h5>
					<input-endereco-item
						placeholder="Endereço"
						:controller="this.data"
					>
					</input-endereco-item>
				</div>
				<div class="form-group">
				<h5>Site</h5>
					<input-site-item
						placeholder="Site"
						:controller="this.data"
					>
					</input-site-item>
				</div>

				<div class="form-group">
				<h5>Telefone</h5>
					<input-telefone-item
						placeholder="Telefone"
						:controller="this.data"
					>
					</input-telefone-item>
				</div>

				<div class="form-group">
				<h5>Video</h5>
					<input-video-item
						placeholder="Video"
						:controller="this.data"
					>
					</input-video-item>
				</div>

				<div class="form-group">
				<h5>PDF</h5>
					<input-arquivo-item
						placeholder="PDF"
						field="pdf"
						:controller="this.data"
						>
					</input-arquivo-item>
				</div>

				<div class="form-group">
				<h5>ZIP</h5>
					<input-arquivo-item
						placeholder="ZIP"
						field="zip"
						:controller="this.data"
						>
					</input-arquivo-item>
				</div>

				<div class="form-group">
				<h5>Flash</h5>
					<input-link-item
						placeholder="Flash"
						field="flash"
						:controller="this.data"
						>
					</input-link-item>
				</div>

				<div class="form-group">
					<input-editor-item
						:controller="this"
					>
					</input-editor-item>
				</div>
			</li>
			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</div>
	</template>





	<!-- GALERIA  -->
	<template id="galeria-pagina-formulario-template">
	    <div>
	      <li class="list-group-item">
	      	<input type="hidden" v-model="controller.controller.data.galeria_id">
	        <div class="form-group row">
			<h5>Título</h5>
	        	<input-name-item
		        	placeholder="Titulo"
		        	:controller="this.data"
	        	></input-name-item>
	        </div>
	        <div class="form-group row">
			<h5>Descrição</h5>
	        	<input-descricao-item
		        	placeholder="Descrição"
		        	:controller="this.data"
	        	></input-descricao-item>
	        </div>
	      </li>
	      <li class="list-group-item">
	        <form class="form-horizontal" action="" method="post">
	          <div class="form-group row">
	            <div class="col-md-4">
				<h5>Nova Imagem</h5>
	              <input-imagem-item
	              placeholder="Nova Imagem"
	              :require="true"
	              :controller="this"
	              ></input-imagem-item>
	            </div>
	            <div class="col-md-1">
				<h5>&nbsp;</h5>
	                <input-submit-item
	                :controller="this"
	                ></input-submit-item>
	            </div>
	          </div>
	        </form>
	        <div class="row">
	          <div class="col-sm-4 col-md-3" v-for="(el, index) in imagens">
	            <div class="card">
	              <div class="card-body" style="background-size: cover; height: 200px; background-position: center;" :style="el.backgroundSource">
	                <div class="card-header-actions">
	                  <a class="card-header-action btn-close" @click="deletar(el.id)">
	                    <i class="icon-close"></i>
	                  </a>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </li>
	    </div>
	</template>


	<!-- ACCORDION  -->
	<template id="accordion-pagina-formulario-template">
		<ul class="list-group">
			<input type="hidden" v-model="controller.id">
			<li class="list-group-item">	
				<div class="row form-group">
					<div class="col-md-12">
					<h5>Título</h5>
						<input-text-item
							placeholder="Titulo"
							field="name"
							:controller="this.data"
						>
						</input-text-item>
					</div>
				</div>
				<div class="row form-group center">
					<div class="col-md-12">
					<h5>Conteúdo</h5>
						<input-descricao-item
							formato="textarea"
							placeholder="Conteúdo"
							:controller="this.data"
						></input-descricao-item>
					</div>
				</div>
			</li>
			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</ul>
	</template>

	<!-- BANNERS  -->
	<template id="banner-pagina-formulario-template">
		<ul class="list-group">
			<input type="hidden" v-model="controller.id">
			<li class="list-group-item">	
				<div class="row form-group">
					<h5>Título</h5>
					<input-name-item
						placeholder="Titulo"
						:controller="this.data"
					></input-name-item>
				</div>
				<div class="row form-group">
					<h5>Link</h5>
					<input-source-item
						placeholder="Link"
						:controller="this.data"
					></input-source-item>
				</div>
				<div class="row form-group">
					<h5>Imagem</h5>
					<input-imagem-item
						placeholder="Imagem"
						field="image_id"
						:require="true"
						:controller="this.data"
					></input-foot-item>
				</div>
			</li>
			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</ul>
	</template>


	<!-- MAPAS  -->
	<template id="mapas-pagina-formulario-template">
		<ul class="list-group">
			<li class="list-group-item">	
				<input type="hidden" v-model="controller.id">
				<div class="form-group row">
					<div class="col-md-10">
						<h5>Local</h5>
						<input-local-item
							placeholder="Local"
							:controller="this.data"
						></input-local-item>
					</div>
					<div class="col-md-2">
						<h5>&nbsp;</h5>
						<input-status-item
							placeholder="Status"
							:controller="this.data"
						></input-status-item>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-4">
						<h5>Cidade</h5>
						<input-cidade-item
							placeholder="Cidade"
							:controller="this.data"        		
						></input-cidade-item>
					</div>
					<div class="col-md-4">
						<h5>Latitude</h5>
						<input-latitude-item
							placeholder="Latitude (X)"
							:controller="this.data"
						></input-latitude-item>
					</div>
					<div class="col-md-4">
						<h5>Longitude (Y)</h5>
						<input-longitude-item
							placeholder="Longitude (Y)"
							:controller="this.data"
						></input-longitude-item>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-8">
						<h5>Observação</h5>
						<input-descricao-item
							placeholder="Obs"
							:controller="this.data"
						></input-descricao-item>
					</div>
					<div class="col-md-4">
						<h5>Data e Hora</h5>
						<input-data-hora-item
							placeholder="Data e Hora"
							field="data"
							type="4"
							:controller="this.data"
						></input-data-hora-item>
					</div>
				</div>  
				<div class="form-group row">
					<div class="col-md-12">
						<h5>Agendas e Tickets</h5>
						<input-text-item
							:controller="this.data"
							field="template"
							formato="textarea"
						></input-text-item>
					</div>
				</div>
			</li>
			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</ul>
	</template>


	<!-- FORMULARIO  -->
	<template id="formulario-pagina-formulario-template">
		<ul class="list-group">
			<input type="hidden" v-model="controller.id">
			<li class="list-group-item">	
				<div class="row form-group">
					<div class="col-md-8">
						<h5>Nome</h5>
							<input-name-item
								placeholder="Nome"
								:controller="this.data"
							>
					</div>
					<div class="col-md-4">
						<h5>Indice</h5>
							<input-text-item
								placeholder="Indice"
								:controller="this.data"
								field="indice"
							>
							</input-name-item>
					</div>
				</div>
				<div class="form-group">
				<h5>Rodapé</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="row form-group">
					<div class="col-md-8">
					<h5>Formato</h5>
						<input-formato-item
						placeholder="Formato"
						:controller="this.data"
						></input-formato-item>
					</div>
					<div class="col-md-4">	
					<h5></h5>
						<input-check-item
							placeholder="Obrigatório"
							field="obrigatorio"
							:controller="this.data"
						>
						</input-check-item>
					</div>
				</div>
			</li>
			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</div>
	</template>



	<!-- VIDEO  -->
	<template id="video-pagina-formulario-template">
		<ul class="list-group">
			<input type="hidden" v-model="controller.id">
			<li class="list-group-item">	
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome do Item"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="row form-group">
				<h5>Vídeo</h5>
					<input-video-item
						placeholder="Video"
						:controller="this.data"
					>
					</input-video-item>
				</div>
			</li>
			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</div>
	</template>

	<!-- LISTA -->
	<template id="lista-pagina-formulario-template">
		<ul class="list-group">
			<input type="hidden" v-model="controller.id">

			<li class="list-group-item" v-if="busca"> 
				<div class="form-group row">
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.categoria">
						<input-categoria-item
							type="lista"
							placeholder="Categoria"
							:controller="this.data"
						></input-categoria-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.datamm">
						<input-datamm-item
							placeholder="Mês"
							:controller="this.data"
						></input-mes-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.datayy">
						<input-datayy-item
							placeholder="Ano"
							:controller="this.data"
						></input-ano-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.datarange">
						<input-data-hora-item
							placeholder="Data"
							:controller="this.data"
						></input-data-hora-item>
					</div>
					<div class="col-md-4 marginud10" v-if="controller.controller.busca.cidade">
						<input-cidade-item
							placeholder="Cidade"
							:controller="this.data"
						></input-cidade-item>
					</div>
				</div>
			</li>

			<!-- ARQUIVO -->
			<li class="list-group-item" v-if="controller.tipo == 1"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome do Item"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="form-group">
				<h5>Arquivo</h5>
					<input-arquivo-item
						placeholder="Arquivo"
						:controller="this"
						>
					</input-arquivo-item>
				</div>
			</li>

			<!-- LINK -->
			<li class="list-group-item" v-if="controller.tipo == 2"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
				<div class="form-group">
				<h5>Link</h5>
					<input-source-item
						placeholder="Link"
						:controller="this.data"
					>
					</input-source-item>
				</div>
			</li>

			<!-- CONTEUDO -->
			<li class="list-group-item" v-if="controller.tipo == 3"> 
				<div class="form-group">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome"
						:controller="this.data"
					>
					</input-name-item>
				</div>
				<div class="form-group">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this.data"
					>
					</input-descricao-item>
				</div>
			</li>

			<li class="list-group-item" v-if="controller.tipo == 3"> 
				<div class="form-group">
					<input-editor-item
						:controller="this"
					>
					</input-editor-item>
				</div>
			</li>

			<li class="list-group-item">	
				<button class="btn btn-sm btn-danger"  type="button" @click="add">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</div>
	</template>




	<!-- busca
		@pesquisar : checkbox
		@categoria : checkbox
		@datarange : checkbox
		@datamm : checkbox
		@datayy : checkbox
		@cidade : checkbox
	--> 
	<template id="busca-formulario-template">	
		<div>
			<input type="hidden" v-model="controller.busca">
			<div class="row form-group">
				<div class="col-md-4">
					<input-check-item
					placeholder="Pequisar"
					field="pesquisar"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Categoria"
					field="categoria"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Cidade"
					field="cidade"
					:controller="this.data"
					></input-check-item>
				</div>		
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<input-check-item
					placeholder="Ano"
					field="datayy"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Mês"
					field="datamm"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Calendario"
					field="datarange"
					:controller="this.data"
					></input-check-item>
				</div>		
			</div>
		</div>
	</template>

	<!-- template
		@pesquisar : checkbox
		@categoria : checkbox
		@datarange : checkbox
		@datamm : checkbox
		@datayy : checkbox
		@cidade : checkbox
	--> 
	<template id="templates-formulario-template">	
		<div>
			<input type="hidden" v-model="controller.template.template">
			<div class="row form-group">
				<div class="col-md-4">
					<input-check-item
					placeholder="Editorial"
					field="editorial"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Pessoas"
					field="pessoas"
					:controller="this.data"
					></input-check-item>
				</div>	
				<div class="col-md-4">
					<input-check-item
					placeholder="Modal"
					field="modal"
					:controller="this.data"
					></input-check-item>
				</div>		
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<input-check-item
					placeholder="Lista"
					field="lista"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Formulário"
					field="formulario"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Accordion"
					field="accordion"
					:controller="this.data"
					></input-check-item>
				</div>		
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<input-check-item
					placeholder="Banner"
					field="banner"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Galeria"
					field="galeria"
					:controller="this.data"
					></input-check-item>
				</div>
				<div class="col-md-4">
					<input-check-item
					placeholder="Videos"
					field="videos"
					:controller="this.data"
					></input-check-item>
				</div>		
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<input-check-item
					placeholder="Mapas"
					field="mapas"
					:controller="this.data"
					></input-check-item>
				</div>	
			</div>
		</div>
	</template>



	<!-- PESSOAS -->
	<template id="pessoa-pagina-formulario-template">
		<div>				
			<div class="row form-group">
				<div class="col-md-6">
				<h5>Adicionar Pessoa</h5>
					<input-pessoa-item
						placeholder="Adicionar Pessoa"
						:controller="this"
					>
					</input-pessoa-item>
				</div>
				<div class="col-md-2">
					<input-submit-item
					:controller="this"
					></input-submit-item>
				</div>
			</div>
		</div>
	</template>
