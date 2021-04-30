	<!-- PAGINA -->
	<template id="linker-pagina-formulario-template">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Link</h5>
					<button type="button" class="close" @click="controller.close_link()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row form-group">
						<div class="col-md-12" >
						<h5>Nome</h5>
							<input-name-item
								placeholder="Nome"
								:controller="this.data"
							>
							</input-name-item>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12" >
						<h5>URL</h5>
							<input-link-item
								placeholder="Url"
								:controller="this.data"
							>
							</input-link-item>
						</div>
					</div>
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


	<!-- IMAGEM -->
	<template id="linker-imagem-formulario-template">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
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
						<h5>URL</h5>
							<input-link-item
								placeholder="Url"
								:controller="this"
							>
							</input-link-item>
						</div>
						<div class=form-group>
							<show-imagem-item
								:controller="this"
							>
							</show-imagem-item>
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

	<!-- SOURCE -->
	<template id="linker-source-formulario-template">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Link</h5>
					<button type="button" class="close" @click="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
						<h5>Link Externo</h5>
							<input-link-item
								placeholder="Link Externo"
								:controller="this"
							>
							</input-link-item>
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