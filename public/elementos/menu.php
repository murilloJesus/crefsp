  	<!-- MENU -->
		<div class="menu-lg">

			<div class="container">
				<nav class="menu">		

					<?php foreach ($home['menu'] as $menu): ?>
					<!--PRIMEIRO VEM O SUB MENU, DEPOIS O BUTTON MENU	-->
					<div class="drop-menu-sub">
						<div class=" menu-down drop-menu-list" data-toggle="<?=$menu['id']?>" id="<?=$menu['id']?>">
							<div class="sub-menu-link">
							
							<?php foreach ($menu['children'] as $submenu): ?>

								<a href="<?= $rota ?><?= $submenu['source'] != '' ? $submenu['source'] : $submenu['id'] ?>-<?= str_replace(' ', '-', str_replace('/', '-', $submenu['name'])) ?>" ><p><?=$submenu['name']?></p></a>

							<?php endforeach; ?>

							</div>
						</div>				
					</div>
					
					<a class="menu-down drop-menu" href="<?= $rota ?><?=$menu['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $menu['name'])) ?>" data-toggle="<?=$menu['id']?>"><?=$menu['name']?></a>
					
					<?php endforeach;?>

				</div>
			</div>
		</div>