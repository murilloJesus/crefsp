

<!-- HEADER -->
<header id="Topo" class="header-lg">
	<div class="container">
		<div class="row">
			<div class="col-4">
				<a href="/<?= $rota ?>" > <img alt="Conselho Regional do Estado de São Paulo - Quarta Região" src="<?= $rota ?>public/img/crefsp.png"> </a>
			</div>
			<div class="col-3">
				<li>
					<a href="
					<?= $rota ?>
					<?= $home->source ?>">
					
					<?= $home->name ?>
					</a>
				</li>
			</div>
			<div class="col-5">
				<div class="right">
					<div class="header-high">
						<a href="<?= $rota ?>2-Acesso-a-Informação" class="header-link"> 
							<i class="fa fa-info-circle" alt="Acesso à Informação"></i> ACESSO À INFORMAÇÃO
						</a>
						<a href="<?= $rota ?>mapa_site" class="header-link">
							<i class="fa fa-plus-circle" alt="Mapa do Site"></i> MAPA DO SITE
						</a>
						<a href="#alto-contraste" class="header-link" accesskey="3" onclick="window.toggleContrast()">
							<i class="fa fa-adjust" alt="Alto Contraste"></i> ALTO CONTRASTE
						</a>
					</div>
					<div class="header-search">
						<input id="pesquisar-site" class="input-search" type="text" name="search" placeholder="                                 Pesquisar" >
						<i class="fa fa-search iconesearch"></i> 
					</div>
					<nav id="links-rapidos" class="holder-link-2">
						<a class="iconblack" href="<?= $rota ?>532-Serviços-Online"><i class="fas fa-user" alt="Serviços Online"></i></a>
						<a class="iconblack" href="<?= $rota ?>521-Perguntas-Frequentes"><i class="far fa-comment-alt" alt="Perguntas Frequentes"></i></a>
						<a class="iconblack" href="<?= $rota ?>538-Fale-Conosco"><i class="fas fa-envelope" alt="Fale Conosco"></i></a>
						<a class="iconblack" href="<?= $rota ?>537-SAP-Atendimento-Telefonico"><i class="fas fa-phone" alt="Atendimento Telefônico"></i></a>
						<img src="<?= $rota ?>public/img/icone.png" alt="divisor de conteudo" class="divisor">
						<a class="icongrey youtubebackcolor" target="_blank" href="https://www.youtube.com/channel/UCodm5vlzIywT2GkQoNSZ8tg"><i alt="Canal CrefSP Youtube" class="fab fa-youtube"></i></a>
						<a class="icongrey facebookbackcolor" target="_blank" href="https://www.facebook.com/crefsp/"><i class="fab fa-facebook-f" alt="Pagina CrefSP Facebook"></i></a>
						<a class="icongrey twitterbackcolor" target="_blank" href="https://twitter.com/crefsp"><i class="fab fa-twitter" alt="Pagina CrefSP Twitter"></i></a>
						<a class="icongrey instagrambackcolor" target="_blank" href="https://www.instagram.com/crefsp/"><i class="fab fa-instagram" alt="Pagina CrefSP Instagram"></i></a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
