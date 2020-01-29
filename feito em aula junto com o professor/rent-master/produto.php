<?php include "includes/cabecalho.php"; ?>
	<!-- area central com 3 colunas -->
	<div class="container">
	<?php include "includes/menu_lateral.php"; ?>	
		<section class="col-2">
		<?php
            require_once "classes/Produto.php";
            require_once "includes/functions.php";
				
			if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
				echo "<h2>Identificador de produto inválido</h2>";
			}
			else {
				$obj = new Produto();			
				$produto = $obj->consultaProduto($_GET['id']);								
				if(empty($produto)){
					echo "<h2>Produto não encontrado</h2>";
				}
				else {				
				?>
			<div class="detalhes-produto">
				<h2><?=$produto[0]['nomeProduto'];?></h2>
				<figure>
				<img src="img/produtos/<?=mostraImagem($produto[0]['imagem']);?>" alt="<?=$produto[0]['nomeProduto'];?>">
				</figure>
				<div class="form">					
					<p>
					<?php
                    if($produto[0]['desconto'] == 0){
                    ?>
                    <span class="precoFinal">
                        <?=formataPreco($produto[0]['valor']);?>
                    </span>
                    <?php
                    }
                    else {
                        ?>
                        De <span class="precoInicial">
                        <?=formataPreco($produto[0]['valor']);?>
                        </span> por 
                        <span class="precoFinal">
                        <?=formataPreco($produto[0]['valor'] - $produto[0]['desconto']);?>
                        </span>
                        <?php
                    }
                    ?>
					</p>	
				
					<form action="adiciona.php" method="post" id="add-carrinho">
						<label for="quantidade">Quantidade:</label>
						<input type="number" name="quantidade" value="1" min="1">
						<input type="hidden" name="id" value="<?=$produto[0]['idProduto']?>">
						<input type="hidden" name="nome" value="<?=$produto[0]['nomeProduto']?>">
						<input type="hidden" name="valorFinal" value="<?=($produto[0]['valor'] - $produto[0]['desconto'])?>">
						<br><br>
						<input type="submit" value="Adicionar ao Carrinho" name="adicionar">
						<br><br>
					</form>
					</div>
					<div class="detalhes">
					<h4>Detalhes do produto</h4>				
						<p class= "fab">Fabricante: <?=($produto[0]['nomeFabricante']==NULL)? "Não informado" : $produto[0]['nomeFabricante'];?></p>
						<p class= "tensao">Tensão: <?=($produto[0]['tensao']==0)? "Não se aplica" : $produto[0]['tensao']?></p>					
						<p class= "desc">Descricao: <?=nl2br($produto[0]['descricao'])?></p>				
					
					<p class="detalhes">Categorias: <span class="cat-names">&nbsp;
					<?php
						$categorias = array();
						if($produto[0]['catMarcenaria']==1){
							array_push($categorias, "Marcenaria");							
						}
						if($produto[0]['catJardinagem']==1){
							array_push($categorias, "Jardinagem");							
						}
						if($produto[0]['catLimpeza']==1){
							array_push($categorias, "Limpeza");							
						}
						if($produto[0]['catEscritorio']==1){
							array_push($categorias, "Escritorio");							
						}
						if($produto[0]['catMecanica']==1){
							array_push($categorias, "Mecanica");							
						}						
						if($produto[0]['catOutros']==1){
							array_push($categorias, "Outros");							
						}
																		
						foreach ($categorias as $lista){
							echo "$lista&nbsp;&nbsp;  ";
						}						
										
					?>
					</span></p>
				</div>	
				</div>			
									
			<?php						
				} // else num_rows == 0
			} // is_numeric				
			?>							
		</section>
        <?php include "includes/mais_vendidos.php"; ?>
	</div>
	<!-- fim area central -->
	<?php include "includes/rodape.php"; ?>
