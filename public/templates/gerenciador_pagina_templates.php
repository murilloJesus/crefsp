	<!-- LISTA PAGINA
		@editorial : formulario
		@editorials : tabela
	-->
	<template id="gerenciar-pagina-editorials-template">
  		<ul class="list-group">
        	<li class="list-group-item">
				<div class="row form-group">
					<div class="col-md-4">
						<input-editorials-item
							placeholder="Adicionar ao Conteudo"
							:controller="this"
							>
						</input-editorials-item>					
					</div>
				</div>
	        </li>
        	<li class="list-group-item">
	        	 <editorials-data-item
	        	 	:has-copy="false"
	        	 	:has-edit="false"
			        :controller="this"
			      ></editorials-data-item>
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
				            <editorial-pagina-formulario-item
				            	:controller="this"
				            ></editorial-pagina-formulario-item>
				        </div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>


	<!-- FORMULARIOS PAGINA
		@formulario : formulario
		@formularios : tabela
	-->
	<template id="gerenciar-pagina-formularios-template">
        <div class="card">
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <formularios-data-item
			        :controller="this"
			      ></formularios-data-item>
			</li>
          </div>
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
			            <formulario-pagina-formulario-item
			            	:controller="this"
			            ></formulario-pagina-formulario-item>
			        </div>
			    </div>
			</div>		        
		  </div>
        </div>
	</template>



	<!-- ACCORDIONS PAGINA
		@accordion : formulario
		@accordions : tabela
	-->
	<template id="gerenciar-pagina-accordions-template">
        <div class="card">
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <accordions-data-item
			        :controller="this"
			      ></accordions-data-item>
			</li>
          </div>
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
			            <accordion-pagina-formulario-item
			            	:controller="this"
			            ></accordion-pagina-formulario-item>
			        </div>
			    </div>
			</div>		        
		  </div>
        </div>
	</template>


	<!-- BANNERS PAGINA
		@banner : formulario
		@banners : tabela
	-->
	<template id="gerenciar-pagina-banners-template">
        <div class="card">
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <banners-data-item
			        :controller="this"
			      ></banners-data-item>
			</li>
          </div>
          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
          	<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{placeholder}}</h5>
						<button type="button" class="close" @click="close()" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			            <banner-pagina-formulario-item
			            	:controller="this"
			            ></banner-pagina-formulario-item>
			        </div>
			    </div>
			</div>		        
		  </div>
        </div>
    </template>

		<!-- MAPAS PAGINA
		@banner : formulario
		@banners : tabela
	-->
	<template id="gerenciar-pagina-mapas-template">
        <div class="card">
          <div class="card-body">
        	<li class="list-group-item">
        		<button class="btn btn-danger" @click="open" type="button">
					{{placeholder}}
				</button>
        	</li>
        	<li class="list-group-item">
	        	 <mapas-data-item
			        :controller="this"
			      ></mapas-data-item>
			</li>
          </div>
          <div class="modal fade" ref="modal" role="dialog" aria-hidden="true">
          	<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{placeholder}}</h5>
						<button type="button" class="close" @click="close()" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			            <mapas-pagina-formulario-item
			            	:controller="this"
			            ></mapas-pagina-formulario-item>
			        </div>
			    </div>
			</div>		        
		  </div>
        </div>
    </template>


	<!-- VIDEOS PAGINA
		@video : formulario
		@videos : tabela
	-->
	<template id="gerenciar-pagina-videos-template">
		<div>
        	<li class="list-group-item">
        		<div class="row form-group">
	        		<div class="col-md-4">
			        	 <input-video-item
			        	 	placeholder="Adicionar Video"
					        :controller="this"
					      ></input-video-item>        			
	        		</div>
        			<div class="col-md-4">
			        	 <input-submit-item
					        :controller="this"
					      ></input-submit-item>        			
	        		</div>
        		</div>
        	</li>
        	<li class="list-group-item">
	        	 <videos-data-item
			        :controller="this"
			      ></videos-data-item>
			</li>
		</div>
    </template>


	<!-- LISTA PAGINA
		@lista : formulario
		@listas : tabela
	-->
	<template id="gerenciar-pagina-listas-template">
  		<ul class="list-group">
        	<li class="list-group-item">
        		<div class="row form-group">
        			<div class="col-md-6">
			            <input-listas-item
							placeholder="Adicionar a Lista"
							:controller="this"
							>
						</input-listas-item>
        			</div>
        		</div>
	        </li>
        	<li class="list-group-item">
	        	 <listas-data-item
	        	 	:has-copy="false"
	        	 	:has-edit="false"
			        :controller="this"
			      ></listas-data-item>
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
				            <lista-pagina-formulario-item
				            	:controller="this"
				            ></lista-pagina-formulario-item>
				        </div>
				    </div>
				</div>		        
			  </div>
		</ul>		
	</template>




	<!-- PESSOAS PAGINA
		@pessoa : formulario
		@pessoas : tabela
	-->
	<template id="gerenciar-pagina-pessoas-template">
          <div>
        	<li class="list-group-item">
                <div class="row form-group">
	        		<div class="col-md-6">
			        	 <input-pessoa-item
			        	 	placeholder="Adicionar Pessoa"
					        :controller="this"
					      ></input-pessoa-item>        			
	        		</div>
        			<div class="col-md-4">
			        	 <input-submit-item
					        :controller="this"
					      ></input-submit-item>        			
	        		</div>
        		</div>
        	</li>
        	<li class="list-group-item">
				 <pessoas-data-item
					:has-edit="true"
					:has-copy="false"
			        :controller="this"
			      ></pessoas-data-item>
			</li>
          </div>
    </template>

	<!-- GALERIAS PAGINA
		@formulario : formulario
		@formularios : tabela
	-->
	<template id="gerenciar-pagina-galerias-template">
		<galeria-pagina-formulario-item
			:controller="this"
		></galeria-pagina-formulario-item>
	</template>