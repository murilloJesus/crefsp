
<!-- FORMULARIOS FINAIS -->



	<!-- PAGINAS -->
	<template id="pagina-formulario-template">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close" aria-label="Close">
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
				            <a class="nav-link active" id="pagina-tab" data-toggle="tab" ref="inicial" href="#paiinicial" role="tab" aria-controls="pagina" aria-selected="true">Pagina</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" id="estrutura-tab" data-toggle="tab" href="#paitemplate" role="tab" aria-controls="estrutura" aria-selected="false">Configurações</a>
						  </li>
						  <li class="nav-item">
				            <a class="nav-link" id="conteudo-tab" data-toggle="tab" href="#paiconteudo" role="tab" aria-controls="conteudo" aria-selected="false">Conteúdo</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" id="estrutura-tab" data-toggle="tab" href="#paiestrutura" role="tab" aria-controls="estrutura" @click="submit_for_arquives">Estrutura</a>
				          </li>

				          <!-- ABAS COMPONENTES -->
						  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiEditorial" role="tab" v-if="template.editorial" @click="submit_for_arquives">Editorial</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiPessoas" role="tab" v-if="template.pessoas" @click="submit_for_arquives">Pessoas</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiLista" role="tab" v-if="template.lista" @click="submit_for_arquives">Lista</a>
				          </li>				          
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiAccordion" role="tab" v-if="template.accordion" @click="submit_for_arquives">Accordion</a>
				          </li>
				   		  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiFormulario" role="tab" v-if="template.formulario" @click="submit_for_arquives">Formulário</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiBanners" role="tab" v-if="template.banner" @click="submit_for_arquives">Banners</a>
				          </li>				          
				          <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiGaleria" role="tab" v-if="template.galeria" @click="submit_for_arquives">Galeria</a>
				          </li>
				   		  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiVideos" role="tab" v-if="template.videos" @click="submit_for_arquives">Videos</a>
						  </li>
						  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiMapas" role="tab" v-if="template.mapas" @click="submit_for_arquives">Mapas</a>
						  </li>
						  <li class="nav-item">
				            <a class="nav-link" data-toggle="tab" href="#paiModal" role="tab" v-if="template.modal" @click="submit_for_arquives">Modal</a>
				          </li>
				        </ul>

				        <div class="tab-content">

				        <!--  ABAS PADRÃO -->

				          <div class="tab-pane fade show active" id="paiinicial" role="tabpanel">
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
				                  		<input-source-item
				                  		placeholder="Link"
				                  		:controller="this.data"
				                  		></input-source-item>
				                  	</div>
									<div class="col-md-3">
									<h5>Pai</h5>
			                    		<input-menu-item
			                    			placeholder="Selecione a Pagina"
			                    			:controller="this.data"
			                    		></input-menu-item>
			                    	</div>
				                  </div>
				                </form>
				              </li>
				            </ul>
				          </div>

				          <div class="tab-pane fade" id="paitemplate" role="tabpanel">
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
				                    <templates-formulario-item
				                    	:controller="this"
				                    ></templates-formulario-item>
				                </li>
				            </ul>              	
						  </div>
						  
						  <div class="tab-pane fade" id="paiconteudo" role="tabpanel" aria-labelledby="conteudo-tab">
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

				          <div class="tab-pane fade" id="paiestrutura" role="tabpanel">
				          	<gerenciar-filho-paginas-item
				             :uploader="true"
				          	 :controller="this"
				          	></gerenciar-filho-paginas-item>
				          </div>

				          <div class="tab-pane fade" id="paiEditorial" role="tabpanel">
							<gerenciar-pagina-editorials-item
							v-if="template.editorial"
				            :controller="this"
				            ></gerenciar-pagina-editorials-item>
				          </div>

				          <div class="tab-pane fade" id="paiPessoas" role="tabpanel">
							<gerenciar-pagina-pessoas-item
							v-if="template.pessoas"
				            :controller="this"
				            ></gerenciar-pagina-pessoas-item>
				          </div>

				          <div class="tab-pane fade" id="paiLista" role="tabpanel">
							  <gerenciar-pagina-listas-item
							  v-if="template.lista"
				            :controller="this"
				            ></gerenciar-pagina-listas-item>
				          </div>

				          <div class="tab-pane fade" id="paiAccordion" role="tabpanel">
							  <gerenciar-pagina-accordions-item
							  v-if="template.accordion"
				          	:controller="this"
				          	></gerenciar-pagina-accordions-item>
				          </div>

				          <div class="tab-pane fade" id="paiFormulario" role="tabpanel">
						  		<li class="list-group-item">
									<h5> Enviar para Email </h5>	
								  <input-text-item 
										:controller="this.data"
										field="email_receiver"
									>
								</li>
							  <gerenciar-pagina-formularios-item
							  v-if="template.formulario"
				          	:controller="this"
				          	></gerenciar-pagina-formularios-item>
				          </div>

				          <div class="tab-pane fade" id="paiBanners" role="tabpanel">
							  <gerenciar-pagina-banners-item
							  v-if="template.banner"
				          	:controller="this"
				          	></gerenciar-pagina-banners-item>
				          </div>

				          <div class="tab-pane fade" id="paiGaleria" role="tabpanel">
							  <gerenciar-pagina-galerias-item
				          		:controller="this"
				          	></gerenciar-pagina-galerias-item>
				          </div>

				          <div class="tab-pane fade" id="paiVideos" role="tabpanel">
							<gerenciar-pagina-videos-item
							  	v-if="template.videos"
				          		:controller="this"
				          	></gerenciar-pagina-videos-item>
				          </div>

						  <div class="tab-pane fade" id="paiMapas" role="tabpanel">
							<gerenciar-pagina-mapas-item
							  	v-if="template.mapas"
				          		:controller="this"
				          	></gerenciar-pagina-mapas-item>
				          </div>

						  <div class="tab-pane fade" id="paiModal" role="tabpanel">
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


	<!-- EVENTO -->
	<template id="evento-formulario-template">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <div class="card">
					  <input type="hidden" v-model="controller.id">
				      <div class="card-body">
				        <ul class="nav nav-tabs" role="tablist">
				          <li class="nav-item">
				            <a class="nav-link active" id="evento-tab" data-toggle="tab" href="#evento" role="tab" aria-controls="evento" aria-selected="true">Evento</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" id="programacao-tab" data-toggle="tab" href="#programacao" role="tab" aria-controls="programacao" aria-selected="false">Programação</a>
				          </li>
						  <li class="nav-item">
				            <a class="nav-link" id="palestras-tab" data-toggle="tab" href="#palestras" role="tab" aria-controls="palestras" aria-selected="false">Palestras</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link"@click="submit_for_arquives()" id="palestrantes-tab" data-toggle="tab" href="#palestrantes" role="tab" aria-controls="palestrantes"  aria-selected="false">Palestrantes</a>
				          </li>
				          <li class="nav-item">
				            <a class="nav-link" @click="submit_for_arquives()" id="inscricao-tab" data-toggle="tab" href="#inscricao" role="tab" aria-controls="inscricao" aria-selected="false">Inscrição</a>
				          </li>
				        </ul>
				        <div class="tab-content">
				          <div class="tab-pane fade show active" id="evento" role="tabpanel">
			                <h3>Configurações Iniciais</h3>
			                  <div class="form-group row">
			                    <div class="col-md-8">
									<h5>Título</h5>
									<input-name-item
										placeholder="Titulo"
										:controller="this.data"
									></input-name-item>
			                    </div>
			                    <div class=col-md-2>
									<h5>&nbsp;</h5>
			                    	<input-status-item
			                    		placeholder="Status"
			                    		:controller="this.data"
			                    	></input-status-item>
			                    </div>
			                    <div class=col-md-2>
									<h5>&nbsp;</h5>
			                    	<input-destaque-item
			                    		placeholder="Destaque"
			                    		:controller="this.data"
			                    	></input-destaque-item>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <div class="col-md-4">
									<h5>Categoria</h5>
				                    <input-categoria-item
										placeholder="Categoria"
										type="evento"
										:controller="this.data"
										>
									</input-categoria-item>
			                    </div>
			                    <div class="col-md-4">
									<h5>Selecione a Imagem</h5>
				                    <input-imagem-item
										placeholder="Selecione a Imagem"
										:require=true
										:controller="this.data"
									></input-imagem-item>
			                    </div>
			                    <div class="col-md-4">
									<h5>Data</h5>
			                      	<input-data-hora-item
										type=4
										field="data"
										placeholder="Data"
										:controller="this.data"
			                     	></input-data-hora-item>
			                    </div>
							  </div>
							  
							  <div class="form-group row" id="colDestaque">
							  	<div class="col-md-4">
							  		<h5>Destaque Pequeno</h5>
									<input-imagem-item
										placeholder="Destaque Pequeno"
										:require="true"
										field="destaque_pequeno"
										:controller="this.data"
									></input-imagem-item>                    
								</div>
								<div class="col-md-4">
									<h5>Médio</h5>
									<input-imagem-item
										placeholder="Destaque Médio"
										:require="true"
										field="destaque_medio"
										:controller="this.data"
									></input-imagem-item>                       
								</div>
								<div class="col-md-4">
									<h5>Grande</h5>
									<input-imagem-item
										placeholder="Destaque Grande"
										:require="true"
										field="destaque_grande"
										:controller="this.data"
									></input-imagem-item>                       
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
			                    <div class="col-md-8">
									<h5>Endereço</h5>
									<input-local-item
										placeholder="Endereço"
										:controller="this.data"
									></input-local-item>
			                    </div>
							  </div>
							  <div class="form-group row">
								<div class="col-md-12">
									<h5>Complemento</h5>
									<input-text-item
										placeholder="Complemento"
										:controller="this.data"
										field="endereco"
									></input-text-item>
								</div>
							</div>
				          </div>
				          <div class="tab-pane fade" id="programacao" role="tabpanel">
				            <ul class="list-group">
				              <li class="list-group-item">
				                <div>
								<h5>&nbsp;</h5>
				                  <input-editor-item
				                  :controller="this"
				                  ></input-editor-item>
				                </div>
				              </li>
				            </ul>
				          </div>
						  <div class="tab-pane fade" id="palestras" role="tabpanel">
				            <ul class="list-group">
				              <li class="list-group-item">
				                <div>
								<h5>&nbsp;</h5>
				                  <input-editor-item
				                  :controller="this"
								  hash="editor_palestras"
				                  ></input-editor-item>
				                </div>
				              </li>
				            </ul>
				          </div>
				          <div class="tab-pane fade" id="palestrantes" role="tabpanel">
			              	<gerenciar-filho-pessoas-item
			              		:controller="this"
			              	></gerenciar-filho-pessoas-item>
				          </div>
				          <div class="tab-pane fade" id="inscricao" role="tabpanel">
				            <gerenciar-filho-agenda-item
				            	:controller="this"
				            ></gerenciar-filho-agenda-item>
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

	<!-- BANNERS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	 -->
	 <template id="categorias-eventos-formulario-template">	
		<div class="row form-group">
			<input type="hidden" v-model="controller.id" name="">
			<div class="col-md-3">
				<h5>Título</h5>
				<input-name-item
				placeholder="Titulo"
				:controller="this.data"
				></input-name-item>
			</div>
			<div class="col-md-3">
				<h5>Indice</h5>
				<input-text-item
				placeholder="Indice"
				:controller="this.data"
				field="indice"
				></input-text-item>
			</div>
			<div class="col-md-2">
				<h5>&nbsp;</h5>
				<input-status-item
				placeholder="Status"
				:controller="this.data"
				></input-status-item>
			</div>
			<div class="col-md-1">
				<h5>&nbsp;</h5>
				<input-submit-item
				:controller="this"
				></input-submit-item>
			</div>
		</div>	
	</template>



		<!-- BANNERS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	 -->
	 <template id="categorias-licitacoes-formulario-template">	
		<div class="row form-group">
			<input type="hidden" v-model="controller.id" name="">
			<div class="col-md-3">
				<h5>Título</h5>
				<input-name-item
				placeholder="Titulo"
				:controller="this.data"
				></input-name-item>
			</div>
			<div class="col-md-3">
				<h5>Indice</h5>
				<input-text-item
				placeholder="Indice"
				:controller="this.data"
				field="indice"
				></input-text-item>
			</div>
			<div class="col-md-2">
				<h5>&nbsp;</h5>
				<input-status-item
				placeholder="Status"
				:controller="this.data"
				></input-status-item>
			</div>
			<div class="col-md-1">
				<h5>&nbsp;</h5>
				<input-submit-item
				:controller="this"
				></input-submit-item>
			</div>
		</div>	
	</template>



	<!-- BANNERS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	 -->
	 <template id="categorias-vagas-formulario-template">	
		<div class="row form-group">
			<input type="hidden" v-model="controller.id" name="">
			<div class="col-md-3">
				<h5>Título</h5>
				<input-name-item
				placeholder="Titulo"
				:controller="this.data"
				></input-name-item>
			</div>
			<div class="col-md-3">
				<h5>Indice</h5>
				<input-text-item
				placeholder="Indice"
				:controller="this.data"
				field="indice"
				></input-text-item>
			</div>
			<div class="col-md-2">
				<h5>&nbsp;</h5>
				<input-status-item
				placeholder="Status"
				:controller="this.data"
				></input-status-item>
			</div>
			<div class="col-md-1">
				<h5>&nbsp;</h5>
				<input-submit-item
				:controller="this"
				></input-submit-item>
			</div>
		</div>	
	</template>

	<!-- BANNERS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	 -->
	 <template id="categorias-noticia-formulario-template">	
		<div class="row form-group">
			<input type="hidden" v-model="controller.id" name="">
			<div class="col-md-3">
				<h5>Título</h5>
				<input-name-item
				placeholder="Titulo"
				:controller="this.data"
				></input-name-item>
			</div>
			<div class="col-md-3">
				<h5>Indice</h5>
				<input-text-item
				placeholder="Indice"
				:controller="this.data"
				field="indice"
				></input-text-item>
			</div>
			<div class="col-md-2">
				<h5>&nbsp;</h5>
				<input-status-item
				placeholder="Status"
				:controller="this.data"
				></input-status-item>
			</div>
			<div class="col-md-1">
				<h5>&nbsp;</h5>
				<input-submit-item
				:controller="this"
				></input-submit-item>
			</div>
		</div>	
	</template>




	<!-- MULTIMIDIA -->
	<template id="multimidia-formulario-template">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs" id="myTab1" role="tablist">
						<li class="nav-item">
						<a class="nav-link active" id="multimdia-tab" data-toggle="tab" href="#multimdia" role="tab" aria-controls="multimdia" aria-selected="true">Multimidia</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" @click="submit_for_arquives()" aria-selected="false">Videos</a>
						</li>
					</ul>
					<div class="tab-content" id="myTab1Content">
						<div class="tab-pane fade show active" id="multimdia" role="tabpanel" aria-labelledby="multimdia-tab">
						<ul class="list-group">
							<li class="list-group-item">
							<h3>Configurações Iniciais</h3>
								<input type="hidden" v-model="controller.id">
								<div class="form-group row">
								<div class="col-md-12">
								<h5>Título</h5>
									<input-name-item
									placeholder="Titulo"
									:controller="this.data"
									>
									</input-name-item>
								</div>
								</div>
							</form>
							</li>
						</ul>
						</div>
						<div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
						<h5>&nbsp;</h5>
						<gerenciar-filho-videos-item
							:controller="this"
						></gerenciar-filho-videos-item>
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

	<!-- VAGAS -->
	<template id="vagas-formulario-template">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs" id="myTab1" role="tablist">
						<li class="nav-item">
						<a class="nav-link active" id="vaga-tab" data-toggle="tab" href="#vaga" role="tab" aria-controls="vaga" aria-selected="true">Dados</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="conteudo-tab" data-toggle="tab" href="#conteudo" role="tab" aria-controls="conteudo" aria-selected="false">Conteúdo</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="arquivos-tab" data-toggle="tab" href="#arquivos" role="tab" @click="submit_for_arquives()" aria-controls="arquivos" aria-selected="false">Arquivos</a>
						</li>
					</ul>
					<div class="tab-content" id="myTab1Content">
						<div class="tab-pane fade show active" id="vaga" role="tabpanel" aria-labelledby="vaga-tab">
						<ul class="list-group">
							<li class="list-group-item">
							<h3>Configurações Iniciais</h3>
								<input type="hidden" v-model="controller.id">
								<div class="form-group row">
								<div class="col-md-6">
								<h5>Nome</h5>
									<input-name-item
									placeholder="Nome"
									:controller="this.data"
									>
									</input-name-item>
								</div>
								<div class="col-md-4">
								<h5>Cidade</h5>
								<input-cidade-item
								placeholder="Cidade"
								:controller="this.data"        		
								></input-cidade-item>
								</div>
								<div class="col-md-2">
								<h5>Categoria</h5>
								<input-categoria-item
									placeholder="Categoria"
									type="vaga"
									:controller="this.data"
									>
								</input-categoria-item>
								</div>
								</div>
								<div class="form-group row">
								<div class="col-md-8">
								<h5>Descrição</h5>
								<input-descricao-item
									placeholder="Descrição"
									:controller="this.data"
								></input-descricao-item>
								</div>
								<div class="col-md-4">
								<h5>Data</h5>
									<input-data-hora-item
									type="1"
									field="data"
									placeholder="Data"
									:controller="this.data"
									></input-data-hora-item>
								</div>

								</div>
							</form>
							</li>
						</ul>
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
						<div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="arquivos-tab">
						<gerenciar-filho-arquivos-item
							:controller="this"
						></gerenciar-filho-arquivos-item>
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


	<!-- LICITACAO -->
	<template id="licitacoes-formulario-template">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs" id="myTab1" role="tablist">
						<li class="nav-item">
						<a class="nav-link active" id="licitacao-tab" data-toggle="tab" href="#licitacao" role="tab" aria-controls="licitacao" aria-selected="true">Licitação</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="conteudo-tab" data-toggle="tab" href="#conteudo" role="tab" aria-controls="conteudo" aria-selected="false">Conteúdo</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="arquivos-tab" data-toggle="tab" href="#arquivos" role="tab" @click="submit_for_arquives()" aria-controls="arquivos" aria-selected="false">Arquivos</a>
						</li>
					</ul>
					<div class="tab-content" id="myTab1Content">
						<div class="tab-pane fade show active" id="licitacao" role="tabpanel" aria-labelledby="licitacao-tab">
						<ul class="list-group">
							<li class="list-group-item">
							<h3>Configurações Iniciais</h3>
								<input type="hidden" v-model="controller.data.id">
								<div class="form-group row">
								<div class="col-md-6">
								<h5>Nome</h5>
									<input-name-item
									placeholder="Nome"
									:controller="this.data"
										>
									</input-name-item>
								</div>
								<div class="col-md-4">
								<h5>Categoria</h5>
									<input-categoria-item
									placeholder="Tipo"
									type="licitacao"
									:controller="this.data"
									></input-categoria-item>
								</div>
								<div class="col-md-2">
								<h5>&nbsp;</h5>
									<input-status-item
									placeholder="Aberto"
									:controller="this.data"
									></input-status-item>
								</div>
								</div>
								
							<div class="form-group row">
								<div class="col-md-12">
								<h5>Objeto</h5>
									<input-objeto-item
									placeholder="objeto"
									:controller="this.data"
										>
									</input-objeto-item>
								</div>
							</div>
								<div class="form-group row">
								<div class="col-md-3">
								<h5>Processo</h5>
									<input-processo-item
									placeholder="Processo"
									:controller="this.data"
									></input-processo-item>
								</div>
								<div class="col-md-3">
								<h5>Data e Hora</h5>
									<input-data-hora-item
									type="2"
									field="data"
									placeholder="Abertura"
									:controller="this.data"
									></input-data-hora-item>
								</div>
								<div class="col-md-6">
								<h5>Local</h5>
									<input-local-item
									placeholder="Local"
									:controller="this.data"
									>
									</input-local-item>
								</div>
								</div>
								<div class="form-group row">
									<div class="col-md-3">
									<h5>Número</h5>
										<input-numero-item
										placeholder="Número"
										:controller="this.data"
										></input-numero-item>
									</div>	
									<div class=col-md-2>
										<h5>&nbsp;</h5>
										<input-extrato-item
											placeholder="Extrato"
											:controller="this.data"
										></input-extrato-item>
			                    	</div>									  
								</div>

							</form>
							</li>
						</ul>
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
						<div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="arquivos-tab">
						<gerenciar-filho-arquivos-item
							:controller="this"
						></gerenciar-filho-arquivos-item>
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


	<!-- NOTICIA -->
	<template id="noticia-formulario-template">
		<div>
	        <ul class="nav nav-tabs" id="myTab1" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" id="noticia-tab" data-toggle="tab" href="#noticia" role="tab" aria-controls="noticia" aria-selected="true">Notícia</a>
			  </li>
			  <li class="nav-item">
	            <a class="nav-link" id="conteudo-tab" data-toggle="tab" href="#conteudo" role="tab" aria-controls="conteudo" aria-selected="false">Conteudo</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" id="galeria-tab" data-toggle="tab" href="#galeria" role="tab" aria-controls="galeria" aria-selected="false">Galeria</a>
	          </li>
	        </ul>
	        <div class="tab-content" id="myTab1Content">
	          <div class="tab-pane fade show active" id="noticia" role="tabpanel" aria-labelledby="noticia-tab">
                <!-- <h3>Configurações Iniciais</h3> -->
					<form ref="form">
						<input type=hidden v-model=controller.id>
						<div class="form-group row">
							<div class="col-md-10">
							<h5>Título</h5>
								<input-name-item
									placeholder="Titulo"
									:controller="this.data"
								></input-name-item>
							</div>
							<div class="col-md-2">
								<input-destaque-item
									:controller="this.data"
								></input-destaque-item>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
							<h5>Autor</h5>
								<input-autor-item
									placeholder="Autor"
									:controller="this.data"
								></input-autor-item>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
							<h5>Descrição</h5>
								<input-descricao-item
									placeholder="Descrição"
									:controller="this.data"
								></input-descricao-item>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">
								<h5>Categoria</h5>
								<input-categoria-item
								placeholder="Categoria"
								type="noticia"
								:controller="this.data"
								></input-categoria-item>
							</div>
							<div class="col-md-4">
								<h5>Selecione a Imagem de Topo</h5>
								<input-imagem-item
									placeholder="Selecione a Imagem de Topo"
									:require=true
									:controller="this.data"
								></input-imagem-item> 
							</div>
							<div class="col-md-4">
							<h5>Data</h5>
								<input-data-hora-item
									:controller="this.data"
									field="data"
									placeholder="Data"	
									type=2
								></input-data-hora-item> 
							</div>
						</div>

						<div class="form-group row" id="colDestaque">
							<div class="col-md-4">
							<h5>Destaque Pequeno</h5>
								 <input-imagem-item
								    placeholder="Destaque Pequeno"
									:require="true"
								 	field="destaque_pequeno"
								 	:controller="this.data"
								 >
								 </input-imagem-item>                    
							</div>
							<div class="col-md-4">
							<h5>Destaque Médio</h5>
							<input-imagem-item
								    placeholder="Destaque Médio"
									:require="true"
								 	field="destaque_medio"
								 	:controller="this.data"
								 >
								 </input-imagem-item>                       
							</div>
							<div class="col-md-4">
							<h5>Destaque Grande</h5>
							<input-imagem-item
								    placeholder="Destaque Grande"
									:require="true"
								 	field="destaque_grande"
								 	:controller="this.data"
								 >
								 </input-imagem-item>                       
							</div>	
						</div>					
					</form>       
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
	          <div class="tab-pane fade" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
					<gerenciar-pagina-galerias-item
						:controller="this"
					></gerenciar-pagina-galerias-item>		
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
	</template>

	<!-- CLUBE -->
	<template id="clube-formulario-template">
	    <ul class="list-group">
          <li class="list-group-item">
            <h3>Configurações Iniciais</h3>
            <form class="form-horizontal" action="" method="post">
            	<input type="hidden" v-model="controller.id">
				<div class="row form-group">
					<div class="col-md-10">
					<h5>Título</h5>
						<input-name-item
						placeholder="Título"
						:controller="this.data"
						></input-name-item>
					</div>
					<div class="col-md-2">
					<h5>&nbsp;</h5>
						<input-status-item
						placeholder="Status"
						:controller="this.data"
						></input-status-item>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
					<h5>Imagem</h5>
						<input-imagem-item
						placeholder="Imagem"
						:require="true"
						:controller="this.data"
						></input-imagem-item>
					</div>
					<div class="col-md-4">
					<h5>Categoria</h5>
						<input-categoria-item
						placeholder="Categoria"
						type="clube"
						:controller="this.data"
						></input-categoria-item>
					</div>
					<div class="col-md-4">
					<h5>Site</h5>
						<input-site-item
						placeholder="Site"
						:controller="this.data"
						></input-site-item>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
					<h5>Cidade</h5>
						<input-cidade-item
						placeholder="Cidade"
						:controller="this.data"
						></input-telefone-item>
					</div>
					<div class="col-md-8">
					<h5>Endereço</h5>
						<input-local-item
						placeholder="Endereço"
						:controller="this.data"
						></input-local-item>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
					<h5>Telefone</h5>
						<input-telefone-item
						placeholder="Telefone"
						:controller="this.data"
						></input-telefone-item>
					</div>
					<div class="col-md-8">
						<h5>Complemento</h5>
						<input-text-item
							placeholder="Complemento"
							:controller="this.data"
							field="endereco"
						></input-text-item>
					</div>
				</div>			
            </form>
          </li>
          <li class="list-group-item">
            <h3>Conteúdo
              <label class="switch switch-label switch-pill switch-danger" data-toggle="collapse"  data-target="#collapseConteudo"  ref="editor_controller" aria-expanded="false" aria-controls="collapseConteudo">
                <input class="switch-input" type="checkbox" ref="show_editor">
                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </h3> 
            <div class="collapse" id="collapseConteudo">
       	    	<input-editor-item
					:controller="this"
				></input-editor-item>
            </div>
          </li>
          <li class="list-group-item">
				<button class="btn btn-sm btn-danger" @click="add" type="button">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset" type="button">
					<i class="fa fa-ban"></i> Resetar
				</button>
		  </li>
        </ul>	
	</template>

	<!-- PESSOA -->
	<template id="pessoas-formulario-template">
	    <ul class="list-group">
          <li class="list-group-item">
            <h3>Configurações Iniciais</h3>
            <form class="form-horizontal" action="" method="post">
            	<input type="hidden" v-model="controller.id">
              <div class="form-group row">
                <div class="col-md-8">
				<h5>Nome</h5>
					<input-name-item
						placeholder="Nome"
						:controller="this.data"
						>
					</input-name-item>
				</div>
				<div class="col-md-4">
				<h5>Índice</h5>
					<input-text-item
						placeholder="Índice"
						:controller="this.data"
						field="indice"
						>
					</input-text-item>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                  <input-cargo-item
						placeholder="Cargo"
						:controller="this.data"
						>
					</input-cargo-item>
                </div>
                <div class="col-md-4">
                	<input-doc-item
						placeholder="Doc Cresp"
						:controller="this.data"
						>
					</input-doc-item>
                </div>
                <div class="col-md-4">
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
              <label class="switch switch-label switch-pill switch-danger" data-toggle="collapse"  data-target="#collapseConteudo"  ref="editor_controller" aria-expanded="false" aria-controls="collapseConteudo">
                <input class="switch-input" type="checkbox" ref="show_editor">
                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </h3> 
            <div class="collapse" id="collapseConteudo">
       	    	<input-editor-item
					:controller="this"
				></input-editor-item>
            </div>
          </li>
          <li class="list-group-item">
				<button class="btn btn-sm btn-danger" @click="add" type="button">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset" type="button">
					<i class="fa fa-ban"></i> Resetar
				</button>
		  </li>
        </ul>	
	</template>

	<!-- ARQUIVOS -->
	<template id="arquivo-formulario-template">
		<div>
					
			<div class="row form-group">
				<div class="col-md-12">
				<h5>Nome do Arquivo</h5>
					<input-name-item
						placeholder="Nome do Arquivo"
						:controller="this"
					>
					</input-name-item>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
				<h5>Descrição</h5>
					<input-descricao-item
						placeholder="Descrição"
						:controller="this"
					>
					</input-descricao-item>
				</div>			
				<div class="col-md-4">
				<h5>Arquivo</h5>
					<input-uploader-item
						placeholder="Arquivo"
						:controller="this"
						>
					</input-uploader-item>
				</div>
				<div class="col-md-4">
				<h5>&nbsp;</h5>
					<input-submit-item
					:controller="this"
					></input-submit-item>
				</div>
				
			</div>
		</div>
	</template>

	<!-- VIDEOS -->
	<template id="video-formulario-template">
		<div>				
			<div class="row form-group">
				<div class="col-md-6">
				<h5>Vídeo</h5>
					<input-video-item
						placeholder="Video"
						:controller="this"
					>
					</input-video-item>
				</div>
				<div class="col-md-2">
				<h5>&nbsp;</h5>
					<input-submit-item
					:controller="this"
					></input-submit-item>
				</div>
			</div>
		</div>
	</template>

	<!-- galerias
		@imagens : []
		@name: text		
		-->
	<template id="galerias-formulario-template">
	    <ul class="list-group">
	      <li class="list-group-item">
	      	<input type="hidden" v-model="controller.id" name="">
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
	              <input-imagem-item
	              placeholder="Nova Imagem"
	              :require="true"
	              :controller="this.data"
	              ></input-imagem-item>
	            </div>
	            <div class="col-md-1">
				<h5>&nbsp;</h5>
	                <input-submit-item
	                :controller="this.data"
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
	      <li class="list-group-item">
	  			<button class="btn btn-sm btn-danger" @click="add" type="button">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset" type="button">
					<i class="fa fa-ban"></i> Resetar
				</button>    	
	      </li>
	    </ul>
	</template>

	<!-- usuarios
		@name : text
		@permissoes : selector
		@email : text
		@password : text
		-->
	<template id="usuarios-formulario-template">
		<form>
			<input type="hidden" v-model="controller.id" >
			<li class="list-group-item">
				<h3>Credenciais</h3>
				<form class="form-horizontal" action="createUser" method="get">

					<div class="form-group row">
						<div class="col-md-8">
							<h5>Nome</h5>
							<input-name-item
								placeholder="Nome"
								:controller="this.data"
							></input-name-item>
						</div>
						<div class="col-md-4">
							<h5>Permissões</h5>
							<input-permissoes-item
								placeholder="Permissões"
								:controller="this.data"
							></input-permissoes-item>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-8">
							<h5>Email</h5>
							<input-email-item
							placeholder="Email"
							:controller="this.data"
							></input-email-item>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-8">
							<input-password-item
								v-if="controller.placeholder == 'Adicionar'"
								placeholder="Senha"
								:controller="this.data"
							></input-password-item>
						</div>
					</div>
			</li>
			<li class="list-group-item">
				<button class="btn btn-sm btn-danger" @click="add" type="button">
					<i class="fa" :class="request.icone"></i> Enviar
				</button>
				<button class="btn btn-sm btn-secondary" @click="reset" type="button">
					<i class="fa fa-ban"></i> Resetar
				</button>
			</li>
		</form>
	</template>

	<!-- permissoes 
	-->
	<template id="permissoes-formulario-template">	
        <form class="form-horizontal" action="" method="post">
			<input type="hidden" v-model="this.controller.id">			
                <li class="list-group-item">
                  <div class="form-group row">
                    <div class="col-md-12">
					<h5>Título</h5>
                    	<input-name-item
							placeholder="Titulo"
							:controller="this.data"
						></input-name-item>
                    </div>
                  </div>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> <h3>Todos</h3> </a>
                   <label class="switch switch-label switch-pill switch-danger">
                      <input class="switch-input" type="checkbox" v-model="todos" @change="mudar" checked="true">
                      <span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
                    </label>
                </li>
				<li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Home </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.home" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Paginas </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.paginas" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Noticias </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.noticias" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Eventos </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.eventos" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Licitações </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.licitacoes" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Emprego e Concurso </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.emprego" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Multimidia </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.multimidia" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
				<li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Parcerias e Benefícios </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.clube" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
				<li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Unidades Móveis </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.unidades" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Gerenciar - Pessoas </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.pessoas" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Gerenciar - Formularios</a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.formularios" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
                <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                  <a> Usuários </a>
  	               <label class="switch switch-label switch-pill switch-danger">
            					<input class="switch-input" v-model="data.usuarios" type="checkbox" checked="true">
            					<span class="switch-slider" data-checked="✓" data-unchecked="✕"></span>
          					</label>
                </li>
	            <li class="list-group-item">
	              <button class="btn btn-sm btn-danger" type="button" @click="add">
	                <i class="fa" :class="request.icone"></i> Enviar</button>
	              <button class="btn btn-sm btn-secondary" type="button" @click="reset">
	                <i class="fa fa-ban"></i> Resetar </button>
	            </li>
	    </form>
	</template>

	<!-- TEMA 
		@name : texto
		@head : selector
		@foot : selector
		@status : checkbox
	-->
	<template id="tema-formulario-template">	
		<div class="row form-group">
			<input type="hidden" v-model="controller.id">			
			<div class="col-md-3">
				<h5>Título</h5>
				<input-name-item
				placeholder="Titulo"
				:controller="this.data"
				></input-name-item>
			</div>
			<div class="col-md-3">
				<h5>Topo</h5>
				<input-head-item
				placeholder="Topo"
				:require="true"
				:controller="this.data"
				></input-head-item>
			</div>
			<div class="col-md-3">
				<h5>Rodapé</h5>
				<input-foot-item
				placeholder="Rodapé"
				:require="true"
				:controller="this.data"
				></input-foot-item>
			</div>
			<div class="col-md-2">
				<h5>&nbsp;</h5>
				<input-status-item
				placeholder="Status"
				:controller="this.data"
				></input-status-item>
			</div>
			<div class="col-md-1">
				<h5>&nbsp;</h5>
				<input-submit-item
				:controller="this"
				></input-submit-item>
			</div>
		</div>
	</template>



	<!-- UNIDADES MOVEIS
		@observacao : texto
		@longitude : texto
		@latitude : texto
		@data : datepicker
		@local : texto
		@cidade : selector
		@status : checkbox 
	-->
		<!-- EVENTO -->
		<template id="unidades-formulario-template">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{controller.placeholder}}</h5>
					<button type="button" class="close" @click="controller.close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <div class="card">
					  <input type="hidden" v-model="controller.id">
				      <div class="card-body">
			                <h3>Configurações Iniciais</h3>
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
								<div class="col-md-12">
									<h5>Complemento</h5>
									<input-text-item
										placeholder="Complemento"
										:controller="this.data"
										field="endereco"
									></input-text-item>
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


	<!--FORMULARIOS AGENDA -->
	<template id="agenda-form-formulario-template">
			<div>
				<input type="hidden" v-model="controller.id">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
					<a class="nav-link active" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda" aria-selected="true">Inscrições</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" id="inscricao-tab" data-toggle="tab" href="#inscricao" role="tab" aria-controls="inscricao" aria-selected="false">Inscrição</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="agenda" role="tabpanel">
						<h3>Inscrições</h3>
						<li class="list-group-item">
							<button class="btn btn-danger" @click="lista" type="button">
								Chek-in
							</button>
							<!-- <button class="btn btn-danger" @click="relatorio" type="button">
								Relatório
							</button> -->
						</li>
						<li class="list-group-item">
							<agenda-formularios-data-item
								:controller="this"
							></agenda-formularios-data-item>     
						</li>
					</div>
					<div class="tab-pane fade" id="inscricao" role="tabpanel">
						<output-agenda-inscricao-item
							:controller="this"
						></output-agenda-inscricao-item>
					</div>
				</div>
			</div>
	</template>


	<!-- ACESSO RAPIDO
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
		@destaque : checkbox 
	--> 
	<template id="acesso-rapido-formulario-template">	
		<ul class="list-group">
		    <li class="list-group-item">
				<input type="hidden" v-model="controller.id">
				<div class="row form-group">
					<div class="col-md-8">
						<h5>Titulo</h5>
						<input-name-item
						placeholder="Titulo"
						:controller="this.data"
						></input-name-item>
					</div>
					<div class="col-md-2">

						<h5>&nbsp;</h5>
						<input-status-item
						placeholder="Status"
						:controller="this.data"
						></input-status-item>
					</div>
					<div class="col-md-2">
						<h5>&nbsp;</h5>
						<input-destaque-item
						placeholder="Destaque"
						:controller="this.data"
						></input-destaque-item>
					</div>		
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<h5>Pagina</h5>
						<input-source-item
						placeholder="Link"
						:controller="this.data"
						></input-source-item>
					</div>
					<div class="col-md-4">
						<h5>Imagem</h5>
						<input-imagem-item
							placeholder="Imagem"
							:require="true"
							:controller="this.data"
						></input-imagem-item>
					</div>
					<div class="col-md-4">
						<h5>Cliques</h5>
						<input-text-item
							placeholder="Popularidade"
							field="popularidade"
							:controller="this.data"
						></input-text-item>
					</div>
				</div>
			</li>
			<li class="list-group-item">
				<div class="form-group right">
					<button class="btn btn-sm btn-danger" @click="add" type="button">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>	
					<button class="btn btn-sm btn-secondary" type="button" @click="reset">
						<i class="fa fa-ban"></i> Resetar 
					</button>
				</div>
			</li>
		</ul>
	</template>

	<!-- BANNERS
		@name : texto
		@href : selector
		@imagem : selector
		@status : checkbox
	 -->
	<template id="banner-formulario-template">	
		<div class="row form-group">
			<input type="hidden" v-model="controller.id" name="">
			<div class="col-md-3">
				<h5>Título</h5>
				<input-name-item
				placeholder="Titulo"
				:controller="this.data"
				></input-name-item>
			</div>
			<div class="col-md-3">
				<h5>Pagina</h5>
				<input-source-item
				placeholder="Link"
				:controller="this.data"
				></input-source-item>
			</div>
			<div class="col-md-3">
				<h5>Imagem</h5>
				<input-imagem-item
				placeholder="Imagem"
				:require="true"
				:controller="this.data"
				></input-foot-item>
			</div>
			<div class="col-md-2">
				<h5>&nbsp;</h5>
				<input-status-item
				placeholder="Status"
				:controller="this.data"
				></input-status-item>
			</div>
			<div class="col-md-1">
				<h5>&nbsp;</h5>
				<input-submit-item
				:controller="this"
				></input-submit-item>
			</div>
		</div>	
	</template>




	<!-- HOME
		@name : texto
		@source : selector
		@tema : selector
	 -->
	<template id="home-formulario-template">
	    <ul class="list-group">
		    <li class="list-group-item">
				<div class="row form-group">
					<input type="hidden" v-model="controller.id" name="">
					<div class="col-md-6">
						<h5>Cabeçalho</h5>
						<input-name-item
						placeholder="Titulo do Cabeçalho"
						:controller="this.data"
						></input-name-item>
					</div>
					<div class="col-md-6">
						<h5>Pagina</h5>
						<input-source-item
						placeholder="Link"
						:controller="this.data"
						></input-source-item>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">

					</div>
					<div class="col-md-6">
						<h5>Tema</h5>
						<input-tema-item
						placeholder="Tema"
						:controller="this.data"
						></input-tema-item>
					</div>
				</div>
			</li>
			
<!-- 			<li class="list-group-item">
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

			</li> -->
			
			<li class="list-group-item">
				<div class="form-group right">
					<button class="btn btn-sm btn-danger" @click="add" type="button">
						<i class="fa" :class="request.icone"></i> Enviar
					</button>	
	              	<button class="btn btn-sm btn-secondary" type="button" @click="reset">
	                	<i class="fa fa-ban"></i> Resetar 
	                </button>
				</div>
			</li>
		</ul>	
	</template>

