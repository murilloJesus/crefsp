
	<!-- AGENDA -->
	<template id="agenda-filho-formulario-template">
		<div>		
			<input type="hidden" v-model="controller.placeholder">		
			<ul class="list-group">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-4">
				  <h5>Validade</h5>
	              	<input-data-hora-item
	              		field="data"
	              		type="4"
	              		placeholder="Validade"
	              		:controller="this.data"
	              	></input-data-hora-item>
		              </div>
		          </div>
              </li>
              <li class="list-group-item">
                <h3>Sociedade
                  <label class="switch switch-label switch-pill switch-danger" data-toggle="collapse"  ref="sociedade_controller" data-target="#colSociedade" aria-expanded="false" aria-controls="colSociedade">
                    <input class="switch-input" type="checkbox" >
                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                  </label>
                </h3> 
                <div class="collapse" id="colSociedade">
	                <div class="row">
	                  <div class="col-md-4">
							<h5>Tickets</h5>	
	                    <div class="input-group">
	                      <div class="input-group-prepend">
	                        <button class="btn btn-danger" type="button"><i class="fa fa-ticket-alt"></i></button>
	                      </div>
	                      <input class="form-control" type="text" v-model="data.ticket_publico" placeholder="Tickets">
	                    </div>                      
	                  </div>
	                 </div>
                </div>
                <h3>Estudantes
                  <label class="switch switch-label switch-pill switch-danger" data-toggle="collapse" ref="estudante_controller" data-target="#colEstudante"  aria-expanded="false" aria-controls="colEstudante">
                    <input class="switch-input" type="checkbox">
                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                  </label>
                </h3> 
                <div class="collapse" id="colEstudante">
	                <div class="row">
	                  <div class="col-md-4">
						  <h5>Tickets</h5>	
	                    <div class="input-group">
	                      <div class="input-group-prepend">
	                        <button class="btn btn-danger" type="button"><i class="fa fa-ticket-alt"></i></button>
	                      </div>
	                      <input class="form-control" type="text" v-model="data.ticket_estudante" placeholder="Tickets">
	                    </div>                      
	                  </div>
	                 </div>
                </div>
                <h3>Profissional Registrado
                  <label class="switch switch-label switch-pill switch-danger" data-toggle="collapse" ref="credenciado_controller" data-target="#colCredenciado" aria-expanded="false" aria-controls="colCredenciado">
                    <input class="switch-input" type="checkbox">
                    <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                  </label>
                </h3> 
                <div class="collapse" id="colCredenciado">
	                <div class="row">
	                  <div class="col-md-4">
						  <h5>Tickets</h5>	
	                    <div class="input-group">
	                      <div class="input-group-prepend">
	                        <button class="btn btn-danger" type="button"><i class="fa fa-ticket-alt"></i></button>
	                      </div>
	                      <input class="form-control" type="text" v-model="data.ticket_credenciado" placeholder="Tickets">
	                    </div>                      
	                  </div>
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
		</div>
	</template>


	<!-- PAGINAS -->
	<template id="pagina-filho-formulario-template">
		<div>				
			<div class="row form-group">
				<div class="col-md-6">
				<h5>Adicionar Pagina</h5>
					<input-pagina-item
						placeholder="Adicionar Pagina"
						:controller="this"
					>
					</input-pagina-item>
				</div>
				<div class="col-md-2">
					<input-submit-item
					:controller="this"
					></input-submit-item>
				</div>
			</div>
		</div>
	</template>




	<!-- PESSOAS -->
	<template id="pessoa-filho-formulario-template">
		<div>				
			<div class="row form-group">
				<div class="col-md-6">
					<input-pessoa-item
						placeholder="Adicionar Palestrante"
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


	<!-- DATA E HORA -->
	<template id="data-hora-formulario-template">
		<div class="modal-dialog modal-lg ui" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<template v-if="modelo == 1">
			            <div class="form-group row">
			                <div class="col-md-12">
							<h5>Data</h5>
								<input-data-item
									field="data"
									:controller="this"
									>
								</input-data-item>
			                </div>
			            </div>	
					</template>
					<template v-if="modelo == 2">
			            <div class="form-group row">
			                <div class="col-md-6">
							<h5>Data</h5>
								<input-data-item
									field="data"
									:controller="this"
									>
								</input-data-item>
			                </div>
			                <div class="col-md-6">
							<h5>Hora</h5>
								<input-hora-item
									placeholder="00:00"
									:controller="this"
									field="hora"
									>
								</input-hora-item>
			                </div>
			            </div>	
					</template>
					<template v-if="modelo == 3">
				        <div class="form-group row">
				            <div class="col-md-12">
							<h5>Data</h5>
								<input-data-item
									field="data"
									:controller="this"
									>
								</input-data-item>
				            </div>
				        </div>
				        <div class="form-group row">
			                <div class="col-md-5">
								<input-hora-item
									placeholder="00:00"
									field="hora"
									:controller="this"
									>
								</input-hora-item>
			                </div>
			                <div class="col-md-2">
							&nbsp;
								<h5> Até às </h5>					                	
			                </div>
			                <div class="col-md-5">
			                	<input-hora-item
									placeholder="00:00"
									field="t_hora"
									:controller="this"
									>
								</input-hora-item>
			                </div>
				        </div>
					</template>
					<template v-if="modelo == 4">
			              <div class="form-group row">
			              	<div class="col-md-2">
							  <!-- &nbsp; -->
			              		<h5>De: </h5>
			              	</div>
			              	<div class="col-md-5">
							  <h5>Data</h5>
			              		<input-data-item
									field="data"
			              			:controller="this"
			              		></input-data-item>
			              	</div>
			              	<div class="col-md-5">
							  <h5>Hora</h5>
			              		<input-hora-item
			              		placeholder="00:00"
			              		field="hora"
			              		:controller="this"
			              		></input-hora-item>
			              	</div>
			            </div>
			            <div class="form-group row">
			              	<div class="col-md-2">
							  <!-- &nbsp; -->
			              		<h5>Até: </h5>
			              	</div>
			              	<div class="col-md-5">
			              		<input-data-item
									field="t_data"
			              			:controller="this"
			              		></input-data-item>
			              	</div>
			              	<div class="col-md-5">
			              		<input-hora-item
			              		placeholder="00:00"
			              		field="t_hora"
			              		:controller="this"
			              		></input-hora-item>
			              	</div>
			            </div>
					</template>
			    </div>
				<div class="modal-footer">
					<button class="btn btn-sm btn-danger" type="button" @click="submit">
						<i class="fa fa-dot-circle-o"></i> Enviar
					</button>
				</div>
			</div>
		</div>
	</template>
