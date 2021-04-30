<div class="conteudo-lg">
  		<div class="container padding5">
  			<!-- Caixa de texto -->
				<div class="text-box searching-site">
                    <?php
                        foreach ($json['paginas'] as $pagina => $array) :
                    ?>

                    <h5><?=$pagina?></h5>

                        <?php
                            foreach ($array as $pagina_final) :
                            if ($pagina_final['id'] == 536) {
                              ?>
                                <a href="http://189.1.167.210/BRConselhos/pgs/servicosonline.aspx"><?= $pagina_final['name'] ?></a>
                              <?php
                            } elseif ($pagina_final['id'] == 715) {
                               ?>
                                <a href="http://web.crefsp.gov.br/BRConselhos/login/loginboleto.aspx"><?= $pagina_final['name'] ?></a>
                               <?php 
                            } else {
                               ?>
                                <a href="<?= $rota ?><?=$pagina_final['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $pagina_final['name'])) ?>"><?= $pagina_final['name'] ?></a>
                              <?php
                            }
                        ?>
                        
                        <br>

                        <?php
                            endforeach;        
                        ?>

                    <?php
                        endforeach;        
                    ?>

                    <?php
                        foreach ($json['itens'] as $item => $array) :
                    ?>

                    <h5><?= $item ?></h5>

                        <?php
                            foreach ($array as $item_final) :
                        ?>

                        <a href="<?= $rota ?>item/<?=$item_final['id']?>-<?= str_replace(' ', '-', str_replace('/', '-', $item_final['name'])) ?>"><?= $item_final['name'] ?></a>
                        <br>

                        <?php
                            endforeach;        
                        ?>

                    <?php
                        endforeach;        
                    ?>
                </div>
        </div>
</div>