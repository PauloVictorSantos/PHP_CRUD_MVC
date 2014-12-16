<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Controller/Sistema.php');

?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Listar Usuários</title>
		<meta name="description" content="">
		<meta name="author" content="Paulo Victor">
		<link type="text/css" rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/css/style.css" />
		<link type="text/css" rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/css/bootstrap.min.css" />
		<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/js/jquery.js"></script>
		<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/js/bootstrap.min.js"></script>
		<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/js/jquery.validate.js"></script>
		<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/js/valida.js"></script>
		<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/js/bootstrap.min.js"></script>
		<script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/PHP_sist/View/js/jquery.maskedinput.js"></script>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>
	<body>
		<div class="barra">
		<div class="navbar">
		  <div class="navbar-inner">
		    <a class="brand" href="#">Sistema de Cadastro de Usuários e Produtos</a>
		    <ul class="nav">
		      <li><a href="index.php?mostrar=usuario">Usuário</a></li>
		      <li><a href="index.php?mostrar=produto">Produto</a></li>
		    </ul>
		  </div>
		</div>
		</div>
	</body>
</html>