<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/PHP_sist/Controller/Sistema.php');
	$sistema= new Sistema();
	$sistema->SistemaAll();
?>
