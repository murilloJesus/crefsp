
	<!-- PAGINA -->
	<template id="uploader-pagina-formulario-template">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close_upload()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" v-model="controller.id" >
				    <div class="card">
				      <div class="card-body">
				        <ul class="nav nav-tabs" role="tablist">

				        <!--  ABAS PADRÃO -->
				          <li class="nav-item">
				            <a class="nav-link active" id="pagina-tab" data-toggle="tab" href="#inicial" ref="inicial" role="tab" aria-controls="pagina" aria-selected="true">Pagina</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" id="estrutura-tab" data-toggle="tab" href="#template" role="tab" aria-controls="estrutura" aria-selected="false">Configurações</a>
						  </li>
						  <li class="nav-item">
				            <a class="nav-link" id="conteudo-tab" data-toggle="tab" href="#conteudo" role="tab" aria-controls="conteudo" aria-selected="false">Conteúdo</a>
				          </li>

				          <!-- ABAS COMPONENTES -->
						  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Editorial" role="tab" v-if="template.editorial" @click="submit_for_arquives">Editorial</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Pessoas" role="tab" v-if="template.pessoas" @click="submit_for_arquives">Pessoas</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Lista" role="tab" v-if="template.lista" @click="submit_for_arquives">Lista</a>
				          </li>				          
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Accordion" role="tab" v-if="template.accordion" @click="submit_for_arquives">Accordion</a>
				          </li>
				   		  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Formulario" role="tab" v-if="template.formulario" @click="submit_for_arquives">Formulário</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Banners" role="tab" v-if="template.banner" @click="submit_for_arquives">Banners</a>
				          </li>				          
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Galeria" role="tab" v-if="template.galeria" @click="submit_for_arquives">Galeria</a>
				          </li>
				   		  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Videos" role="tab" v-if="template.video" @click="submit_for_arquives">Videos</a>
						  </li>
						  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#Modal" role="tab" v-if="template.modal" @click="submit_for_arquives">Modal</a>
				          </li>
				        </ul>

				        <div class="tab-content">

				        <!--  ABAS PADRÃO -->

				          <div class="tab-pane fade show active" id="inicial" role="tabpanel">
				            <ul class="list-group">
				              <li class="list-group-item">
				                <h3>Configurações Iniciais</h3>
				                <form class="form-horizontal" action="" method="post">
				                  <div class="form-group row">
				                    <div class="col-md-9">
									<h5>Título</h5>
				                      <input-name-item
				                      placeholder="Titulo"
				                      :controller="this.data"
				                      ></input-name-item>
				                    </div>
				                    <div class="col-md-3">
									<h5>&nbsp;</h5>
				                    	<input-status-item
				                    	placeholder="Status"
				                    	:controller="this.data"
				                    	></input-status-item>
				                    </div>
				                  </div>
				                  <div class="form-group row">
				                  	<div class=col-md-6>
									  <h5>Link Externo</h5>
				                  		<input-link-item
				                  		placeholder="Link Externo"
				                  		:controller="this.data"
				                  		></input-link-item>
				                  	</div>
			                  		<div class="col-md-3">
									  <h5>Templates</h5>
			                    		<input-templates-item
			                    			placeholder="Templates"
			                    			:controller="this.template"
			                    		></input-templates-item>
			                    	</div>
				                  </div>
				                </form>
				              </li>
				            </ul>
				          </div>

				          <div class="tab-pane fade" id="template" role="tabpanel">
				          	<ul class="list-group">
				                <li class="list-group-item">
				                	<h3>Pesquisa</h3>
						          <busca-formulario-item
				              		:controller="this"
				              	  ></busca-formulario-item>		
				                </li>
				                <li class="list-group-item">
				                	<div class="form-group row">
				                    	<div class="col-md-4">
				                			<h3>Componentes</h3>
				                		</div>
				                    </div>
									<h5>&nbsp;</h5>
				                    <templates-formulario-item
				                    	:controller="this"
				                    ></templates-formulario-item>
				                </li>
				            </ul>              	
				          </div>

				          <div class="tab-pane fade" id="Editorial" role="tabpanel">
						  <h5>&nbsp;</h5>
							<gerenciar-pagina-editorials-item
							v-if="template.editorial"
				            :controller="this"
				            ></gerenciar-pagina-editorials-item>
				          </div>

				          <div class="tab-pane fade" id="Pessoas" role="tabpanel">
						  <h5>&nbsp;</h5>
							<gerenciar-pagina-pessoas-item
							v-if="template.pessoas"
				            :controller="this"
				            ></gerenciar-pagina-pessoas-item>
						  </div>
						  
						  <div class="tab-pane fade" id="conteudo" role="tabpanel" aria-labelledby="conteudo-tab">
								<ul class="list-group">
									<li class="list-group-item">
										<div>
											<input-editor-item
												:controller="this"
											></input-editor-item>
										</div>
									</li>
								</ul>	
							</div>

				          <div class="tab-pane fade" id="Lista" role="tabpanel">
						  <h5>&nbsp;</h5>
							  <gerenciar-pagina-listas-item
							  v-if="template.lista"
				            :controller="this"
				            ></gerenciar-pagina-listas-item>
				          </div>

				          <div class="tab-pane fade" id="Accordion" role="tabpanel">
						  <h5>&nbsp;</h5>
							  <gerenciar-pagina-accordions-item
							  v-if="template.accordion"
				          	:controller="this"
				          	></gerenciar-pagina-accordions-item>
				          </div>

				          <div class="tab-pane fade" id="Formulario" role="tabpanel">
						  <h5>&nbsp;</h5>
							  <gerenciar-pagina-formularios-item
							  v-if="template.formulario"
				          	:controller="this"
				          	></gerenciar-pagina-formularios-item>
				          </div>

				          <div class="tab-pane fade" id="Banners" role="tabpanel">
						  <h5>&nbsp;</h5>
							  <gerenciar-pagina-banners-item
							  v-if="template.banner"
				          	:controller="this"
				          	></gerenciar-pagina-banners-item>
				          </div>

				          <div class="tab-pane fade" id="Galeria" role="tabpanel">
						  <h5>&nbsp;</h5>
							  <gerenciar-pagina-galerias-item
							  v-if="template.galeria"
				          		:controller="this"
				          	></gerenciar-pagina-galerias-item>
				          </div>

				          <div class="tab-pane fade" id="Videos" role="tabpanel">
						  <h5>&nbsp;</h5>
							<gerenciar-pagina-videos-item
							  	v-if="template.video"
				          		:controller="this"
				          	></gerenciar-pagina-videos-item>
				          </div>

						  <div class="tab-pane fade" id="Modal" role="tabpanel">
							<li class="list-group-item">
								<h5>Configurações de Modal</h5>
								<div class="row form-group">
									<div class="col-md-12">
									<h5>Título</h5>
										<input-name-item
											placeholder="Titulo"
											:controller="this.modal"
										></input-name-item>
									</div>

									<div class="col-md-12">
									<h5>Descrição</h5>
										<input-descricao-item
											formato="textarea"
											placeholder="Descrição"
											:controller="this.modal"
										></input-descricao-item>
									</div>
								</div>

							</li>
						  </div>
						  
				        </div>
				      </div>
				    </div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger"  type="button" @click="submit">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>
					<button class="btn btn-sm btn-secondary" @click="reset">
						<i class="fa fa-ban"></i> Resetar
					</button>
				</div>
			</div>
		</div>
	</template>

	<!-- IMAGEM -->
	<template id="uploader-imagem-formulario-template">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{placeholder}}</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="uploader-imagem-formulario" enctype="multipart/form-data">
						<div class="form-group">
						<h5>Nome da Imagem</h5>
							<input-name-item
								placeholder="Nome da Imagem"
								:controller="this"
							>
							</input-name-item>
						</div>
						<div class="form-group">
						<h5>Descrição</h5>
							<input-descricao-item
								placeholder="Descrição"
								:controller="this"
							>
							</input-descricao-item>
						</div>
						<div class="form-group">
						<h5>Selecione a Imagem</h5>
							<input-uploader-item
								placeholder="Imagem"
								:controller="this"
								>
							</input-uploader-item>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger"  type="button" @click="submit">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>
					<button class="btn btn-sm btn-secondary" @click="reset">
						<i class="fa fa-ban"></i> Resetar
					</button>
				</div>
			</div>
		</div>
	</template>


	<!-- ARQUIVO -->
	<template id="uploader-arquivo-formulario-template">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{placeholder}}</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="uploader-arquivo-formulario" enctype="multipart/form-data">
						<div class="form-group">
							<h5>Nome do Arquivo</h5>	
							<input-name-item
								placeholder="Nome do Arquivo"
								:controller="this"
							>
							</input-name-item>
						</div>
						<div class="form-group">
							<h5>Descrição</h5>
							<input-descricao-item
								placeholder="Descrição"
								:controller="this"
							>
							</input-descricao-item>
						</div>
						<div class="form-group">
							<input-uploader-item
								placeholder="Arquivo"
								:controller="this"
								>
							</input-uploader-item>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger"  type="button" @click="submit">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>
					<button class="btn btn-sm btn-secondary" @click="reset">
						<i class="fa fa-ban"></i> Resetar
					</button>
				</div>
			</div>
		</div>
	</template>


	<!-- PESSOA -->
	<template id="uploader-pessoa-formulario-template">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="controller.close_upload" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
			          <li class="list-group-item">
			            <h3>Configurações Iniciais</h3>
			            <form class="form-horizontal" action="" method="post">
			              	<div class="form-group row">
								<div class="col-md-4">
									<h5>Nome</h5>
									<input-name-item
										placeholder="Nome"
										:controller="this.data"
										>
									</input-name-item>
								</div>
			            	</div>
			            <div class="form-group row">
			                <div class="col-md-4">
							<h5>Topo</h5>
			                  <input-cargo-item
									placeholder="Topo"
									:controller="this.data"
									>
								</input-cargo-item>
			                </div>
			                <div class="col-md-4">
							<h5>Rodapé</h5>
			                	<input-doc-item
									placeholder="Rodapé"
									:controller="this.data"
									>
								</input-doc-item>
			                </div>
			                <div class="col-md-4">
							<h5>Selecione a Imagem</h5>
								<input-imagem-item
								placeholder="Selecione a Imagem"
								:require=true
								:controller="this.data"
								>  
			                </div>
			              </div>
			            </form>
			          </li>
			          <li class="list-group-item">
			            <h3>Conteúdo
			              <label class="switch switch-label switch-pill switch-danger" data-toggle="collapse" data-target="#collapseConteudo" aria-expanded="false" aria-controls="collapseConteudo">
			                <input class="switch-input" type="checkbox">
			                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
			              </label>
			            </h3> 
			            <div class="collapse" id="collapseConteudo">
						<h5>&nbsp;</h5>
			              <input-editor-item
			              :controller="this"
			              >
			              </input-editor-item>
			            </div>
			          </li>
			        </ul>	
			    </div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger" type="button" @click="submit()">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>
					<button class="btn btn-sm btn-secondary" @click="reset">
						<i class="fa fa-ban"></i> Resetar
					</button>
				</div>
			</div>
		</div>
	</template>

	<!-- CATEGORIAS -->
	<template id="uploader-categoria-formulario-template">
		<div class="modal-dialog" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{placeholder}}</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
			          <li class="list-group-item">
			              <div class="form-group row">
			                <div class="col-md-12">
							<h5>Nome</h5>
								<input-name-item
									placeholder="Nome"
									:controller="this"
									>
								</input-name-item>
			                </div>
			            </div>
			          </li>
			        </ul>	
			    </div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger" type="button" @click="submit">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>
				</div>
			</div>
		</div>
	</template>

<!-- VIDEO -->
<template id="uploader-video-formulario-template">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Link</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
						<h5>Nome do Vídeo</h5>
							<input-name-item
								placeholder="Nome do Video"
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
						<h5>URL</h5>
							<input-link-item
								placeholder="Url"
								:controller="this.data"
							>
							</input-link-item>
						</div>
						<div class=form-group>
							<show-video-item
								:controller="this.data"
							>
							</show-video-item>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger" type="button" @click="submit">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>
					<button class="btn btn-sm btn-secondary"  @click="reset">
						<i class="fa fa-ban"></i> Resetar
					</button>
				</div>
			</div>
		</div>
	</template>
