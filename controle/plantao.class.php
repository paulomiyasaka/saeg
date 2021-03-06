﻿<?php
include_once 'auto_load.class.php';
new auto_load();
header("Content-Type: text/html; charset=UTF-8",true);

class plantao extends acao{

	protected $id_unidade, $nome_unidade, $data_inicio, $data_final, $hora_inicio, $hora_final, $vagas, $tipo_trabalho, $motorista;
	
	public function setIdUnidade($valor){
		$this->id_unidade = $valor;		
	}	
	public function getIdUnidade(){
		return $this->id_unidade;		
	}
	
	public function setNomeUnidade($valor){
		$this->nome_unidade = $valor;		
	}	
	public function getNomeUnidade(){
		return $this->nome_unidade;		
	}
	
	public function setDataInicio($valor){
		$this->data_inicio = $valor;		
	}	
	public function getDataInicio(){
		return $this->data_inicio;		
	}
	
	public function setDataFinal($valor){
		$this->data_final = $valor;
		
	}	
	public function getDataFinal(){
		return $this->data_final;		
	}
	
	public function setHoraInicio($valor){
		$this->hora_inicio = $valor;		
	}	
	public function getHoraInicio(){
		return $this->hora_inicio;		
	}
	
	public function setHoraFinal($valor){
		$this->hora_final = $valor;		
	}	
	public function getHoraFinal(){
		return $this->hora_final;		
	}
	
	public function setVagas($valor){
		$this->vagas = $valor;
	}
	
	public function getVagas(){
		return $this->vagas;
	}

	public function setMotorista($valor){
		$this->motorista = $valor;
	}
	
	public function getMotorista(){
		return $this->motorista;
	}
	
	public function setTipoTrabalho($valor){
		$this->tipo_trabalho = $valor;
	}
	
	public function getTipoTrabalho(){
		return $this->tipo_trabalho;
	}
	
	//listar unidades disponíveis para cadastrar plantão
	public function listarUnidadesPlantao(){
		
		$unidades = acao::consultarUnidadesPlantao();		
		$quant = count($unidades);
		$i = 0;
		
		foreach($unidades as $row){
			echo "<option value=\"$row->id_unidade\" selected>".$row->nome." - ".$row->trabalho."</option>";
		}
			
	
	}//listar unidades para o plantão
	
	
	
	//cadastrar plantão
	public function cadastrarPlantao(){
		
		$funcoes = new funcoes();
		
		$id_unidade = (int) $this->getIdUnidade();
		$data_inicio = $this->getDataInicio();
		$hora_inicio = $this->getHoraInicio();
		
		$dataInicioConverter = $funcoes->converterData($data_inicio);
		$horaInicioConverter = $funcoes->converterHora($hora_inicio);
		$turno_inicio = $dataInicioConverter ." ". $horaInicioConverter;
		$turno_inicio = date("Y-m-d H:i:s", strtotime($turno_inicio));
		
		$data_final = $this->getDataFinal();
		$hora_final = $this->getHoraFinal();
		
		$dataFinalConverter = $funcoes->converterData($data_final);
		$horaFinalConverter = $funcoes->converterHora($hora_final);
		$turno_final = $dataFinalConverter ." ". $horaFinalConverter;
		$turno_final = date("Y-m-d H:i:s", strtotime($turno_final));
		
		$vagas = (int) $this->getVagas();		
				
		$sql = "INSERT INTO plantao (id_unidade, turno_inicio, turno_final, vagas) VALUES (:id_unidade, :turno_inicio, :turno_final, :vagas)";
		$dados = array(':id_unidade' => $id_unidade, ':turno_inicio' => $turno_inicio, ':turno_final' => $turno_final, ':vagas' => $vagas);
		
		$cadastrar = acao::cadastrar($sql, $dados);
		if($cadastrar){
			return $cadastrar;
		}else{
			return false;
		}
	
	}//cadastrar plantão


	//gerar horários para o plantão
	public function gerarHorario(){

		echo "<option value='NULL' selected>Selecione um horário</option>";

		for($i = 0; $i <= 23; $i++){
			if($i < 10){
				echo "<option value='$i'>0".$i.":00</option>";
			}else{
				echo "<option value='$i'>".$i.":00</option>";
			}
			
		}

	

	}//gerar horario


	//listar plantões disponíveis
	public function listarPlantao(){

		
		$sql = "SELECT p.*, u.* FROM plantao as p INNER JOIN unidades as u ON p.id_unidade = u.id_unidade AND p.turno_final > now()";
		$dados = array();
		$query = conecta::executarSQL($sql, $dados);
		$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		$quant = $query->rowCount();

		if($quant > 0){				
			$i = 0;
			//while($i < $quant){

			foreach ($resultado as $row) {			

			echo "<div class=\"col-4 text-center\" style=\"margin-top: 15px; margin-bottom: 15px;\">
			<div class=\"card\">
			  <div class=\"card-body border border-dark\">
			  	<div class=\"alert alert-secondary\" role=\"alert\">
			    <h3 class=\"card-title\">".$row->nome." - ".$row->trabalho."</h3>
			    <h4 class=\"card-subtitle mb-2 text-muted\">".$row->endereco."</h4>
				</div>
			    <hr>";

			    $funcoes = new funcoes();
			    $data = $funcoes->montarDataPlantao($row->turno_inicio, $row->turno_final);
			    $id_plantao = $row->id_plantao;

			echo "<h4 class=\"card-text text-center\">".$data."</h4>
			<hr>
			    <h5 class=\"card-text text-left\">Gerente: ".$row->gerente."</h5>
			    <h5 class=\"card-text text-left\">Telefone: ".$row->tel_gerente."</h5>
			    <h5 class=\"card-text text-left\">Telefone: ".$row->tel_centro."</h5>
			    <hr>
			    <a href=\"#\" class=\"btn btn-primary card-link text-center\">Inscrever-se</a>
			    <button type=\"button\" class=\"btn btn-secundary card-link\">Vagas Disponíveis: <span class=\"badge badge-light\">". $this->contarVagas($id_plantao) ."</span></button>
			  </div>
			</div>
			</div>";

			$i++;
			
			//}

			}


		}else{
			echo "<div class=\"col-10 align-self-center\"><div class=\"pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center\"><h1 class=\"display-4\">Não Há Plantões Ativos</h1></div></div>";

		}
	}//listar plantao



	//contar vagas disponíveis
	public function contarVagas($id_plantao){
		/*
		$sql = "SELECT p.*, u.* FROM plantao as p INNER JOIN unidades as u ON p.id_unidade = u.id_unidade AND p.turno_final > now()";
		$dados = array();
		$query = conecta::executarSQL($sql, $dados);
		$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		$quant = $query->rowCount();
		*/
		echo "FALTA MONTAR TABELA DE CADASTRADOS PARA CONTAR VAGAS DISPONÍVEIS.";

	}

	//botao cadastrar - deve ser apresentado somente para os administradores do sistema
	public function botaoCadastrarPlantao(){

		echo "<div class=\"row justify-content-md-center\">
				<div class=\"col-10 text-center\">
					<h4>Clique no botão abaixo para cadastrar um novo plantão.</h4><br>
					<button type=\"button\" class=\"btn btn-outline-warning border-warning\" data-toggle=\"modal\" data-target=\"#modalPlantao\">Cadastrar Plantão</button>

				</div>
			</div>";
	}
	
	
	




}


?>

