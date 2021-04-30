<div class="conteudo-lg">
  		<div class="container padding5">
  			<!-- Caixa de texto -->
				<div class="text-box mapping-site">

                    <?php recursiveMap($json); ?>    

                </div>
        </div>
</div>


<?php function recursiveMap($json, $rota = '../') 
    { 
?>
                    <ul>

                    <?php 
                        foreach ($json as $pagina) :
                    ?>

                            <li>
                                <a href="<?= $rota ?><?=$pagina['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $pagina['name'])) ?>" >
                                    
                                    <?= $pagina['name'] ?>
                                    
                                </a>
                                <?php recursiveMap($pagina['children']) ?>
                            </li>

                    <?php 
                        endforeach;
                    ?>
                    </ul>

<?php } ?>