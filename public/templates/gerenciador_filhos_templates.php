	<!-- PAGINAS FILHO
		@pagina : formulario
		@paginas : tabela
	-->
	<template id="gerenciar-filho-paginas-template">
  		<ul class="list-group">
        	<li class="list-group-item">
				<div class="row form-group">
	        		<div class="col-md-6">
			        	 <input-pagina-item
			        	 	placeholder="Adicionar Pagina"
					        :controller="this"
					      ></input-pagina-item>        			
	        		</div>
        			<div class="col-md-4">
			        	 <input-submit-item
					        :controller="this"
					      ></input-submit-item>        			
	        		</div>
        		</div>
	        </li>
        	<li class="list-group-item">
					<paginas-data-item
					  :has-edit="false"
					  :has-copy="false"
			          :controller="this"
			     	></paginas-data-item>
			</li>
			<div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
				<pagina-formulario-item v-if="id"
					:controller="this"
				></pagina-formulario-item>	        
			</div>
		</ul>		
	</template>



	<!-- AGENDA
		@template : modal
		@agenda : formulario
		@agendas : tabela
	-->
	<template id="gerenciar-filho-agenda-template">
  		<ul class="list-group">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
	        </li>
        	<li class="list-group-item">
	        	 <agendas-data-item
			        :controller="this"
			      ></agendas-data-item>
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
				            <agenda-filho-formulario-item
				            	:controller="this"
				            ></agenda-filho-formulario-item>
				        </div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>


	<!-- PESSOAS FILHO
		@pessoa : formulario
		@pessoas : tabela
	-->
	<template id="gerenciar-filho-pessoas-template">
  		<ul class="list-group">
        	<li class="list-group-item">
        		<h3>{{placeholder}}</h3>
	            <pessoa-filho-formulario-item
	            	:controller="this"
	            ></pessoa-filho-formulario-item>
	        </li>
        	<li class="list-group-item">
	        	 <pessoas-data-item
			          :controller="this"
			      ></pessoas-data-item>
			</li>
		</ul>		
	</template>



	<!-- VIDEOS FILHO
		@video : formulario
		@videos : tabela
	-->
	<template id="gerenciar-filho-videos-template">
  		<ul class="list-group">
        	<li class="list-group-item">
        		<h3>{{placeholder}}</h3>
	            <video-formulario-item
	            	:controller="this"
	            ></video-formulario-item>
	        </li>
        	<li class="list-group-item">
	        	 <video-data-item
			          :controller="this"
			      ></video-data-item>
			</li>
		</ul>		
	</template>


	<!-- ARQUIVOS FILHO
		@template : cascata
		@tema : formulario
		@temas : tabela
	-->
	<template id="gerenciar-filho-arquivos-template">
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
	</template>
