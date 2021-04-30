	<!-- HOME -->
<div id="home_id">
	<section>
		<div class="carousel-lg">
			<banner-item
				v-if="banners"
				:data="banners">
			</banner-item>
		</div>
	</section>

	  <!-- ACESSO RÁPIDO -->
	<section>
		<div class="acesso-rapido-lg" >
			<acesso-item
				v-if="acessos"
				:data="acessos">
			</acesso-item>
		</div>
	</section>

	  <!-- NOTICIAS E EVENTOS -->
	<section class="not-event-lg">  
			<div class="container">
				<div class="row">
					<!-- NOTICIAS -->  			
						<div class="col-12 col-lg-6 col-md-12" id="list-noticias" class="list-noticias-home" >
								<noticias-item
									v-if="noticias"
									:data="noticias">
								</noticias-item>
								<div class="seemore">
									<a href="/9"> VEJA MAIS..</a>
								</div>
						</div>

					<!-- EVENTOS CATEGORIA-->
						<div class="col-12 col-lg-6 col-md-12"  id="list-eventos">
							<p class="title-section spacebetween">
								Eventos
								<i id="view-method-event" class="fas fa-list"></i>
							</p>
							<div class="row">
								<div class="cat-event-lg">

								<?php foreach ($home['categorias_eventos'] as $categoria) : ?>

									<!-- Elemento Evento -->
									<div class="box-event" @click="cat_evento('<?=$categoria['name'];?>')" >
										<div class="outbox">
											<div class="innerbox">
												<div class="textbox">
													<?=$categoria['name'];?>
												</div>
											</div>
										</div>
										<i class="fa fa-chevron-right "></i>
									</div>

								<?php endforeach; ?>

									<div class="box-event hide-mobile" @click=outros>
										<div class="outbox">
											<div class="innerbox">
												<div class="textbox">
													Outros
												</div>
											</div>
										</div>
										<i class="fa fa-chevron-right "></i>
									</div>
								</div>
								<eventos-item
									v-if="eventos"
									:data="eventos">
								</eventos-item>
							</div>
							<div class="seemore">
								<a href="/11"> VEJA MAIS..</a>
							</div>
						</div>
				</div>
			</div>
	</section>

	<!-- MIDIA -->
	<section>
		<div class="midia-lg">
			<div class="container list-videos">
				<p class="title-section">
					Multimídia
				</p>
				<multimidia-item
					v-if="multimidia"
					:data="multimidia">
				</multimidia-item>
				<div class="seemore">
					<a href="/10"> VEJA MAIS..</a>
				</div>
			</div>		
		</div>
	</section>
</div>