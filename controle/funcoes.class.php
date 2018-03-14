<?php
include_once 'auto_load.class.php';
new auto_load();

class funcoes extends conecta{

	//retorna a string somente com números, remove os demais caracteres
	public function somenteNumero($numero){
		$numero = preg_replace( '/[^0-9]/', '', $numero );
		$numero = trim($numero);
	    return (int)$numero;
	}

	//EXIBIR ERROS NA TELA
	public function mostrarErros(){
		ini_set('display_errors',1);
		ini_set('display_startup_erros',1);
		error_reporting(E_ALL);
	}

	public function charset(){
		header("Content-type: application/json");
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: text/html; charset=UTF-8",true);
		header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
	}
	
	//criptografa senha
	public function criptografar($senha){
		$valor = md5($senha);
		$this->setVariavel('senha', $valor);
	}

	//valida e-mail
	public function validarEmail($email){
		if($email = filter_var($email, FILTER_VALIDATE_EMAIL)){
			return $email;
		}else{
			return false;
		}

	}
	
	//converter string em data
	public function converterData($_date = null) {
		$format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
		if ($_date != null && preg_match($format, $_date, $partes)) {
			return $partes[3].'-'.$partes[2].'-'.$partes[1];
		}
		return false;
	}
	
	
	//converter hora para timestamp
	public function converterHora($hora = null){
		if($hora != null){
			$hora_inicio = $hora;
			$hora_inicio .= ":00";
			$hora_inicio = date("H:i:s", strtotime($hora_inicio));
			return $hora_inicio;
		}else{
			return false;
		}
		
	
	}



}//class funções

?>