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
    <title>Cadastrar Plantão</title>
    <!-- Required meta tags -->
     <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  
  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<script src="js/script.js"></script>
  
  </head>
  <body>
  
	<!-- Cabeçalho -->
			<nav class="navbar navbar-dark bg-dark">			

				<h2 class="text-white">SAEG - Sistema de Apoio às Atividades Extras -  GEOPE SE/BSB</h2>
			  
			</nav>
			
			
	<div class="container-fluid">
	
		<div class="row">
			<div class="col">
			<form method="get" action="plantao.php">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<label class="input-group-text" for="tipo_trabalho">Unidade e Tipo de Trabalho</label>
				  </div>
				  <select class="custom-select" id="id_unidade" name="id_unidade">
				<option value="0" selected>Escolha a Unidade</option>
				
			<?php
				$plantao = new plantao();
				$plantao->listarUnidadesPlantao();
				
			?> 
			  </select>
			</div>
			</div>
		</div>
		
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="data_inicio">Data Inicial:</label>
			<input type="text" name="data_inicio" class="form-control" id="data_inicio" placeholder="Data do Início do Turno">
		  </div>
		  </div>
		  
		  
		  <div class="col">
		  <div class="form-group">
			<label for="hora_inicio">Hora de Início:</label>
			<select class="form-control" id="hora_inicio" name="hora_inicio">
			  <option value="NULL" selected>Selecione um horário</option>
			  <option value="0">00:00</option>
			  <option value="1">01:00</option>
			  <option value="2">02:00</option>
			  <option value="3">03:00</option>
			  <option value="4">04:00</option>
			  <option value="5">05:00</option>
			  <option value="6">06:00</option>
			  <option value="7">07:00</option>
			  <option value="8">08:00</option>
			  <option value="9">09:00</option>
			  <option value="10">10:00</option>
			  <option value="11">11:00</option>
			  <option value="12">12:00</option>
			  <option value="13">13:00</option>
			  <option value="14">14:00</option>
			  <option value="15">15:00</option>
			  <option value="16">16:00</option>
			  <option value="17">17:00</option>
			  <option value="18">18:00</option>
			  <option value="19">19:00</option>
			  <option value="20">20:00</option>
			  <option value="21">21:00</option>
			  <option value="22">22:00</option>
			  <option value="23">23:00</option>
			</select>
		  </div>
		  </div>
		  </div>
		  
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="data_final">Data Final:</label>
			<input type="text" name="data_final" class="form-control" id="data_final" placeholder="Data do Final do Turno">
		  </div>
		  </div>
		  
		  <div class="col">
		  <div class="form-group">
			<label for="hora_final">Hora do Término:</label>
			<select class="form-control" id="hora_final" name="hora_final">
			  <option value="NULL" selected>Selecione um horário</option>
			  <option value="0">00:00</option>
			  <option value="1">01:00</option>
			  <option value="2">02:00</option>
			  <option value="3">03:00</option>
			  <option value="4">04:00</option>
			  <option value="5">05:00</option>
			  <option value="6">06:00</option>
			  <option value="7">07:00</option>
			  <option value="8">08:00</option>
			  <option value="9">09:00</option>
			  <option value="10">10:00</option>
			  <option value="11">11:00</option>
			  <option value="12">12:00</option>
			  <option value="13">13:00</option>
			  <option value="14">14:00</option>
			  <option value="15">15:00</option>
			  <option value="16">16:00</option>
			  <option value="17">17:00</option>
			  <option value="18">18:00</option>
			  <option value="19">19:00</option>
			  <option value="20">20:00</option>
			  <option value="21">21:00</option>
			  <option value="22">22:00</option>
			  <option value="23">23:00</option>
			</select>
		  </div>
		  </div>
		  </div>
		  
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="vagas">Quantidade de Vagas</label>
			<input type="text" name="vagas" class="form-control" id="vagas" placeholder="Quantidade de Vagas">
		  </div>
		  </div>
		  </div>
		  <div class="row">
		  <div class="col">
		  <input type="hidden" name="acao" value="cadastrar">
		  <button id="btn_cadastrar_plantao" type="submit" class="btn btn-primary">Cadastrar</button>
		  </div>
		  <div class="col">
		  <button id="btn_reset" type="reset" class="btn btn-warning">Limpar</button>
		  </div>
		  </div>
		  
		</form>
		
	</div>
			
			
			
			
</body>
</html>