<!doctype html>

<html lang="pt">
	<head>
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

		<?php require "public/paginas/mapa_site.php"; ?>

		<?php require "public/elementos/footer.php"; ?>
		<script type="text/javascript">
		 	window.rota = '<?=$rota?>'
		 </script>
		<?php require "public/elementos/foot.php"; ?>
		
	</body>

    <script>
        
        $(function(){
            initiate();
        })

    </script>
</html>