<!-- GERENCIADORES -->

	<!-- HOME
		@home : formulario
	-->
	<template id="gerenciar-home-template">
        <div class="card">
          <div class="card-header">
            <h5> Gerenciar Home </h5>
          </div>
          <div class="card-body">
	            <home-formulario-item
	            :controller="this"
	            ></home-formulario-item>
          </div>
        </div>
	</template>


	<!-- PAGINAS
		@pagina : formulario
		@paginas : tabela
	-->
	<template id="gerenciar-pagina-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Paginas</h5>
          </div>
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <paginas-data-item
			          :controller="this"
			      ></paginas-data-item>
			</li>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<pagina-formulario-item :controller="this">
				</pagina-formulario-item>
		  </div>
        </div>
	</template>


	<!-- NOTICIA
		@template : modal
		@noticia : formulario
		@noticias : tabela
	-->
	<!-- <template id="gerenciar-noticia-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Noticia</h5>
          </div>
          <div class="card-body">
          	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        		<button class="btn btn-danger" type="button">
					Categorias
				</button> -->
				<!-- Categorias aqui -->
        	<!-- </li>
        	<li class="list-group-item">
	        	 <noticia-data-item
			          :controller="this"
			      ></noticia-data-item>
			</li>
          </div>
          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" ref="modal" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{placeholder}}</h5>
						<button type="button" class="close" @click="close()" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<noticia-formulario-item :controller="this">
						</noticia-formulario-item>						
					</div>
				</div>
			</div>
		  </div> -->
          
		  <!-- <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" ref="modal" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Categorias</h5>
						<button type="button" class="close" @click="close()" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<gerenciar-categorias-noticia-item :controller="this">
						</gerenciar-categorias-noticia-item>						
					</div>
				</div>
			</div>
		  </div> -->
        <!-- </div>
	</template> -->
<!-- termina noticia -->

<template id="gerenciar-noticia-template">
        <div class="card">
          <div class="card-body">
			<ul class="nav nav-tabs" id="myTab1" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="noticias-tab" data-toggle="tab" href="#noticias" role="tab" aria-controls="noticias" ref="lista" aria-selected="true">noticias</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">Categorias</a>
				</li>
			</ul>
			<div class="tab-content" id="myTab1Content">
				<div class="tab-pane fade show active" id="noticias" role="tabpanel" aria-labelledby="noticias-tab">
					<li class="list-group-item">
						<button class="btn btn-danger" @click="open" type="button">
							{{placeholder}}
						</button>
					</li>
					<li class="list-group-item">
						<noticia-data-item
							:controller="this"
						></noticia-data-item>
					</li>
				</div>
				<div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
					<gerenciar-categorias-noticia-item
						:controller="this"
					></gerenciar-categorias-noticia-item>
				</div>
			</div>
          </div>
          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" ref="modal" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{placeholder}}</h5>
						<button type="button" class="close" @click="close()" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<noticia-formulario-item :controller="this">
						</noticia-formulario-item>						
					</div>
				</div>
			</div>
		  </div>
        </div>
	</template>


	<!-- MULTIMIDIDA
		@template : modal
		@multimidia : formulario
		@multimidias : tabela
	-->
	<template id="gerenciar-multimidia-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Multimidia</h5>
          </div>
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <multimidias-data-item
			          :controller="this"
			      ></multimidias-data-item>
			</li>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<multimidia-formulario-item :controller="this">
				</multimidia-formulario-item>
		  </div>
        </div>
	</template>

<!-- EMPREGO E CONCURSO
		@template : modal
		@emprego : formulario
		@empregos : tabela
	-->
	<!-- <template id="gerenciar-vaga-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Vagas</h5>
          </div>
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <vagas-data-item
			          :controller="this"
			      ></vagas-data-item>
			</li>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<vagas-formulario-item :controller="this">
				</vagas-formulario-item>
		  </div>
        </div>
	</template> -->

<!-- EVENTO
		@template : abas
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-vaga-template">
        <div class="card">
          <div class="card-body">
			<ul class="nav nav-tabs" id="myTab1" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab" aria-controls="eventos" ref="lista" aria-selected="true">Vagas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">Categorias</a>
				</li>
			</ul>
			<div class="tab-content" id="myTab1Content">
				<div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
					<li class="list-group-item">
						<button class="btn btn-danger" @click="open" type="button">
							{{placeholder}}
						</button>
					</li>
					<li class="list-group-item">
						<vagas-data-item
							:controller="this"
						></vagas-data-item>
					</li>
				</div>
				<div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
					<gerenciar-categorias-vagas-item
						:controller="this"
					></gerenciar-categorias-vagas-item>
				</div>
			</div>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<vagas-formulario-item :controller="this">
				</vagas-formulario-item>
		  </div>
        </div>
	</template>

