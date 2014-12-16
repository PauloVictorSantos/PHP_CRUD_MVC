<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Controller/Usuario.php'); 

?>
<div class="altura">
<div class="user">
		<h1>Listando todos os Usuarios</h1>
	</div>
		<div class="center">
			
			<a href="index.php?mostrar=usuario&opcao=novo">
				<button class="btn btn-large btn-primary" type="button">Adicionar novo usuario <i class="icon-plus"></i></button>
			</a>
			<ul class="titulo ">
				<li class="space">Nome</li>
				<li class="email">Email</li>
				<li>Senha</li>
				<li>Data de nascimento</li>
				<li class="widh">Ações dos dados</li>
			</ul>
			
			<?php
			 $usuario =new Controle_usuario();
			 $usuarios=$usuario->TodosUsuario();
			 $total=count($usuarios);
			
			 for ($i = 0; $i < $total; $i++): ?>
			 <ul class="item ">
			 	
		 <li class="space"><?php echo $usuarios[$i]->getNome();?></li>
		 <li class="email"><?php echo $usuarios[$i]->getEmail();?></li>
		 <li><?php echo $usuarios[$i]->getSenha();?></li>
		 <li><?php echo date('d/m/Y',strtotime($usuarios[$i]->getData()));?></li>
		 <li class="wid"><a class="btn btn-small" href="index.php?mostrar=usuario&opcao=excluir&idu=<?php echo $usuarios[$i]->getid(); ?>"><i class="icon-trash"></i></a></li>
		 <li class="wid"><a class="btn btn-small" href="index.php?mostrar=usuario&opcao=editar&idu=<?php echo $usuarios[$i]->getid(); ?>"><i class=" icon-edit"></i></a></li>
         </ul>
            <?php endfor; ?>
          </div>
          </div>
          <footer>
           	<p>Desenvolvido por Paulo Victor &copy; <?php echo date('Y');?></p>
          </footer>