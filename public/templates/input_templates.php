<!-- INPUT COMPONENTS -->


	<!-- TEXT -->
	<template id="input-text-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-header"></i> 
				</button>
			</span>
			<textarea class="form-control" type="text" v-if="type == 'textarea'" name="descricao" v-model="controller[field]" :placeholder="placeholder"></textarea>
			<input class="form-control" type="text" v-if="type == 'text'" name="descricao" v-model="controller[field]" :placeholder="placeholder">
		</div>
	</template>

	<!-- DATAYY -->
	<template id="input-datayy-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-header"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller.datayy" :placeholder="placeholder">
		</div>
	</template>


	<!-- NAME -->
	<template id="input-name-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-header"></i> 
				</button>
			</span>
			<input class="form-control" type="text" name="name" v-model="controller.name" :placeholder="placeholder">
		</div>
	</template>


	<!-- OBJETO -->
	<template id="input-objeto-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
				</button>
			</span>
			<textarea class="form-control" type="text" name="objeto" v-model="controller.objeto" :placeholder="placeholder"></textarea>
		</div>
	</template>

	<!-- DESCRICAO -->
	<template id="input-descricao-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button">
					<small><i class="fa fa-header"></i></small>
				</button>
			</span>
			<textarea class="form-control" type="text" v-if="type == 'textarea'" name="descricao" v-model="controller.descricao" :placeholder="placeholder"></textarea>
			<input class="form-control" type="text" v-if="type == 'text'" name="descricao" v-model="controller.descricao" :placeholder="placeholder">
		</div>
	</template>


	<!-- NUMERO -->
	<template id="input-numero-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button">
					<small><i class="fa fa-header"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="numero" v-model="controller.numero" :placeholder="placeholder">
		</div>
	</template>


	<!-- LOCAL -->
	<template id="input-local-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button">
					<small><i class="fa fa-map-marker-alt"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="local" v-model="controller.local" :placeholder="placeholder">
		</div>
	</template>

		<!-- LOCAL -->
		<template id="input-endereco-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button">
					<small><i class="fa fa-map-marker-alt"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="endereco" v-model="controller.endereco" :placeholder="placeholder">
		</div>
	</template>

	<!-- PROCESSO -->
	<template id="input-processo-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button">
					<small><i class="fa fa-header"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="processo" v-model="controller.processo" :placeholder="placeholder">
		</div>
	</template>


	<!-- CARGO -->
	<template id="input-cargo-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<small><i class="fa fa-header"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="cargo" v-model="controller.cargo" :placeholder="placeholder">
		</div>
	</template>

	
	<!-- AUTOR -->
	<template id="input-autor-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<small><i class="fa fa-user"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="cargo" v-model="controller.autor" :placeholder="placeholder">
		</div>
	</template>


	<!--DOC -->
	<template id="input-doc-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<small><i class="fa fa-header"></i></small>
				</button>
			</span>
			<input class="form-control" type="text" name="doc" v-model="controller.doc" :placeholder="placeholder">
		</div>
	</template>


	<!-- LINK -->
	<template id="input-link-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-link"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller[field]" :placeholder="placeholder">
		</div>
	</template>

	<!-- LATITUDE -->
	<template id="input-latitude-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-map-marker-alt"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller.latitude" name="latitude" :placeholder="placeholder">
		</div>
	</template>

	<!-- LONGITUDE -->
	<template id="input-longitude-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-map-marker-alt"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller.longitude" name="longitude" :placeholder="placeholder">
		</div>
	</template>

	<!-- OBSERVAÇÃO -->
	<template id="input-observacao-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-map-marker-alt"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller.observacao" name="observacao" :placeholder="placeholder">
		</div>
	</template>

	<!-- TELEFONE -->
	<template id="input-telefone-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-phone"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller.telefone" name="telefone" :placeholder="placeholder">
		</div>
	</template>


	<!-- SITE -->
	<template id="input-site-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-at"></i> 
				</button>
			</span>
			<input class="form-control" type="text" v-model="controller.site" name="site" :placeholder="placeholder">
		</div>
	</template>


	<!-- EMAIL -->
	<template id="input-email-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-at"></i> 
				</button>
			</span>
			<input class="form-control" type="text" name="name" v-model="controller.email" :placeholder="placeholder">
		</div>
	</template>

	<!-- HORA -->
	<template id="input-hora-template">
		<div class="input-group">
			<span class="input-group-prepend">
				<button class="btn btn-danger" type="button" >
					<i class="fa fa-clock"></i> 
				</button>
			</span>
			<input class="form-control" type="text" ref="input" v-model="controller[field]" :placeholder="placeholder">
		</div>
	</template>

	<!-- PASSWORD -->
	<template id="input-password-template">
		<div class="input-group">
				<span class="input-group-prepend">
					<button class="btn btn-danger" type="button">
						<i class="fa fa-key"></i></button>
				</span>
				<input class="form-control" :type="passtype" name="password" v-model="controller.password"
					placeholder="Senha">
				<span class="input-group-append">
					<button class="btn btn-secondary"     @mouseover="passtype = 'text'"   @mouseleave="passtype = 'password'" type="button">
						<i class="fa fa-eye"></i>
					</button>
				</span>
			</div>
	</template>



<!-- CHECKBOXS INPUTS -->


	<!-- DESTAQUES -->
	<template id="input-destaque-template">
		<h5>{{placeholder}}
          <label class="switch switch-label switch-pill switch-danger">
            <input class="switch-input" v-model="controller.destaque" type="checkbox">
            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
          </label>
        </h5>
	</template>

	<!-- EXTRATO -->
	<template id="input-extrato-template">
		<h5>{{placeholder}}
          <label class="switch switch-label switch-pill switch-danger">
            <input class="switch-input" v-model="controller.extrato" type="checkbox">
            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
          </label>
        </h5>
	</template>


	<!-- STATUS -->
	<template id="input-status-template">
		<h5>{{placeholder}}
          <label class="switch switch-label switch-pill switch-danger">
            <input class="switch-input" v-model="controller.status" type="checkbox">
            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
          </label>
        </h5>
	</template>

	<template id="input-check-template">
		<h5>{{placeholder}}
          <label class="switch switch-label switch-pill switch-danger">
            <input class="switch-input" v-model="controller[field]" type="checkbox">
            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
          </label>
        </h5>
	</template>

<!-- OUTROS INPUTS   -->


	<!-- EDITOR  -->
	<template id="input-editor-template">
		<textarea :id="controller[hash]">
			
		</textarea>
	</template>

	<!-- UPLOADER  -->
	<template id="input-uploader-template">
		<div class="input-group">
			<label for="message-text" class="col-form-label">{{placeholder}}</label>
			<input type="file" class="form-control" @change=handleFileUpload ref="file" id="file" name="upload">
		</div>
	</template>

	<!-- DATA  -->
	<template id="input-data-template">
		<div class="input-group">
			<div class="input-group">
				<span class="input-group-prepend">
					<button class="btn btn-danger" type="button">
						<i class="fa fa-calendar"></i></button>
					</span>
					<input ref="data" type="hidden" >
					<input class="form-control" ref="datapicker" type="text" placeholder="<?=  date("d/m/Y") ?>">
				</div>
			</div>
		</div>
	</template>

	<!-- SUBMIT  -->
	<template id="input-submit-template">
		<div class="input-group">
			<button class="btn btn-danger" @click="controller.add" type="button">
				<i class="fa big" :class="controller.request.icone"></i>
			</button>
		</div>
	</template>

