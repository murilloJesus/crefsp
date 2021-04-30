<!doctype html>
<html lang="pt-br">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php

			$rota = "../";

			require "public/elementos/head.php";
			require "public/elementos/css.phtml";
		?>

	</head>
  	<body>
		<?php require "public/elementos/mobile.php"; ?>

		<?php require "public/elementos/header.php"; ?>

		<?php require "public/elementos/menu.php"; ?>

		<?php require "public/elementos/breadcrumbs.php"; ?>

		<?php require "public/paginas/paginas.php"; ?>

		<?php require "public/elementos/footer.php"; ?>

		 <script type="text/javascript">
		 	window.rota = '<?=$rota?>'
		 </script>

		<div id="view">
			<?php
				recursiveTemplate($json);

				function recursiveTemplate($pagina){
					if(isset($pagina['html']) ){
						echo "<div id='$pagina[html]'>".$pagina['template']."</div>";
					}
					if(isset($pagina['children']) and is_array($pagina['children'])){
						foreach ($pagina['children'] as $child) {
							recursiveTemplate($child);
						}
					}
				}
			?>
		</div>

		<?php require "public/elementos/foot.php" ?>


  </body>
  	    <script type="text/x-template" id="arvore-template">
			  <li>
			  	<a v-if="item.name" :href="item.source" target="_blank">
				    <div
				      :class="{bold: isFolder, clicked: isClicked }"
				      @click="toggle">
				      <i v-if="isFolder && !item.root" :class=" !isOpen ? 'fa fa-chevron-right' : 'fa fa-chevron-down' "></i>
				      @{{ item.name }}
				    </div>
				</a>
			    <ul v-show="isOpen" v-if="isFolder">
			      <arvore-item
			        class="item"
			        v-for="(child, index) in item.children"
			        :key="index"
			        :item="child"
			        :folder="folder"
			      ></arvore-item>
			    </ul>
			  </li>
		</script>



		<script type="text/x-template" id="html-template">
			<div class="">
				<div class="carousel-lg" v-if="banners">
				  	<div class="container">
				  		<div class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators" v-if="banners.length > 1">
						    <li data-target="#carouselExampleIndicators" :data-slide-to="index" v-for="(el, index) in banners" :class="{active: index == 0}"></li>
						  </ol>
						  <div class="carousel-inner">
						    <a class="carousel-item carousel-fix" :href="el.href" :class="{active: index == 0}" v-for="(el, index) in banners" :style="el.imagem.backgroundSource">
						    </a>
						  </div>
						  <a v-if="banners.length > 1" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <div class="arrowholder"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i></div>
						  </a>
						  <a v-if="banners.length > 1" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <div class="arrowholder"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></div>
						  </a>
						</div>
						<p v-for="(el, index) in banners">@{{el.imagem.descricao}}</p>
				  	</div>
				</div>
				<div class="container htmlcontainer padding5 pf-content"  v-if="html">
					<div v-if="hasNoticiaDataAutor" style="margin: 10px 0px;" >
						<b>Por @{{item.autor}}</b>
						<br>
						<small v-if="item.data.created_at">@{{item.data.created_at}} | Atualizado em @{{item.data.updated_at}}</small>
						<small v-else>@{{item.data.updated_at}}</small>
					</div>
					<div  v-html="html"></div>
				</div>
				<div class="pf-content" v-if="listaOrdenada">
					<ul v-for="ul in listaOrdenada">
		  		 		<div>
							<h3 class="title-year">@{{ul.name}}</h3>
								<li v-for="el in ul.data">
									<a :href="el.href" target="_blank">
					  		 			<i class="fa" :class="el.icone"> </i>
				                		<b v-if="(!busca.categoria && el.categoria) || (busca.datayy && el.categoria)"> @{{el.categoria}} <i class="fas fa-angle-double-right"> </i></b>
				                		<b v-else-if="el.data"> @{{el.dataFormatada}} <i class="fas fa-angle-double-right"> </i></b>
			                    		@{{ el.name }}
			                			<b v-if="el.datamm"> @{{el.datamm}}</b>
			                		</a>
			                		<i v-if="el.descricao"> - @{{el.descricao}}</i>
				  		 		</li>
		  		 		</div>
		  		 	</ul>
				</div>
				<div class="pf-content" v-else-if="lista">
					<ul>
		  		 		<li v-for="el in lista">
							<a :href="el.href" target="_blank">
			  		 			<i class="fa" :class="el.icone"> </i>
		                		<b v-if="el.categoria"> @{{el.categoria}} <i class="fas fa-angle-double-right"> </i></b>
		                		<b v-else-if="el.data"> @{{el.dataFormatada}} <i class="fas fa-angle-double-right"> </i></b>
	                    		@{{ el.name }}
	                		</a>
	                		<b v-if="el.datamm"> @{{el.datamm}}</b>
	                		<i v-if="el.descricao"> - @{{el.descricao}}</i>
		  		 		</li>
		  		 	</ul>
		  		 </div>
		  		<div class="pf-content" v-if="pessoas">
		  		 	<ul class="ul-quemequem">
		  		 		<li v-for="el in pessoas" class="li-quemequem">
				        	<a target="_BLANK" v-if="el.name">
			            		<div class="holder-quemequem">
			            			<h5 class="cargo-quemequem" v-if="el.cargo"> @{{el.cargo}} </h5>
			            			<img class="img-quemequem" :src="el.source" >
			            			<h6 class="nome-quemequem">
			            			 @{{el.name}} <br> @{{el.credencial}}
			            			</h6>
			            			<h6 class="nome-quemequem" v-if="el.cidade">
			            			 @{{el.cidade}}
			            			</h6>
			            		</div>
			            	</a>
		  		 		</li>
		  		 	</ul>
		  		 </div>
	   			<div class="form-content" v-if="form">
					<form ref="form">
					   <div class="form-field" v-for="field in form">
						   	<template v-if="field.formato === 'seccao'">
						   		<h3>@{{field.name}}</h3>
						   	</template>
						   	<template v-else-if="field.formato == 'text'" >
			  					<label >@{{field.name}}</label>
								<input :id="field.name" :name="field.hash" class="form-control" >
								<small class="form-text text-muted" v-if="field.descricao">
								  @{{field.descricao}}
								</small>
						   	</template>
						   	<template v-else-if="field.formato == 'checkbox'">
						   		<input class="form-check-input" :name="field.hash" type="checkbox" value="" :id="field.hash">
								  <label class="form-check-label" :for="field.hash">
								    @{{field.descricao}}
								  </label>
						   	</template>
						   	<template v-else-if="field.formato == 'textarea'">
						   		<label >@{{field.name}}</label>
								<textarea :id="field.name" :name="field.hash" class="form-control" :aria-describedby="field.hash"></textarea>
								<small id="field.hash" class="form-text text-muted" v-if="field.descricao">
								  @{{field.descricao}}
								</small>
						   	</template>
					   </div>
					   <div class="g-recaptcha" data-sitekey="6LcqTqgUAAAAADHIxsrG-lzQYv6dlRBi53Zxe2X4"></div><br>
					   <button class="btn btn-danger" @click="submit">Enviar</button>
					</form>
				</div>
				<div class="box-table" v-if="tabela">
					  <table>
					    <thead>
					      <tr>
					        <th v-for="key in colunas"
					          @click="sortBy(key)"
					          :class="{ active: sortKey == key }">
					          @{{ key }}
					          <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
					          </span>
					        </th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr v-for="entry in paginator">
					        <td v-for="(key, index) in colunas">
					          <a href="paginas.php?pag=licitacao">@{{entry[index]}}</a>
					        </td>
					      </tr>
					    </tbody>
					  </table>
					  <ul class="pagination">
						<li class="page-item" @click="toward">
							<a class="page-link" >Anterior</a>
						</li>
						<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
							<a class="page-link" >@{{el+1}}</a>
						</li>
						<li class="page-item" @click="foward" >
							<a class="page-link" >Próximo</a>
						</li>
					  </ul>
			    </div>
			    <div class="box-table mb-table" v-if="tabela">
					  <table>
					    <tbody>
					      <tr v-for="entry in paginator">
					      	<td>
					          <a href="paginas.php?pag=licitacao" ><div v-for="(key, index) in colunas" >@{{entry[index]}}</div></a>
					        </td>
					      </tr>
					    </tbody>
					  </table>
					  <ul class="pagination">
						<li class="page-item" @click="toward">
							<a class="page-link" >Anterior</a>
						</li>
						<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
							<a class="page-link" >@{{el+1}}</a>
						</li>
						<li class="page-item" @click="foward" >
							<a class="page-link" >Proximo</a>
						</li>
					  </ul>
				</div>
				<div class="pf-content" v-if="editorial">
		  		 		<ul v-for="el in paginator">
		  		 			<li class="lirevista">
		  		 				<img v-if="el.imagem" :src="el.imagem.source" class="imgrevista">
		                    	<div class="holderrevistacontent">
		                    		<div class="revistatitulo">
		                    			@{{ el.name }}
		                    		</div>
		                    		<div v-if="el.descricao" class="revistadescricao" v-html="el.descricao"></div>
		                    		<div v-if="el.video" class="revistadescricao">
		                    			<iframe :src="el.video.href" allowfullscreen="" frameborder="0"> </iframe>
		                    		</div>
		                    		<div class="revistaboxholder">
		                    			<div class="revistaboxes">
				                    		<a v-if="el.pdf"  :href="el.pdf.source" target="_blank">
				                    			<div class="revistabox">
				                    				<i class="fas fa-file-pdf"></i>
				                    				versão PDF
				                    			</div>
				                    		</a>
					                    	<a v-if="el.flash" :href="el.flash.source" target="_blank">
					                    		<div class="revistabox">
					                    			<i class="fas fa-file-powerpoint"></i>
					                    			versão FLASH
					                    		</div>
					                    	</a>
					                    	<a v-if="el.zip" :href="el.zip.source" target="_blank">
					                    		<div class="revistabox">
					                    			<i class="fas fa-file-archive"></i>
					                    			versão ZIP
					                    		</div>
					                    	</a>
				                    	</div>
				                    	<div class="revistainfo">
				                    		<div v-if="el.categoria"><b>Tipo:</b>  @{{ el.categoria }}</div>
				                    		<div v-if="el.data"><b>Publicado em:</b>  @{{ el.dataFormatada }}</div>
				                    		<div v-else-if="el.datayy"><b>Publicado em:</b>  @{{ el.datayy }}</div>
				                    		<div v-if="el.autor"><b>Por:</b> @{{ el.autor }}</div>
				                    		<div v-if="el.editora"><b>Editora:</b> @{{ el.editora }}</div>
				                    		<div v-if="el.cidade"><b>Cidade:</b> @{{ el.cidade }}</div>
				                    		<div v-if="el.endereco"><b>Endereço:</b> @{{ el.endereco }}</div>
				                    		<div v-if="el.site"><b>Site:</b> <a :href="el.site">@{{ el.site }}</a></div>
				                    		<div v-if="el.telefone"><b>Telefone:</b> @{{ el.telefone }}</div>
				                    	</div>
			                    	</div>
		                    	</div>
		  		 			</li>
		  		 		</ul>
		  		 	  <ul class="pagination">
						<li class="page-item" @click="toward">
							<a class="page-link" >Anterior</a>
						</li>
						<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
							<a class="page-link" >@{{el+1}}</a>
						</li>
						<li class="page-item" @click="foward" >
							<a class="page-link" >Proximo</a>
						</li>
					  </ul>
		  		</div>
		  		<div class="pf-content" v-if="clube">
		  		 		<ul class="listaclube">
		  		 			<li v-for="el in paginator">
		  		 				<a :href="el.href">
	                   		 		<img :src="el.source" :alt="el.imagem.descricao">
	                			</a>
		  		 			</li>
		  		 		</ul>
		  		 		<ul class="pagination">
							<li class="page-item" @click="toward">
								<a class="page-link" >Anterior</a>
							</li>
							<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
								<a class="page-link" >@{{el+1}}</a>
							</li>
							<li class="page-item" @click="foward" >
								<a class="page-link" >Proximo</a>
							</li>
					  </ul>
		  		</div>
		  		<div class="vagas-holder" v-if="vaga">
					<div class="vaga" v-for="el in paginator">
						<div class="titulo-vaga">
							@{{el.name}}
							<div class="iconescompartilharnoticia">
		  						<a href="#">
		  							<i class="fab fa-whatsapp-square whatsappcolor"></i>
		  						</a>
		  						<a href="#">
		  							<i class="fab fa-facebook-square facebookcolor"></i>
		  						</a>
		  						<a href="#">
		  							<i class="fab fa-twitter-square twittercolor"></i>
		  						</a>
		  						<a href="#">
		  							<i class="fab fa-linkedin likedincolor"></i>
		  						</a>
		  					</div>
						</div>
						<div class="cidade-vaga">
							<b>@{{el.dataFormatada}}</b> @{{el.cidade}} - SP
						</div>
						<div class="descricao-vaga">
							@{{el.descricao}}
						</div>
						<a :href="el.href">
							<div class="curriculo-vaga">
								Veja mais
							</div>
						</a>
					</div>
					<ul class="pagination">
						<li class="page-item" @click="toward">
							<a class="page-link" >Anterior</a>
						</li>
						<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
							<a class="page-link" >@{{el+1}}</a>
						</li>
						<li class="page-item" @click="foward" >
							<a class="page-link" >Proximo</a>
						</li>
					</ul>
				</div>
				<div class="accordion-holder" v-if="accordion">
					<div class="accordion">
						<template v-for="(el, index) in accordion" >
							<h3> @{{ index + 1 }} ) @{{ el.name }} </h3>
							<div>
						    	<p v-html=el.descricao></p>
						  	</div>
						</template>
					</div>
			  	</div>
				<div class="pf-content" v-if="mapa">
					<template>
					  	<div class="mapamultimarker" style="height: 500px; width: 100%;">
				        	<!-- <div id="map2" style="height: 100%; width: 100%;"></div> -->
				      	</div>
					</template>
					<br>
					<br>
					<ul>
		  		 		<li v-for="el in mapa">
							<a target="_blank">
		                		<b><i class="fa fa-clock"> </i><b class="red"> @{{el.dataFormatada}} </b> <i class="fa fa-map-marker-alt"> </i> @{{el.cidade}}</b>
		                		<br>
	                    		@{{ el.local }}
	                		</a>
	                		<i v-if="el.observacao">  <i class="fas fa-angle-double-right"> </i> @{{el.observacao}}</i>
		  		 		</li>
		  		 	</ul>
			  	</div>
		  		<div class="box-eventos" v-if="eventos">
		  			<div class="row-eventos hideonfocus">
		  				<!-- <div class="evento evento-principal width50pct">
		  					<a href="paginas.php?pag=ciclodoconhecimento" class="elemento-destaques">
		  						<div class="design-destaques" style="background-image: url('img/ciclo.jpg');">
		  							<p class="categoria-destaque"> CICLO DE CONHECIMENTO </p>
		  							<p class="titulo-destaque"> Clique para ver toda a programação </p>
		  						</div>
		  					</a>
		  				</div> -->
						<!-- <div class="box-eventos width50pct" v-if="destaques_eventos"> -->
			  				<div class="col-eventos" v-for="el in destaques_eventos">
			  					<!-- DESTAQUE -->
			  					<a :href="des.href" class="elemento-destaques" v-for="des in el">
			  						<div class="design-destaques" :style="des.source">
									  <p class="categoria-destaque"> @{{des.categoria}} </p>
									  <p class="titulo-destaque"> @{{ des.name}}</p>
								  	</div>
			  					</a>
			  					<!-- /DESTAQUE -->
			  				</div>
				  		<!-- </div> -->
		  			</div>
		  			<div class="list-noticias margin" v-if="eventos">
		  				<div class="noticia" v-for="evento in paginator">
		  					<!-- <div class="img-item-evento" :style="evento.source"></div> -->
		  					<div>
						  		<p class="p-new-cabecario">
									<i class="fa fa-calendar"></i> @{{ evento.dataFormatada }}
								</p>
								<a :href="evento.href" class="chamada-noticia">
									<p>
										<b class="red" v-if="evento.categoria"> @{{ evento.categoria }} <i class="fas fa-angle-double-right"></i></b>
										@{{ evento.name }}
									</p>
								</a>
						  	</div>
					  	</div>

						<ul class="pagination">
							<li class="page-item" @click="toward">
								<a class="page-link" >Anterior</a>
							</li>
							<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
								<a class="page-link" >@{{el+1}}</a>
							</li>
							<li class="page-item" @click="foward" >
								<a class="page-link" >Proximo</a>
							</li>
						</ul>
					</div>
		  		</div>
				<div class="list-noticias margin" v-if="noticias">
			  		<div class="box-destaques hideonfocus" v-if="destaques">
		  				<div class="col-destaques" id="hideOnInputFocus"  v-for="el in destaques">
		  					<!-- DESTAQUE -->
		  					<a :href="des.href" class="elemento-destaques" v-for="des in el">
		  						<div class="design-destaques" :style="des.source">
								  <p class="categoria-destaque" v-if="des.categoria"> @{{des.categoria}} </p>
								  <p class="titulo-destaque" v-if="des.name"> @{{ des.name}}</p>
							  	</div>
		  					</a>
		  					<!-- /DESTAQUE -->
		  				</div>
			  		</div>
	  				<div class="noticia" v-for="noticia in paginator">
						<p class="p-new-cabecario">
							<i class="fa fa-calendar"></i> @{{ noticia.dataFormatada }}
						</p>
						<a :href="noticia.href" class="chamada-noticia">
							<p>
								<b class="red" v-if="noticia.categoria"> @{{ noticia.categoria }} <i class="fas fa-angle-double-right"></i></b>
								@{{ noticia.name }}
							</p>
						</a>
					</div>
					<ul class="pagination">
						<li class="page-item" @click="toward">
							<a class="page-link" >Anterior</a>
						</li>
						<li class="page-item" :class="{ active: page == el}" @click="toPage(el)" v-for="el in pages">
							<a class="page-link" >@{{el+1}}</a>
						</li>
						<li class="page-item" @click="foward" >
							<a class="page-link" >Proximo</a>
						</li>
					</ul>
		  		</div>
		  		<div class="pf-content" v-if="video">
		  			<div class="listavideo-holder">
 			            <div id="main-video">
 			    	        <iframe id="idiframe" frameborder="0" allowfullscreen></iframe>
 			    	    </div>
 				    	<div class="slider-videos" data-videos-home>
 				    		<div class="navi-videos-left" v-if="hasPage" @click="toward_one">
								<a class="page-link" ><i class="fas fa-angle-double-left">  </i></a>
							</div>
 			    	        <div v-for="el in paginator" class="thumb-video" :data-video="el.embed" :style="el.imagem.backgroundSource"></div>
							<div class="navi-videos-right" v-if="hasPage" @click="foward_one" >
								<a class="page-link" ><i class="fas fa-angle-double-right">  </i></a>
							</div>
 				    	</div>
	  		 		</div>
		  		</div>
		  		<div class="galeria-holder" v-if="galeria">
		            <div id="main-galeria" :style="galeria.imagens[0].backgroundSource">
		    	    </div>
			    	<div class="slider-galeria">
			    		<div class="navi-galeria-left" v-if="hasPage" @click="toward_one">
						<a class="page-link" ><i class="fas fa-angle-double-left">  </i></a>
					</div>
		    	        <div v-for="el in paginator" class="thumb-galeria" :data-galeria="el.backgroundSource" :style="el.backgroundSource"></div>
					<div class="navi-galeria-right" v-if="hasPage" @click="foward_one" >
						<a class="page-link" ><i class="fas fa-angle-double-right">  </i></a>
					</div>
			    	</div>
  		 		</div>
  		 		<div ref="modal" class="modal" tabindex="-1" role="dialog" v-if="modal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title">@{{modal.name}}</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p>@{{modal.descricao}}</p>
				      </div>
				    </div>
				  </div>
				</div>
	   			<div class="form-content" v-if="agenda" >
						<form ref="formulario" method="post">
							<div class="form-field">
								<h3>Tipo de Inscrição</h3>
							</div>
							<div class="form-field">
								<div>
									<template v-if="agenda.ticket_credenciado">
										<input type="radio" name="tipo_inscricao" id="credenciado" @click="agenda.ticket = 3" value="Registrado">
										<label for="credenciado">Empresa ou Profissional Registrado</label>
									</template>
									<br>
									<template v-if="agenda.ticket_estudante">
										<input type="radio" name="tipo_inscricao" id="estudante" @click="agenda.ticket = 2" value="Estudante">
										<label for="estudante">Estudante</label>
									</template>
									<br>
									<template v-if="agenda.ticket_publico">
										<input type="radio" name="tipo_inscricao" id="sociedade" @click="agenda.ticket = 1" value="Sociedade">
										<label for="sociedade">Sociedade</label>
									</template>
								</div>
							</div>
							<div class="form-field" v-if="agenda.ticket == 1">
									<label>Ocupação</label>
									<input id="Ocupação" name="Ocupação" class="form-control">
									<small class="form-text text-muted">
										@{{agenda.ticket_publico}} Tickets
										</small>
								</div>
							<div class="form-field" v-if="agenda.ticket == 2">
								<label>Intistuição de Ensino</label>
								<input id="Intistuição de Ensino" name="Intistuição de Ensino" class="form-control">
								<small class="form-text text-muted">
									@{{agenda.ticket_estudante}} Tickets
									</small>
							</div>
							<div class="form-field" v-if="agenda.ticket == 3">
								<label>Nº CREF</label>
								<input id="registro" name="Registro" class="form-control">
								<small class="form-text text-muted">
										@{{agenda.ticket_credenciado}} Tickets
									</small>
							</div>
							<div class="form-field" v-if="agenda.ticket == 3">
								<label>CPF / CNPJ</label>
								<input id="cpfcnpj" name="cpf/cnpj" class="form-control" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">
							</div>
							<div class="form-field">
								<label>Nome</label>
								<input id="Nome" name="nome" class="form-control">
								<small class="form-text text-muted">
									Seu nome completo
								</small>
							</div>
							<div class="form-field">
								<label>Email</label>
								<input id="Email" name="email" class="form-control">
								<small class="form-text text-muted">
									example@dominio.com
								</small>
							</div>
							<div class="form-field">
								<label>CEP</label>
								<input id="CEP" name="cep" class="form-control">
								<small class="form-text text-muted">
									99999999
								  </small>
							</div>
							<div class="form-field">
								<label>Estado</label>
								<input id="Estado" name="estado" class="form-control">
								<small class="form-text text-muted">
									UF
								  </small>
							</div>
							<div class="form-field">
								<label>Cidade</label>
								<input id="Cidade" name="cidade" class="form-control">
								<small class="form-text text-muted">
									Cidade
								  </small>
							</div>
							<div class="form-field">
								<label>Bairro</label>
								<input id="Bairro" name="bairro" class="form-control">
								<small class="form-text text-muted">
									Bairro
								  </small>
							</div>
							<div class="form-field">
								<label>Endereço</label>
								<input id="Endereço" name="endereço" class="form-control">
								<small class="form-text text-muted">
									Endereço
								  </small>
							</div>
							<div class="form-field">
								<label>Número</label>
								<input id="Número" name="número" class="form-control">
								<small class="form-text text-muted">
									Número
								  </small>
							</div>
							<div class="form-field">
								<label>Complemento</label>
								<input id="Complemento" name="complemento" class="form-control">
								<small class="form-text text-muted">
									Complemento
								</small>
							</div>
							<div class="form-field">
								<label>Telefone</label>
								<input id="Telefone" name="telefone" class="form-control">
								<small class="form-text text-muted">
									Formato 99 9999-9999
								  </small>
							</div>
							<div class="form-field">
								<label>Celular</label>
								<input id="Celular" name="celular" class="form-control">
								<small class="form-text text-muted">
									Formato 99 99999-9999
								  </small>
							</div>
							<div class="form-field">
								<input type="checkbox" value="Sim" name="Autorização_de_contato" id="Autorização_de_contato" class="form-check-input">
								<label for="Autorização_de_contato" class="form-check-label">
								  Autorizo que entre em contato
								</label>
							</div>
							<div class="form-field">
								<input type="checkbox" value="Sim" name="Autorização_de_uso" id="Autorização_de_uso" class="form-check-input">
								<label for="Autorização_de_uso_da _imagem" class="form-check-label">
								  Autorizo o uso de imagem para terceiros
								</label>
							</div>
							<div  id="captcha" class="g-recaptcha"></div>
							<br>
							<button type="button" class="btn btn-danger" @click="submit" ref="request">Enviar</button>
						</form>
				</div>
			</div>
		</script>

		<div style="display: none;" id="json">
			{{ $json }}
		</div>

	    <script type="text/javascript">
		console.log($.parseJSON($('#json').html()));
		var treeData = new Pagina($.parseJSON($('#json').html()), true)

		$('#json').remove()

			// define the tree-item component
		Vue.component('arvore-item', {
			  template: '#arvore-template',
			  props: {
			    item: Object,
			    folder: Object
			  },
			  data: function () {
			  	var aux = this.item.root
			  	if( this.item.open ) {
				  		this.folder.data = this.item//AQUII
				     	this.item.clicked = true
				     	aux = true
				  }
			    return {
			      isOpen: aux,
			    }
			  },
			  computed: {
			    isFolder: function () {
			      return this.item.children &&
			        this.item.children.length
			    },
			    lonelyPage: function() {
			    	return (this.isFolder > 0 && this.item.root ) || (!this.item.root)
			    },
			    isClicked: function(){
			    	return this.item.clicked
			    }
			  },
			  methods: {
			    toggle: function () {
			    	if( !this.item.source ){//AQUII
			      		if (this.isFolder  && !this.item.root) {
			     			 this.isOpen = !this.isOpen;
			     		}
			     		 this.folder.isUpdated = true; //AQUII
			     		 if( !this.item.html  && this.item.children.length && !this.item.lista.fullList.length ) this.folder.data = this.item.children[0]
			     		 else this.folder.data = this.item
			     	}
			      	arvore.treeData.unclick()
			     	this.item.clicked = true
			    }
			  }
			})

		Vue.component('html-item', {
			  template: '#html-template',
			  props: {
			    item: Object,
			    search: String,
			    dataUp: String,
			    dataTo: String,
			    datamm: String,
			    datayy: String,
			    categoria: String,
			    cidade: String,
			    sortOrders: Object,
			  },
			  data: function () {
			    return {
			      size: 12,
			      paginatorInspector: '',
			      sortKey: '',
				  starts: 0,
				  captcha : -1
			    }
			  },
			  mounted: function(){
				  initiate();
				  share(this.item, 'item')

			  	  if(this.modal) $(this.$refs.modal).modal('show')
			  },
			  updated: function(){
			  	if(this.modal) $(this.$refs.modal).modal('show')

				templateUpdated()

				var filterKey = this.search && this.search.toLowerCase()
				var categoria = this.categoria && this.categoria.toLowerCase()
				var mm = this.datamm && this.datamm.toLowerCase()
				var yy = this.datayy && this.datayy.toLowerCase()
				var rangeUp = this.dataUp && this.dataUp.toLowerCase()
				var rangeTo = this.dataTo && this.dataTo.toLowerCase()
				var cidade = this.cidade && this.cidade.toLowerCase()

				if (filterKey || rangeUp || rangeTo || categoria || mm || yy || cidade) {
					sumirDestaques();
				}else{
					aparecerDestaques();
				}

				if(( this.agenda || this.form ) && this.captcha == -1){
					this.captcha = grecaptcha.render('captcha', {
						'sitekey' : '6LcJ-gkTAAAAAPqT5MG4b3QSluwv_gB3h_spLtuq',
						'theme' : 'light'
						});
				}else if(this.captcha != -1){
					this.captcha = grecaptcha.reset(this.captcha);
				}
			  },
			  beforeUpdate: function(){
			  	templateBeforeUpdate()
			  },
			  computed: {
			  	   busca: function(){ return this.item.search},
			  	   agenda: function(){ return this.item.agenda ? this.item.agenda : false},
			   	   html: function (){return this.item.html ? String($("#"+this.item.html).html()) : this.erro},
				   listaOrdenada: function(){
					      var data = this.item.getLista() && this.item.getLista().length > 0 ? this.item.getLista() : false;
					      if(!data) return false;

				   		  var filterKey = this.search && this.search.toLowerCase()
				   		  var categoria = this.categoria && this.categoria.toLowerCase()
				   		  var mm = this.datamm && this.datamm.toLowerCase()
				   		  var yy = this.datayy && this.datayy.toLowerCase()
				   		  var rangeUp = this.dataUp && this.dataUp.toLowerCase()
				   		  var rangeTo = this.dataTo && this.dataTo.toLowerCase()
					      var busca = this.busca

					      if(!busca.datayy & !busca.categoria) return false

							if(filterKey || categoria || yy || mm || ( rangeUp || rangeTo ) ){
							      if (filterKey) {
							        data = data.filter(function (row) {
							          return Object.keys(row).some(function (key) {
							          	if (key === 'href') return false
							            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
							          })
							        })
							      }
							      if (categoria) {
							        data = data.filter(function (row) {
							            return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
							        })
							      }
							      if (yy) {
							        data = data.filter(function (row) {
							            return String(row['datayy']).toLowerCase().indexOf(yy) > -1
							        })
							      }
							      if (mm) {
							        data = data.filter(function (row) {
							            return String(row['datamm']).toLowerCase().indexOf(mm) > -1
							        })
							      }
							      if (rangeUp || rangeTo) {
							      	rangeUp = rangeUp ? rangeUp : 0;
							      	rangeTo = rangeTo ? rangeTo : 99999999;
									data = data.filter(function (row) {
							          return ( row.data >= rangeUp && row.data <= rangeTo)
							        })
							      }
							}

							var au, arr = []

							if(busca.datayy && busca.getArrYear(data).length > 1){

								busca.getArrYear(data).forEach(function(el){

									au = {
										name: el,
										data : []
									}

									au.data = data.filter(function (row) {
							            return String(row['datayy']).toLowerCase().indexOf(el.toLowerCase()) > -1
							        })

							        arr.push(au)

								})

							}else if(busca.categoria && busca.getArrCat(data).length > 1){
								busca.getArrCat(data).forEach(function(el){

									au = {
										name: el,
										data : []
									}

									au.data = data.filter(function (row) {
							            return String(row['categoria']).toLowerCase().indexOf(el.toLowerCase()) > -1
							        })

							        arr.push(au)

								})
							}else{
								return false
							}

							return arr

				   },
				   lista: function(){
					      var data = this.item.getLista() && this.item.getLista().length > 0 ? this.item.getLista() : false;
					      if(!data) return false;

				   		  var filterKey = this.search && this.search.toLowerCase()
				   		  var categoria = this.categoria && this.categoria.toLowerCase()
				   		  var mm = this.datamm && this.datamm.toLowerCase()
				   		  var yy = this.datayy && this.datayy.toLowerCase()
				   		  var rangeUp = this.dataUp && this.dataUp.toLowerCase()
				   		  var rangeTo = this.dataTo && this.dataTo.toLowerCase()

							if(filterKey || categoria || yy || mm || ( rangeUp || rangeTo ) ){
							      if (filterKey) {
							        data = data.filter(function (row) {
							          return Object.keys(row).some(function (key) {
							          	if (key === 'href') return false
							            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
							          })
							        })
							      }
							      if (categoria) {
							        data = data.filter(function (row) {
							            return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
							        })
							      }
							      if (yy) {
							        data = data.filter(function (row) {
							            return String(row['datayy']).toLowerCase().indexOf(yy) > -1
							        })
							      }
							      if (mm) {
							        data = data.filter(function (row) {
							            return String(row['datamm']).toLowerCase().indexOf(mm) > -1
							        })
							      }
							      if (rangeUp || rangeTo) {
							      	rangeUp = rangeUp ? rangeUp : 0;
							      	rangeTo = rangeTo ? rangeTo : 99999999;
									data = data.filter(function (row) {
							          return ( row.data >= rangeUp && row.data <= rangeTo)
							        })
							      }
							}

							return data
				   },
				   pessoas: function(){
				   		  var filterKey = this.search && this.search.toLowerCase()
					      var data = this.item.getPessoas() && this.item.getPessoas().length > 0 ? this.item.getPessoas() : false;
					      if( !data ) return false

					      if (filterKey) {
					        data = data.filter(function (row) {
					          return Object.keys(row).some(function (key) {
					            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					          })
					        })
					      }
					      return data
				   },
				   form: function(){
					      var data = this.item.getInputs() && this.item.getInputs().length > 0 ? this.item.getInputs() : false;

					      return data
				   },
				   editorial: function(){
			   		  var filterKey = this.search && this.search.toLowerCase()
			   		  var yy = this.datayy && this.datayy.toLowerCase()
			   		  var mm = this.datamm && this.datamm.toLowerCase()
      				  var categoria = this.categoria && this.categoria.toLowerCase()
      				  var cidade = this.cidade && this.cidade.toLowerCase()

				      var data = this.item.getEditorial() && this.item.getEditorial().length > 0 ? this.item.getEditorial() : false;
				      if( !data ) return false

				      if (filterKey) {
				        data = data.filter(function (row) {
				          return Object.keys(row).some(function (key) {
				            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
				          })
				        })
				      }

			          if (yy) {
					        data = data.filter(function (row) {
					            return String(row['datayy']).toLowerCase().indexOf(yy) > -1
					        })
					     }

						if (mm) {
						data = data.filter(function (row) {
							return String(row['datayy']).toLowerCase().indexOf(yy) > -1
						})
						}

					  if (categoria) {
					        data = data.filter(function (row) {
					            return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
					        })
						  }

					  if (cidade) {
						data = data.filter(function (row) {
							return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						})
						}

					      return data
				   },
				   clube: function(){
				   		var filterKey = this.search && this.search.toLowerCase()
				   		var cidade = this.cidade && this.cidade.toLowerCase()
				      	var categoria = this.categoria && this.categoria.toLowerCase()


					    var data = this.item.getClube() && this.item.getClube().length > 0 ? this.item.getClube() : false;
					      if( !data ) return false

					      if (filterKey) {
					        data = data.filter(function (row) {
					          return Object.keys(row).some(function (key) {
					            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					          })
					        })
					      }

					      if (categoria) {
					        data = data.filter(function (row) {
					            return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
					        })
					      }

					      if (cidade) {
					        data = data.filter(function (row) {
					            return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
					        })
					      }

					      return data
				   },
				   vaga: function () {
				   	  var data = this.item.getVagas() && this.item.getVagas().length > 0 ? this.item.getVagas() : false;
					  if(!data) return false
				      var filterKey = this.search && this.search.toLowerCase()
				      var cidade = this.cidade && this.cidade.toLowerCase()
				      var rangeUp = this.dataUp && this.dataUp.toLowerCase()
				      var rangeTo = this.dataTo && this.dataTo.toLowerCase()

					    if (filterKey) {
					        data = data.filter(function (row) {
					          return Object.keys(row).some(function (key) {
					            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					          })
					        })
					      }

					    if (cidade) {
						   data = data.filter(function (row) {
						       return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						   })
						 }

					      if (rangeUp || rangeTo) {
					      	rangeUp = rangeUp ? rangeUp : 0;
					      	rangeTo = rangeTo ? rangeTo : 99999999;
							data = data.filter(function (row) {
					          return ( String(row.data) >= rangeUp && String(row.data) <= rangeTo)
					        })
					      }

				      return data
				   },
				   mapa: function () {
				   	  var data = this.item.getMapa() && this.item.getMapa().length > 0 ? this.item.getMapa() : false;
					  if(!data) return false
				      var filterKey = this.search && this.search.toLowerCase()
				      var cidade = this.cidade && this.cidade.toLowerCase()
				      var rangeUp = this.dataUp && this.dataUp.toLowerCase()
				      var rangeTo = this.dataTo && this.dataTo.toLowerCase()

					    if (filterKey) {
					        data = data.filter(function (row) {
					          return Object.keys(row).some(function (key) {
					            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					          })
					        })
					      }

					    if (cidade) {
						   data = data.filter(function (row) {
						       return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
						   })
						 }

					      if (rangeUp || rangeTo) {
					      	rangeUp = rangeUp ? rangeUp : 0;
					      	rangeTo = rangeTo ? rangeTo : 99999999;
							data = data.filter(function (row) {
					          return ( String(row.data) >= rangeUp && String(row.data) <= rangeTo)
					        })
					      }

					    var aux = [];

					    data.forEach(function (el){
					    	aux.push([el.descricao, el.latitude, el.longitude])
					    })

					    window.objeto_mapa = aux;

				      return data
				   },
				   accordion: function(){
				   	  var data = this.item.getAccordion() && this.item.getAccordion().length > 0 ? this.item.getAccordion() : false;
					  if(!data) return false
					  	return data
				   },
				   tabela: function(){ //AQUII
					      var data = this.item.getLicitacao() && this.item.getLicitacao().length > 0 ? this.item.getLicitacao() : false;
					      if(!data) return false
		     			  var sortKey = this.sortKey
		     			  var order = this.sortOrders[sortKey] || 1
	      				  var filterKey = this.search && this.search.toLowerCase()
	      				  var categoria = this.categoria && this.categoria.toLowerCase()
	      				  var rangeUp = this.dataUp && this.dataUp.toLowerCase()
				   		  var rangeTo = this.dataTo && this.dataTo.toLowerCase()

					      if (filterKey) {
					        data = data.filter(function (row) {
					          return Object.keys(row).some(function (key) {
					            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					          })
					        })
					      }

					      if (categoria) {
					        data = data.filter(function (row) {
					            return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
					        })
					      }

					      if (rangeUp || rangeTo) {
					      	rangeUp = rangeUp ? rangeUp : 0;
					      	rangeTo = rangeTo ? rangeTo : 99999999;
							data = data.filter(function (row) {
					          return ( String(row.abertura).slice(0, 8) >= rangeUp && String(row.abertura).slice(0, 8) <= rangeTo)
					        })
					      }

					      if (sortKey) {
					        data = data.slice().sort(function (a, b) {
					          a = a[sortKey]
					          b = b[sortKey]
					          return (a === b ? 0 : a > b ? 1 : -1) * order
					        })
					      }


					      return new Tabela(data).tabela;
				   },
				   destaques: function(){
				   		var data = this.item.getDestaques() && this.item.getDestaques().length > 0 ? this.item.getDestaques() : false;
					      if(!data) return false;

				   		data = data.slice(0, 4);

				   		var aux = []
				   		if( data.length === 1 ) aux = [ [ data[0] ] ]
				   		if( data.length === 2 ) aux = [ [ data[0] ] , [ data[1] ] ]
				   		if( data.length === 3 ) aux = [ [ data[0] ] , [ data[1] , data[2] ] ]
				   		if( data.length === 4 ) aux = [ [ data[0] , data[1] ], [ data[2] , data[3] ] ]

				   			data = aux

				   		return data
				   },
				   destaques_eventos: function(){
				   		var data = this.item.getDestaquesEventos() && this.item.getDestaquesEventos().length > 0 ? this.item.getDestaquesEventos() : false;
					      if(!data) return false;

				   		data = data.slice(0, 4);

				   		var aux = []
				   		if( data.length === 1 ) aux = [ [ data[0] ] ]
				   		if( data.length === 2 ) aux = [ [ data[0] ] , [ data[1] ] ]
				   		if( data.length === 3 ) aux = [ [ data[0] ] , [ data[1] , data[2] ] ]
				   		if( data.length === 4 ) aux = [ [ data[0] , data[1] ], [ data[2] , data[3] ] ]

				   			data = aux

				   		return data
				   },
				   eventos: function(){
				   		var data = this.item.getEventos() && this.item.getEventos().length > 0 ? this.item.getEventos() : false;
					      if(!data) return false;

					      var filterKey = this.search && this.search.toLowerCase()
					      var rangeUp = this.dataUp && this.dataUp.toLowerCase()
					      var rangeTo = this.dataTo && this.dataTo.toLowerCase()
					      var categoria = this.categoria && this.categoria.toLowerCase()

					      if (filterKey) {
					              data = data.filter(function (row) {
					                return Object.keys(row).some(function (key) {
					                  return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					                })
					              })
					      	  }
					            if (rangeUp || rangeTo) {
					            	rangeUp = rangeUp ? rangeUp : 0;
					            	rangeTo = rangeTo ? rangeTo : 99999999;
					      		data = data.filter(function (row) {
					                return ( String(row.abertura).slice(0, 8) >= rangeUp && String(row.abertura).slice(0, 8) <= rangeTo)
					              })
					      	  }
					            if (categoria) {
					              data = data.filter(function (row) {
					                  return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
					              })
					      	  }

				   		return data
				   },
				   hasNoticiaDataAutor(){
					   return (parseInt(this.item.data.full_created) > 20210409000000) && this.item.type === 'noticia'
				   },
				   noticias: function () {
						var data = this.item.getNoticias() && this.item.getNoticias().length > 0 ? this.item.getNoticias() : false;
						if(!data) return false;

						var filterKey = this.search && this.search.toLowerCase()
						var rangeUp = this.dataUp && this.dataUp.toLowerCase()
						var rangeTo = this.dataTo && this.dataTo.toLowerCase()
						var categoria = this.categoria && this.categoria.toLowerCase()

						if (filterKey) {
						        data = data.filter(function (row) {
						          return Object.keys(row).some(function (key) {
						            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
						          })
						        })
							  }
						      if (rangeUp || rangeTo) {
						      	rangeUp = rangeUp ? rangeUp : 0;
						      	rangeTo = rangeTo ? rangeTo : 99999999;
								data = data.filter(function (row) {
						          return ( String(row.abertura).slice(0, 8) >= rangeUp && String(row.abertura).slice(0, 8) <= rangeTo)
						        })
							  }
						      if (categoria) {
						        data = data.filter(function (row) {
						            return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
						        })
							  }

						return data;
				   },
				   banners: function(){
						var data = this.item.getBanners() && this.item.getBanners().length > 0 ? this.item.getBanners() : false
						if(!data) return false
						return data
				   },
				   video: function(){
				   		var filterKey = this.search && this.search.toLowerCase()

					    var data = this.item.getVideos() && this.item.getVideos().length > 0 ? this.item.getVideos() : false;
					      if( !data ) return false

					      if (filterKey) {
					        data = data.filter(function (row) {
					          return Object.keys(row).some(function (key) {
					            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
					          })
					        })
					      }

					      return data
				   },
				   galeria: function(){
					    var data = this.item.getGaleria() ? this.item.getGaleria() : false;
					      if( !data ) return false

					      return data
				   },
				   modal : function(){

				   	var data = this.item.getModal() && this.item.getModal().length > 0 ? this.item.getModal() : false;
					      if( !data ) return false

				   	return data[0]
				   },
				   colunas: function(){ //AQUII
					      var data = this.item.getLicitacao().colunas;

					      return data;
				   },
				   erro: function(){
				   	 if( !(this.lista || this.item.children.length > 0 || this.item.source || this.item.tabela ) ){
				   	 	return $("#notfound-template").html()
				   	 }
				   	 return '';
				   },
				   dataPaginator: function(){
					   	if(this.tabela) {
					   		return this.tabela
					   	}
					   	if(this.clube){
					   	 	return this.clube
					   	 }
					   	if(this.editorial){
					   		return this.editorial
					   	}
					   	if(this.vaga){
					   		return this.vaga
					   	}
					   	if(this.noticias){
					   		return this.noticias
					   	}
					   	if(this.eventos){
					   		return this.eventos
					   	}
					   	if(this.lista){
					   		return this.lista
					   	}
					   	if(this.video){
					   		this.size = 6
					   		if(sizeofscreen() < 1200) this.size = 5
					   		if(sizeofscreen() < 768) this.size = 4
					   		if(sizeofscreen() < 480) this.size = 2
					   		return this.video
					   	}
					   	if(this.galeria){
					   		this.size = 6
					   		if(sizeofscreen() < 1200) this.size = 5
					   		if(sizeofscreen() < 768) this.size = 4
					   		if(sizeofscreen() < 480) this.size = 2
					   		return this.galeria.imagens
					   	}
					   	return false
				   },
				   paginator: function(){
				    	if( this.paginatorInspector !== this.hashCode(this.dataPaginator) ){
				    		this.paginatorInspector = this.hashCode(this.dataPaginator);
				    		this.starts = 0;
				    	}
				    	if(this.video || this.galeria){
							if(this.starts > this.end){
								return this.dataPaginator.slice(this.starts, this.sizeofarray).concat(this.dataPaginator.slice(0, this.end))
							}
				   		}else{
							if(this.starts > this.end){
								return this.dataPaginator.slice(this.starts, this.sizeofarray)
							}
						}
				    	return this.dataPaginator.slice(this.starts, this.end)
				   },
				   end: function(){
				   		if(this.size >= this.sizeofarray ) return this.starts+this.size
				   		if( this.starts+this.size > this.sizeofarray ) return  (this.starts+this.size) - this.sizeofarray
				   		return this.starts+this.size;
				   },
				   sizeofarray: function(){return this.dataPaginator.length;},
				   pagesize: function(){return Math.ceil(this.dataPaginator.length/this.size);},
				   pages: function(){
						var i = 0;
						var retorno = {};
						var page = this.page;
						if(this.page + 7 >= this.pagesize && this.pagesize >= 15) page = this.pagesize - 15
						while(i < this.pagesize && i < 15){
							if(this.page + 7 >= this.pagesize && this.pagesize >= 15 ) retorno[i] = page+i;
							else if(page >= 8)	retorno[i] = page-7+i;
							else retorno[i] = i;
							i++;

						}
						return retorno;
				    },
				    hasPage: function(){
				    	return !(this.pagesize == 1)
				    },
				   page: function(){return parseInt(this.starts/this.size); }
			   },
				methods: {
				    sortBy: function (key) {
				      this.sortKey = key
				      this.sortOrders[key] = this.sortOrders[key] * -1
				    },
				    toward :function(){
				    	if (this.starts > 0) this.starts -= this.size
				    	else this.starts = (this.pagesize-1)*this.size
				    },
				    foward :function(){
				    	if ( (this.starts + this.size) < this.dataPaginator.length ) this.starts += this.size
				    	else this.starts = 0
				    },
				    toward_one :function(){
				    	if (this.starts > 0) this.starts--
				    	else this.starts = this.sizeofarray
				    },
				    foward_one :function(){
				    	if ( (this.starts + 1) < this.dataPaginator.length ) this.starts++
				    	else this.starts = 0
				    },
				    hashCode : function(obj){
						var s = JSON.stringify(obj);
					  return s.split("").reduce(function(a,b){a=((a<<5)-a)+b.charCodeAt(0);return a&a},0);
					},
					toPage(page){
						this.starts = this.size*page;
					},
					async submit(){

						$(this.$refs.request).html('Enviando...')
						$(this.$refs.request).attr('disabled', true)

						var json = $(this.$refs.formulario).serializeArray();

						var aux = {}, item = this.item, retorno, mensagem_erro = ''

						json.forEach(function(el){
							aux[el.name] = el.value
						});

						if(aux['g-recaptcha-response'].length < 1){

							mensagem_erro = 'Voce não validou o recaptcha!'
							resultado = false

						}else{

							if(aux['tipo_inscricao'] === 'Registrado'){

								var inscricao_data = await axios.get(
									window.rota + 'associados/find/'+ aux['Registro'].replace(/\//g, '*') + '/' + aux['cpf/cnpj'].replace(/\//g, '*')
								).then(function(response) {
									if(response.data.status == 200){
										return true
									}else{
										mensagem_erro = 'Registro de associado invalido'
										return false
									}
								}).catch(function(){
									mensagem_erro = 'Registro de associado invalido'
									return false
								})

							}else if( aux['tipo_inscricao'] === 'Sociedade' || aux['tipo_inscricao'] === 'Estudante' ){
								var inscricao_data = true
							}else{
								var inscricao_data = false
								mensagem_erro = 'Selecione um tipo de Ticket!'
							}

							if(inscricao_data){

								var formData = {
									item_id : item.id,
									nome : aux['nome'],
									email : aux['email'],
									json : JSON.stringify(aux)
								}

								var data = await axios.post(
									window.rota + 'ticket',
									formData
								).then(function(response) {

									if (response.data.status == '200') {
										return true
									} else {
										mensagem_erro = 'E-mail informado inválido!'
										return false
									}
								}).catch(function(){
									mensagem_erro = 'Ocorreu um erro ao enviar o formulario!'
									return false
								})

							} else {
								data = false
							}


							if( inscricao_data && data ){

								var data_final = await axios.get(
									window.rota + 'agenda/debitar/'+ item.id + '/' + aux['tipo_inscricao']
								).then(function(response) {
									return true
								}).catch(function(){
									return false
								})

							}else if(data){
								var data_final = true
							}else{
								var data_final = false
							}

							resultado = data_final

						}

						if(resultado) {
							$(this.$refs.request).html('Enviado!')
							$(this.$refs.request).removeAttr('disabled')

							this.item.lista = {}

							this.item.lista.modal = [new Modal({
								name : 'Sucesso!',
								descricao : 'Acesse sua caixa de email para retirar seu ticket!'
							})]

						} else {

							$(this.$refs.request).html('Tente Novamente!')
							$(this.$refs.request).removeAttr('disabled')

							this.item.lista = {}

							this.item.lista.modal = [new Modal({
								name : 'Error!',
								descricao : mensagem_erro
							})]

						}

						this.item = this.item

					}
				}
			})


			window.content = new Vue({
					  el: '.folder-content',
					  data: {
					    data: treeData,
					    search : '',
					   	dataUp : '',
					   	dataTo : '',
					    datamm : '',
					    datayy : '',
					    datacategoria : '',
					    datacidade: '',
					    dataSortOrders: {},
					    isUpdated : false  // AQUII
					  },
					  computed: {
						busca: function(){
							return this.data.search;
						},
						has_busca: function(){
							if(this.busca.datamm || this.busca.datayy || this.busca.categoria || this.busca.cidade || this.busca.pesquisar || this.busca.datarange ){
								return true;
							}else{
								return false;
							}
						},
						datammyy: function(){
							return this.mm || this.yy;
						},
						mm: function(){
							if(this.lista) return this.busca.getArrMonth(this.lista, this.datayy);
							if(this.editorial) return this.busca.getArrMonth(this.editorial, this.datayy);
							return false
						},
						yy: function(){
							if(this.lista) return this.busca.getArrYear(this.lista);
							if(this.editorial) return this.busca.getArrYear(this.editorial);
							return false
						},
						categoria: function(){
							if(this.lista) return this.busca.getArrCat(this.lista);
							if(this.clube) return this.busca.getArrCat(this.clube);
							if(this.noticias) return this.busca.getArrCat(this.noticias);
							if(this.eventos) return this.busca.getArrCat(this.eventos);
							if(this.tabela) return this.busca.getArrCat(this.tabela);
							if(this.editorial) return this.busca.getArrCat(this.editorial);
							return false;
						},
						cidade: function(){
							if(this.clube) return this.busca.getArrCid(this.clube);
							if(this.editorial) return this.busca.getArrCid(this.editorial);
							if(this.vaga) return this.busca.getArrCid(this.vaga);
							if(this.mapa) return this.busca.getArrCid(this.mapa);

							return false;
						},
						tipo: function(){
							return false
						},
						tabela: function(){
							return this.data.getLicitacao() ? this.data.getLicitacao() :  false;
						},
						lista: function(){
							return this.data.getLista() && this.data.getLista().length > 0 ? this.data.getLista() : false;
						},
						clube: function(){
							return this.data.getClube() && this.data.getClube().length > 0 ? this.data.getClube() : false;
						},
						editorial: function(){
							return this.data.getEditorial() && this.data.getEditorial().length > 0 ? this.data.getEditorial() : false;
						},
						vaga: function(){
							return this.data.getVagas() && this.data.getVagas().length > 0 ? this.data.getVagas() : false;
						},
						eventos: function(){
							return this.data.getEventos() && this.data.getEventos().length > 0 ? this.data.getEventos() : false;
						},
						noticias: function () {
							return this.data.getNoticias() && this.data.getNoticias().length > 0 ? this.data.getNoticias() : false;
						},
						mapa: function () {
							return this.data.getMapa() && this.data.getMapa().length > 0 ? this.data.getMapa() : false;
						}
					   },
					  methods: {
					  	toggleSearch: function (item) {
					  		toggleSearch()
					    },
					  },
					  beforeUpdate: function(){
					  	if(this.isUpdated){
						    this.search = ''
						   	this.dataUp = ''
						   	this.dataTo = ''
						    this.datamm = ''
						    this.datayy = ''
						    this.datacategoria = ''
						    this.datacidade = ''
					  		this.isUpdated = false
					  		this.starts = 0

						  		var sortOrders = {}
						  		if(this.colunas){
								    this.colunas.forEach(function (key) {
								      sortOrders[key] = 1
								    })
						  		}

						  	this.dataSortOrders = sortOrders
						    initFldrBf()
					  	}
					  },
					  updated: function(){
					  	initFldrAf()
					  },
					})

			window.arvore = new Vue({
			  el: '#arvore-paginas',
			  data: {
			    treeData: treeData,
			    folder : content,
			  },
			  computed: {
			  	isFolder: function () {
			      return this.treeData.children &&
			        this.treeData.children.length
			    },
			  	 lonelyPage: function() {
			    	return (this.isFolder > 0 && this.treeData.root ) || (!this.treeData.root)
			    }
			  },
			  methods: {
			  	makeFolder: function (item) {
			    	Vue.set(item, 'children', [])
			      this.addItem(item)
			    },
			    addItem: function (item) {
			    	item.children.push({
			        name: 'new stuff'
			      })
			    },

			  }
			})
	    </script>
</html>
