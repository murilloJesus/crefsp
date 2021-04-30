  	<!-- FOOTER -->
	<div id="rodapé" class="footer-lg" style="background: url('<?=$home->tema->foot->original_source ? $rota .'storage/app/imagens/'.$home->tema->foot->source : $home->tema->foot->source; ?>'); background-size: cover;">
		<div class="container">
			<div class="fix-footer">
				<div class=" info">
					<a href="<?= $rota ?>" > <img src="<?= $rota ?>public/img/logo-branco.png" alt="icone" class="img-logo-crefsp-branco"> </a>	<br>
					Rua Libero Badaró, 377, 3º andar, 					<br>
					Centro, CEP 01009-000, 								<br>
					São Paulo/SP 										<br>
					Tel. (11) 3292-1700									<br>
					

					<div class="mapa">
                        <!-- <div id="map"></div> -->
						<a href="http://maps.google.com/?q=CREF4/SP" target="_blanck" > <img src="<?= $rota ?>public/img/maps_home.png" alt="Mapa" style="max-width: 100%; max-height: 100%;"> </a>	<br>
                    </div><br />

					<h5>Seccionais</h5>
						<?php
							$i = 0;
					        foreach ($home['seccionais'] as $seccional) {
					        	echo "<a href='$seccional[id]'> $seccional[name] </a>";

					             $i++;

					             if($i == 2){
					             	echo '<br>';
					             	$i = 0;
					             }
					        }

					    ?>
				</div>
				<div class="col-8 fix-mapping-mobile">
					<div class="fix-mapping">
						<div class="col site-mapping">
						
							<p class="menu-rodape"><?= $home['menu'][0]['name'] ?></p>

							<?php foreach ($home['menu'][0]['children'] as $submenu): ?>

								<a href="<?= $rota ?><?=$submenu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" class="link-mapping"><?=$submenu['name']?></a><br>

							<?php endforeach; ?>

							<br>

							<p class="menu-rodape"><?= $home['menu'][1]['name'] ?></p>

							<?php foreach ($home['menu'][1]['children'] as $submenu): ?>

								<a href="<?= $rota ?><?=$submenu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" class="link-mapping"><?=$submenu['name']?></a><br>

							<?php endforeach; ?>

						</div>
						<div class="col site-mapping">
							<p class="menu-rodape"><?= $home['menu'][2]['name'] ?></p>

							<?php foreach ($home['menu'][2]['children'] as $submenu): ?>

								<a href="<?= $rota ?><?=$submenu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" class="link-mapping"><?=$submenu['name']?></a><br>

							<?php endforeach; ?>
							<br>
							<p class="menu-rodape"><?= $home['menu'][3]['name'] ?></p>

							<?php foreach ($home['menu'][3]['children'] as $submenu): ?>

								<a href="<?= $rota ?><?=$submenu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" class="link-mapping"><?=$submenu['name']?></a><br>

							<?php endforeach; ?>
						</div>
						<div class="col site-mapping">
							<p class="menu-rodape"><?= $home['menu'][4]['name'] ?></p>

							<?php foreach ($home['menu'][4]['children'] as $submenu): ?>

								<a href="<?= $rota ?><?=$submenu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" class="link-mapping"><?=$submenu['name']?></a><br>

							<?php endforeach; ?>
							<br>
							<p class="menu-rodape"><?= $home['menu'][5]['name'] ?></p>

							<?php foreach ($home['menu'][5]['children'] as $submenu): ?>

								<a href="<?= $rota ?><?=$submenu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" class="link-mapping"><?=$submenu['name']?></a><br>

							<?php endforeach; ?>
						</div>
					</div>
					<div class="credits">
						<div>
							Todos os direitos reservados | <i class="fa fa-copyright"></i> <b>CREF4/SP </b> - Conselho Regional de Educação Física da 4ª Região
						</div>
						<div>
							<span>Desenvolvido por</span>
							<a href="https://evoluasempre.com.br"><strong>Evolua Sempre</strong></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>