<!-- EVENTO
		@template : abas
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-evento-template">
        <div class="card">
          <div class="card-body">
			<ul class="nav nav-tabs" id="myTab1" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab" aria-controls="eventos" ref="lista" aria-selected="true">Eventos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">Categorias</a>
				</li>
			</ul>
			<div class="tab-content" id="myTab1Content">
				<div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
					<li class="list-group-item">
						<button class="btn btn-danger" @click="open" type="button">
							{{placeholder}}
						</button>
					</li>
					<li class="list-group-item">
						<eventos-data-item
							:controller="this"
						></eventos-data-item>
					</li>
				</div>
				<div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
					<gerenciar-categorias-eventos-item
						:controller="this"
					></gerenciar-categorias-eventos-item>
				</div>
			</div>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<evento-formulario-item :controller="this">
				</evento-formulario-item>
		  </div>
        </div>
	</template>


	<!-- CATEGRIAS EVENTOS 
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-categorias-eventos-template">
		<ul class="list-group">
			<li class="list-group-item">
				<categorias-eventos-formulario-item
				:controller="this"
				></categorias-eventos-formulario-item>
			</li>
			<li class="list-group-item">
				<categorias-eventos-data-item
					:controller="this"
				></categorias-eventos-data-item>
			</li>
		</ul>
	</template>

	
	<!-- CATEGRIAS EVENTOS 
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-categorias-licitacoes-template">
		<ul class="list-group">
			<li class="list-group-item">
				<categorias-licitacoes-formulario-item
				:controller="this"
				></categorias-licitacoes-formulario-item>
			</li>
			<li class="list-group-item">
				<categorias-licitacoes-data-item
					:controller="this"
				></categorias-licitacoes-data-item>
			</li>
		</ul>
	</template>

	<!-- CATEGRIAS VAGAS 
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-categorias-vagas-template">
		<ul class="list-group">
			<li class="list-group-item">
				<categorias-vagas-formulario-item
				:controller="this"
				></categorias-vagas-formulario-item>
			</li>
			<li class="list-group-item">
				<categorias-vagas-data-item
					:controller="this"
				></categorias-vagas-data-item>
			</li>
		</ul>
	</template>


	<!-- CATEGRIAS NOTICIAS	 
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-categorias-noticia-template">
		<ul class="list-group">
			<li class="list-group-item">
				<categorias-noticia-formulario-item
				:controller="this"
				></categorias-noticia-formulario-item>
			</li>
			<li class="list-group-item">
				<categorias-noticia-data-item
					:controller="this"
				></categorias-noticia-data-item>
			</li>
		</ul>
	</template>


	<!-- LICITACOES
		@template : modal
		@licitacao : formulario
		@inictacoes : tabela
	-->
	<!-- <template id="gerenciar-licitacao-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Licitações</h5>
          </div>
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
          <div class="card-body">
        	<li class="list-group-item">
	        	 <licitacoes-data-item
			          :controller="this"
			      ></licitacoes-data-item>
			</li>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<licitacoes-formulario-item :controller="this">
				</licitacoes-formulario-item>
		  </div>
        </div>
	</template> -->

	<!-- EVENTO
		@template : abas
		@evento : formulario
		@eventos : tabela
	-->
	<template id="gerenciar-licitacao-template">
        <div class="card">
          <div class="card-body">
			<ul class="nav nav-tabs" id="myTab1" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab" aria-controls="eventos" ref="lista" aria-selected="true">Licitações</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">Categorias</a>
				</li>
			</ul>
			<div class="tab-content" id="myTab1Content">
				<div class="tab-pane fade show active" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
					<li class="list-group-item">
						<button class="btn btn-danger" @click="open" type="button">
							{{placeholder}}
						</button>
					</li>
					<li class="list-group-item">
						<licitacoes-data-item
							:controller="this"
						></licitacoes-data-item>
					</li>
				</div>
				<div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
					<gerenciar-categorias-licitacoes-item
						:controller="this"
					></gerenciar-categorias-licitacoes-item>
				</div>
			</div>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<licitacoes-formulario-item :controller="this">
				</licitacoes-formulario-item>
		  </div>
        </div>
	</template>

	<!-- CLUBE
		@template : abas
		@clube : formulario
		@clubes : tabela
	-->
	<template id="gerenciar-clube-template">
		<div class="card">
	      <div class="card-body">
	        <ul class="nav nav-tabs" id="myTab1" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab" aria-controls="categoria" ref="lista" aria-selected="true">Itens</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">{{placeholder}}</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTab1Content">
	          <div class="tab-pane fade show active" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
	            <ul class="list-group">
	            	<clube-data-item
	            	:controller="this"
	            	></clube-data-item>
	            </ul>
	          </div>
	          <div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
	            <ul class="list-group">
	            	<clube-formulario-item
	            	:controller="this"
	            	></clube-formulario-item>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	</template>

	<!-- PESSOAS
		@template : abas
		@pessoa : formulario
		@pessoas : tabela
	-->
	<template id="gerenciar-pessoas-template">
		<div class="card">
	      <div class="card-body">
	        <ul class="nav nav-tabs" id="myTab1" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab" aria-controls="categoria" ref="lista" aria-selected="true">Itens</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">{{placeholder}}</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTab1Content">
	          <div class="tab-pane fade show active" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
	            <ul class="list-group">
	            	<pessoas-data-item
	            		:controller="this"
						:hasCopy="true"
						:hasEdit="true"
	            	></pessoas-data-item>
	            </ul>
	          </div>
	          <div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
	            <ul class="list-group">
	            	<pessoas-formulario-item
	            		:controller="this"
	            	></pessoas-formulario-item>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	</template>

	<!-- PERMISSOES
		@template : abas
		@permissao : formulario
		@permissoes : tabela
	-->
	<template id="gerenciar-permissoes-template">
		<div class="card">
	      <div class="card-body">
	        <ul class="nav nav-tabs" id="myTab1" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab" aria-controls="categoria" ref="lista" aria-selected="true">Itens</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">{{placeholder}}</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTab1Content">
	          <div class="tab-pane fade show active" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
	            <ul class="list-group">
	            	<permissoes-data-item
	            	:controller="this"
	            	></permissoes-data-item>
	            </ul>
	          </div>
	          <div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
	            <ul class="list-group">
	            	<permissoes-formulario-item
	            	:controller="this"
	            	></permissoes-formulario-item>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	</template>


	<!-- USUARIOS 
		@template : abas
		@usuario : formulario
		@usuarios : tabela
	-->
	<template id="gerenciar-usuarios-template">
		<div class="card">
	      <div class="card-body">
	        <ul class="nav nav-tabs" id="myTab1" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab" aria-controls="categoria" ref="lista" aria-selected="true">Itens</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">{{placeholder}}</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTab1Content">
	          <div class="tab-pane fade show active" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
	            <ul class="list-group">
	            	<usuarios-data-item
	            	:controller="this"
	            	></usuarios-data-item>
	            </ul>
	          </div>
	          <div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
	            <ul class="list-group">
	            	<usuarios-formulario-item
	            	:controller="this"
	            	></usuarios-formulario-item>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	</template>

	<!-- GALERIAS 
		@template : abas
		@galeria : formulario
		@galerias : tabela
	-->
	<template id="gerenciar-galerias-template">
		<div class="card">
	      <div class="card-body">
	        <ul class="nav nav-tabs" id="myTab1" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="categoria-tab" data-toggle="tab" href="#categoria" role="tab" aria-controls="categoria" ref="lista" aria-selected="true">Itens</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="novo-tab" data-toggle="tab" href="#novo" role="tab" aria-controls="novo" ref="form" aria-selected="false">{{placeholder}}</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTab1Content">
	          <div class="tab-pane fade show active" id="categoria" role="tabpanel" aria-labelledby="categoria-tab">
	            <ul class="list-group">
		    	    <galerias-data-item
		        	:controller="this"
		        	></galerias-data-item>
	            </ul>
	          </div>
	          <div class="tab-pane fade" id="novo" role="tabpanel" aria-labelledby="novo-tab">
	            <ul class="list-group">
	            	<galerias-formulario-item
	            	:controller="this"
	            	></galerias-formulario-item>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	</template>


	<!-- ARQUIVOS
		@template : cascata
		@tema : formulario
		@temas : tabela
	-->
	<template id="gerenciar-arquivos-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Arquivos</h5>
          </div>
          <div class="card-body">
          		<ul class="list-group">
	            	<li class="list-group-item">
	            		<h3>{{placeholder}}</h3>
			            <arquivo-formulario-item
			            	:controller="this"
			            ></arquivo-formulario-item>
			        </li>
	            	<li class="list-group-item">
			        	 <arquivo-data-item
					          :controller="this"
					      ></arquivo-data-item>
					</li>
				</ul>
          </div>
        </div>		
	</template>


	<!-- TEMA
		@template : cascata
		@tema : formulario
		@temas : tabela
	-->
	<template id="gerenciar-tema-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Temas</h5>
          </div>
          <div class="card-body">
          		<ul class="list-group">
	            	<li class="list-group-item">
	            		<h3>{{placeholder}}</h3>
			            <tema-formulario-item
			            :controller="this"
			            ></tema-formulario-item>
			        </li>
	            	<li class="list-group-item">
			        	 <tema-data-item
					          :controller="this"
					      ></tema-data-item>
					</li>
				</ul>
          </div>
        </div>		
	</template>


	<!-- BANNERS 
		@template : cascata
		@banner : formulario
		@banners : tabela
	-->
	<template id="gerenciar-banner-template">
       <div class="card">
          <div class="card-header">
            <h5>Gerenciar Banners</h5>
          </div>
          <div class="card-body">
          		<ul class="list-group">
	            	<li class="list-group-item">
			            <banner-formulario-item
			            :controller="this"
			            ></banner-formulario-item>
			        </li>
	            	<li class="list-group-item">
			        	 <banner-data-item
					          :controller="this"
					      ></banner-data-item>
					</li>
				</ul>
          </div>
        </div>				
	</template>


	<!-- ACESSO RAPIDO 
		@template : cascata
		@acesso : formulario
		@acessos : tabela
	-->
	<template id="gerenciar-acesso-rapido-template">
  		<ul class="list-group">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
	        </li>
        	<li class="list-group-item">
	        	 <acesso-rapido-data-item
	        	 	:has-copy="true"
	        	 	:has-edit="true"
			        :controller="this"
			      ></acesso-rapido-data-item>
			</li>
	          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
	          	<div class="modal-dialog  modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">{{placeholder}}</h5>
							<button type="button" class="close" @click="close()" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
				            <acesso-rapido-formulario-item
				            	:controller="this"
				            ></acesso-rapido-formulario-item>
				        </div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>


	<!-- UNIDADES MÓVEIS
		@template : cascata
		@unidade : formulario
		@unidades : tabela
	-->
	<template id="gerenciar-unidade-template">
        <div class="card">
          <div class="card-header">
            <h5>Gerenciar Unidades Móveis</h5>
          </div>
          <div class="card-body">
          	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <unidades-data-item
			          :controller="this"
			      ></unidades-data-item>
			</li>
          </div>
          <div class="modal fade" :id="modalName" role="dialog" aria-hidden="true">
				<unidades-formulario-item :controller="this">
				</unidades-formulario-item>
		  </div>
        </div>
	</template>

	<!--AGENDA
	-->
	<template id="gerenciar-agenda-template">
  		<ul class="list-group">
        	<li class="list-group-item">
	        	 <agenda-data-item
			        :controller="this"
			      ></agenda-data-item>
			</li>
	          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
	          	<div class="modal-dialog  modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Formulários</h5>
							<button type="button" class="close" @click="close()" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
				            <agenda-form-formulario-item
				            	:controller="this"
				            ></agenda-form-formulario-item>
				        </div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>


		<!-- FORMULARIO
	-->
	<template id="gerenciar-formularios-template">
  		<ul class="list-group">
        	<li class="list-group-item">
	        	 <formularios-view-data-item
			        :controller="this"
			      ></formularios-view-data-item>
			</li>
	          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
	          	<div class="modal-dialog  modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Formulários</h5>
							<button type="button" class="close" @click="close()" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
				            <output-formulario-item
				            	:controller="this"
				            ></output-formulario-item>
				        </div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>

		<!-- LOGS -->
		<template id="gerenciar-logs-template">
  		<ul class="list-group">
        	<li class="list-group-item">
	        	 <logs-view-data-item
			        :controller="this"
			      ></logs-view-data-item>
			</li>
	          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
	          	<div class="modal-dialog  modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Formulários</h5>
							<button type="button" class="close" @click="close()" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>