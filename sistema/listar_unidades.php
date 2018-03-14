<?php
include_once '../controle/auto_load.class.php';
new auto_load();
$funcoes = new funcoes();
$funcoes->charset();
header("Content-Type: text/html; charset=UTF-8",true);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>Unidades Disponíveis</title>
    <!-- Required meta tags -->
	 <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<script src="../js/script.js"></script>
  
  </head>
  <body>
<div class="container-fluid">
	<!-- Cabeçalho -->
	<nav class="navbar navbar-dark bg-dark">			

		<h2 class="text-white">SAEG - Sistema de Apoio às Atividades Extras -  GEOPE SE/BSB</h2>
	  
	</nav>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Cadastrar</th>
      <th scope="col">Unidade</th>
      <th scope="col">Trabalho</th>
      <th scope="col">Endereço</th>
	  <th scope="col">Gerente</th>
	  <th scope="col">Tel Gerente</th>
	  <th scope="col">Tel Centro</th>
    </tr>
  </thead>
  
   <tbody>


	<?php 
	$unid = new unidades();
	$listar = $unid->consultarUnidades(); 
	
	?>


	</tbody>
	</table>
	</div>


</body>
</html>