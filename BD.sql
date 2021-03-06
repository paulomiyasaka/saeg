/* SQL PARA CRIAR BANCO DE DADOS */

/* CRIA O BANCO DE DADOS */
CREATE DATABASE saegnew;



/* CRIA A TABELA UNIDADES */
CREATE TABLE saegnew.unidades ( 
	id_unidade INT NOT NULL AUTO_INCREMENT , 
	nome VARCHAR(50) NOT NULL , 
	trabalho VARCHAR(50) NOT NULL , 
	endereco VARCHAR(100) NOT NULL , 
	gerente VARCHAR(150) NOT NULL , 
	matricula VARCHAR(8) NOT NULL , 
	tel_gerente VARCHAR(9) NOT NULL , 
	tel_centro VARCHAR(9) NOT NULL , 
	status BOOLEAN NOT NULL DEFAULT 1,
	PRIMARY KEY (id_unidade),
	UNIQUE (nome)) 
	ENGINE = InnoDB;



/* CRIA A TABELA PLANTAO */
CREATE TABLE saegnew.plantao ( 
	id_plantao INT NOT NULL AUTO_INCREMENT , 
	id_unidade INT NOT NULL , 
	turno_inicio DATETIME NOT NULL , 
	turno_final DATETIME NOT NULL , 
	vagas INT(4) NOT NULL ,
	motorista BOOLEAN NOT NULL DEFAULT 0,
	status BOOLEAN NOT NULL DEFAULT 1 , 
	PRIMARY KEY (id_plantao), 
	CONSTRAINT fk_id_unidade FOREIGN KEY (id_unidade) REFERENCES unidades(id_unidade))
	ENGINE = InnoDB;



/* CRIA A TABELA COLABORADORES */
CREATE TABLE saegnew.colaboradores ( 
	id_colaborador INT NOT NULL AUTO_INCREMENT , 
	nome VARCHAR(150) NOT NULL , 
	matricula VARCHAR(8) NOT NULL , 
	funcao VARCHAR(50) NULL,
	lotacao VARCHAR(50) NOT NULL , 
	telefone VARCHAR(9) NULL ,
	senha VARCHAR(32) NULL,
	status BOOLEAN NOT NULL DEFAULT 1 , 
	PRIMARY KEY (id_colaborador),
	UNIQUE (matricula)) 
	ENGINE = InnoDB;


/* CRIA A TABELA CADASTRADOS */
CREATE TABLE saegnew.cadastrados (
		id_cadastrado INT NOT NULL AUTO_INCREMENT,
		id_colaboradores INT NOT NULL,
		id_plantao INT NOT NULL,
		motorista BOOLEAN NOT NULL DEFAULT 0,
		presenca BOOLEAN NOT NULL DEFAULT 0,		
		status BOOLEAN NOT NULL DEFAULT 1,
		PRIMARY KEY (id_cadastrados),
		CONSTRAINT fk_id_colaborador FOREIGN KEY (id_colaborador) REFERENCES colaboradores(id_colaborador),
		CONSTRAINT fk_id_plantao FOREIGN KEY (id_plantao) REFERENCES plantao(id_plantao))
ENGINE = InnoDB;