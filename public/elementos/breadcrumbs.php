<!-- BREADCRUMBS -->
<div class="breadcrumbs-lg">
<!-- 	<div class="live">
		<div class="itens right">
			<i class="fa fa-edit btn-live"></i>
		</div>
	</div> -->
	<div class="container">
	  	<div class="breadcrumbs">
	  		<?php foreach ($patch as $key => $link) : ?>
	  		<a href="<?=$link['link']?>"><?= $link['nome'] ?></a> 
	  			<?= isset($patch[$key+1]) ? '<i class="fa fa-chevron-right"></i>' : '' ?>
	  		<?php endforeach; ?>
	  	</div>

	</div>
</div>