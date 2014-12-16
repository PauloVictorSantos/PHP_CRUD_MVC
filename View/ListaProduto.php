<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Controller/Produto.php'); 

?>
<div class="altura">	
	<div class="user">
		<h1>Listando todos os produtos</h1>
	</div>
		<div class="center">
			<div class="novo">
				<a href="index.php?mostrar=produto&opcaop=novo">
					<button class="btn btn-large btn-primary" type="button">Adicionar novo produto <i class="icon-plus"></i></button>
				</a>
			</div>
			<?php include 'View/BuscaProduto.php'; ?>
			<ul class="titulo ">
				<li class="prod">Produto</li>
				<li class="clean">Quantidade</li>
				<li class="clean">Valor</li>
				<li class="clean">Valor total</li>
				<li class="lar">Ações dos dados</li>
			</ul>
			
			<?php
			
			 $produto =new Controler_Produto();
			 $produtos=$produto->TodosProdutos();
			 $total=count($produtos);
			
			 for ($i = 0; $i < $total; $i++): ?>
			 <ul class="item item-pro">
			 	
		 <li class="prod"><?php echo $produtos[$i]->getNome();?></li>
		 <li class="clean"><?php echo $produtos[$i]->getQtd();?></li>
		 <li class="clean"><?php echo str_replace('.',',',$produtos[$i]->getValor());?></li>
		 <li class="clean"><?php echo str_replace('.',',',$produtos[$i]->getResultado());?></li>
		 <li class="wid"><a class="btn btn-small" href="index.php?mostrar=produto&opcaop=excluir&idp=<?php echo $produtos[$i]->getid(); ?>"><i class="icon-trash"></i></a></li>
		 <li class="wid"><a class="btn btn-small" href="index.php?mostrar=produto&opcaop=editar&idp=<?php echo $produtos[$i]->getid(); ?>"><i class=" icon-edit"></i></a></li>
         </ul>
            <?php endfor; ?>
           <?php 
            	$QuanTotal= new Controler_Produto();
				echo "<span class='span'>"."Quantidade total de produto(s) listado(s): ";
				$QuanTotal->QuanTotal();
				echo "</span>";
            ?>
          </div>
          
     </div>
          <footer>
           	<p>Desenvolvido por Paulo Victor &copy; <?php echo date('Y');?></p>
           </footer>		