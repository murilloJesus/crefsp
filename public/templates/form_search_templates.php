	<!-- PAGINA  -->
	<template id="searcher-pagina-formulario-template">
		<div class="modal-dialog modal-lg" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="controller.close_search()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
				      <li class="list-group-item">
					  <h5>&nbsp;</h5>
				        <pesquisa-item
				          :controller="this"
				          :data="pesquisa"
				          :output="output"
				        >
				        </pesquisa-item>
				      </li>
				      <li class="list-group-item">
				        <selecao-item 
				          :controller="this"
				          :data="tabela"
				          >
				        </selecao-item>
				        <paginator-item
				          :controller="this"
				          >
				        </paginator-item>
				      </li>
				    </ul>	
			    </div>
			</div>
		</div>
	</template>

	<!-- GALERIAS  -->
	<template id="searcher-galeria-formulario-template">
	    <ul class="list-group">
	      <li class="list-group-item">
		  <h5>&nbsp;</h5>
	        <pesquisa-item
	          :controller="this"
	          :data="pesquisa"
	          :output="output"
	        >
	        </pesquisa-item>
	      </li>
	      <li class="list-group-item">
	        <selecao-item 
	          :controller="this"
	          :data="tabela"
	          >
	        </selecao-item>
	        <paginator-item
	          :controller="this"
	          >
	        </paginator-item>
	      </li>
	    </ul>	
	</template>



	<!-- SOURCE  -->
	<template id="searcher-source-formulario-template">
		<div class="modal-dialog modal-lg" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
				      <li class="list-group-item">
					  <h5>&nbsp;</h5>
				        <pesquisa-item
				          :controller="this"
				          :data="pesquisa"
				          :output="output"
				        >
				        </pesquisa-item>
				      </li>
				      <li class="list-group-item">
				        <selecao-item 
				          :controller="this"
				          :data="tabela"
				          >
				        </selecao-item>
				        <paginator-item
				          :controller="this"
				          >
				        </paginator-item>
				      </li>
				    </ul>	
			    </div>
			</div>
		</div>
	</template>

	<!-- CIDADE -->
	<template id="searcher-cidade-formulario-template">
		<div class="modal-dialog modal-lg" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
				      <li class="list-group-item">
					  <h5>&nbsp;</h5>
				        <pesquisa-item
				          :controller="this"
				          :data="pesquisa"
				          :output="output"
				        >
				        </pesquisa-item>
				      </li>
				      <li class="list-group-item">
				        <selecao-item 
				          :controller="this"
				          :data="tabela"
				          >
				        </selecao-item>
				        <paginator-item
				          :controller="this"
				          >
				        </paginator-item>
				      </li>
				    </ul>	
			    </div>
			</div>
		</div>
	</template>

	<!-- VIDEO -->
	<template id="searcher-video-formulario-template">
		<div class="modal-dialog modal-lg" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
				      <li class="list-group-item">
					  <h5>&nbsp;</h5>
				        <pesquisa-item
				          :controller="this"
				          :data="pesquisa"
				          :output="output"
				        >
				        </pesquisa-item>
				      </li>
				      <li class="list-group-item">
				        <selecao-item 
				          :controller="this"
				          :data="tabela"
				          >
				        </selecao-item>
				        <paginator-item
				          :controller="this"
				          >
				        </paginator-item>
				      </li>
				    </ul>	
			    </div>
			</div>
		</div>
	</template>


	<!-- ARQUIVO -->
	<template id="searcher-arquivo-formulario-template">
		<div class="modal-dialog modal-lg" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
				      <li class="list-group-item">
					  <h5>&nbsp;</h5>
				        <pesquisa-item
				          :controller="this"
				          :data="pesquisa"
				          :output="output"
				        >
				        </pesquisa-item>
				      </li>
				      <li class="list-group-item">
				        <selecao-item 
				          :controller="this"
				          :data="tabela"
				          >
				        </selecao-item>
				        <paginator-item
				          :controller="this"
				          >
				        </paginator-item>
				      </li>
				    </ul>	
			    </div>
			</div>
		</div>
	</template>

	<!-- PESSOAS  -->
	<template id="searcher-pessoa-formulario-template">
		<div class="modal-dialog modal-lg" ref="modal" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{placeholder}}</h5>
					<button type="button" class="close" @click="close()" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				    <ul class="list-group">
				      <li class="list-group-item">
					  <h5>&nbsp;</h5>
				        <pesquisa-item
				          :controller="this"
				          :data="pesquisa"
				          :output="output"
				        >
				        </pesquisa-item>
				      </li>
				      <li class="list-group-item">
				        <selecao-item 
				          :controller="this"
				          :data="tabela"
				          >
				        </selecao-item>
				        <paginator-item
				          :controller="this"
				          >
				        </paginator-item>
				      </li>
				    </ul>	
			    </div>
			</div>
		</div>
	</template>

