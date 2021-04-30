  	<!-- Mobile -->
  	<div class="mobile-head">
	  	<div class="header-mb">
		    <div class="container">
		    	<div class="row">
			    	<div class="col-12">
			    		<a href="/<?= $rota ?>">
			    			<img alt="icone CREF/SP" src="<?= $rota ?>public/img/crefsp.png" class="img-logo-crefsp">	
			    		</a>
			    	</div>
		    	</div>
		    </div>
	  	</div>

	  	<div class="lilmenu-mb">
	  		<div class="container">
				<div class="lilmenubutton menu-anchor">
					<i class="fas fa-bars"></i>
				</div>
				<div class="lilmenubutton">
					<a href="<?= $rota ?>532-Serviços-Online"><i class="fas fa-user" alt="Serviços Online"></i></a>
				</div>
				<div class="lilmenubutton">
					<a href="<?= $rota ?>538-Fale-Conosco"><i class="fas fa-envelope"  alt="Fale Conosco"></i></a>
				</div>
				<div class="lilmenubutton">
					<a href="<?= $rota ?>537-SAP-Atendimento-Telefonico"><i class="fas fa-phone"  alt="Atendimento Telefônico"></i></a>
				</div>
				<div class="lilmenubutton">
					<a href="<?= $rota ?>14"><i class="fas fa-map-marker-alt"  alt="Sedes e Secionais"></i></a>
				</div>
			</div>
		</div>

		<div class="search-mb">
			<div class="container">
				<div class="header-search">
					   <input class="input-search" id="pesquisar-mobile" type="text" name="search" placeholder="                  Pesquisar" >
					   <i class="fa fa-search iconesearch"></i> 
				</div>
			</div>
		</div>

  		<div id="mobile" class="menu-shiffter">
		    <nav class='animated bounceInDown'>
		    	<div class="head-menu-shiffter">
		    		<div class="button-menu-shiffter menu-anchor">
						<i class="fas fa-chevron-left"></i>
						<i class="fas fa-chevron-left"></i>
					</div>
		    	</div>
				<menu>	
						<?php foreach ($home['menu'] as $menu): ?>
							<li class='sub-menu'><a href='#'><?=$menu['name']?><i class="fas fa-chevron-down right"></i></a>
								<ul>
								<?php foreach ($menu['children'] as $submenu): ?>

									<li><a href="<?= $rota ?><?= $submenu['source'] != '' ? $submenu['source'] : $submenu['id'] ?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" ><?= $submenu['name'] ?></a></li>

								<?php endforeach; ?>

								</ul>
							</li>	
						<?php endforeach;?>
	  			</menu>
			</nav>
		</div>
  	</div>

  	<div class="mobile-size"></div>

