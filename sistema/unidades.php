<?php
include_once '../controle/auto_load.class.php';
new auto_load();
header("Content-Type: text/html; charset=UTF-8",true);

$acao = "";
//verifica passagem de ac�o
if(isset($_GET['acao'])){

	$acao = $_GET['acao'];
	$nome = "";
	$tipo_trabalho = "";
	$endereco = "";
	$tel_gerente = "";
	$tel_centro = "";
	
	
	
	if($acao == "cadastrar"){
		$unidades = new unidades();
		
		if(isset($_GET['nome'])){
			$unidades->setNome($_GET['nome']);
		}		
		if(isset($_GET['tipo_trabalho'])){
			$unidades->setTrabalho($_GET['tipo_trabalho']);
		}
		if(isset($_GET['endereco'])){
			$unidades->setEndereco($_GET['endereco']);
		}
		if(isset($_GET['gerente'])){
			$unidades->setGerente($_GET['gerente']);
		}
		if(isset($_GET['tel_gerente'])){
			$unidades->setTelGerente($_GET['tel_gerente']);
		}
		if(isset($_GET['tel_centro'])){
			$unidades->setTelCentro($_GET['tel_centro']);
		}
	
		$cadastrar = $unidades->cadastrarUnidades();
		if($cadastrar){
			echo "CADASTRADO COM SUCESSO";
		}else{
			echo "ERRO";
		}
	}
	
	
	
	
//se n�o houver parametro unidade apresenta erro
}else{

	return false;

}




?>