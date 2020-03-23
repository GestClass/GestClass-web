CREATE DATABASE GestClass
DEFAULT CHARSET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE GestClass;

CREATE TABLE tipo_turma (
	ID_tipo_turma INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_tipo_turma VARCHAR(30) NOT NULL
);

CREATE TABLE tipo_usuario(
	ID_tipo_usuario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE disciplina(
	ID_disciplina INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_disciplina VARCHAR(50) NOT NULL
);

CREATE TABLE turma (
	ID_turma INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_turma VARCHAR(50)
);

CREATE TABLE escola (
	ID_escola INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_escola VARCHAR(70) NOT NULL,
	cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    CNPJ VARCHAR(18) NOT NULL UNIQUE,
    telefone VARCHAR(13) NOT NULL,
    email VARCHAR(65) NOT NULL UNIQUE,
    quantidade_alunos INTEGER,
	data_pagamento_escola DATE NOT NULL,
    turma_bercario BOOLEAN, 
    turma_pre_escola BOOLEAN,
    turma_fundamental_I BOOLEAN,
    turma_fundamental_II BOOLEAN,
    turma_medio BOOLEAN 
);

CREATE TABLE professor (
	ID_professor INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nome_professor VARCHAR (50) NOT NULL,
    foto VARCHAR(255),
	cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    rg VARCHAR(15) NOT NULL UNIQUE,
    cpf VARCHAR(14) NOT NULL UNIQUE,
	email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    celular VARCHAR(14) NOT NULL,
    telefone VARCHAR(13),
    fk_id_aulas_professor INTEGER,
    fk_id_tipo_usuario_professor INTEGER NOT NULL,
    fk_id_escola_professor INTEGER NOT NULL
);

CREATE TABLE aulas_professor (
	ID_dados_professor INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
    fk_id_professor_aulas_professor INTEGER NOT NULL,
    fk_id_disciplina_professor_aulas_professor INTEGER, 
    fk_id_turma_professor_aulas_professor INTEGER
);

CREATE TABLE diretor (
	ID_diretor INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nome_diretor VARCHAR (50) NOT NULL,
    foto VARCHAR(255),
	cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    rg VARCHAR(15) NOT NULL UNIQUE,
    cpf VARCHAR(14) NOT NULL UNIQUE,
	email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    celular VARCHAR(14) NOT NULL,
    telefone VARCHAR(13),
    fk_id_tipo_usuario_diretor INTEGER NOT NULL,
    fk_id_escola_diretor INTEGER NOT NULL
);

CREATE TABLE secretario (
	ID_secretario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nome_secretario VARCHAR (50) NOT NULL,
    foto VARCHAR(255),
	cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    rg VARCHAR(15) NOT NULL UNIQUE,
    cpf VARCHAR(14) NOT NULL UNIQUE,
	email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    celular VARCHAR(14) NOT NULL,
    telefone VARCHAR(13),
    fk_id_tipo_usuario_secretario INTEGER NOT NULL,
    fk_id_escola_secretario INTEGER NOT NULL
);

CREATE TABLE aluno (
	RA INTEGER PRIMARY KEY UNIQUE,    
    nome_aluno VARCHAR (70) NOT NULL,
    foto VARCHAR(255),
	cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    RG VARCHAR (12) NOT NULL UNIQUE,
    cpf VARCHAR (14) NOT NULL UNIQUE,  
    email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    celular VARCHAR(14) NOT NULL,
    telefone VARCHAR(13),
    data_nascimento DATE NOT NULL,
    fk_id_turma_aluno INTEGER,
    fk_id_responsavel_aluno INTEGER,
    fk_id_dados_aluno INTEGER UNIQUE,
    fk_id_tipo_usuario_aluno INTEGER NOT NULL,
    fk_id_escola_aluno INTEGER NOT NULL
);

CREATE TABLE responsavel (
	ID_responsavel INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_responsavel VARCHAR (70) NOT NULL,
	foto VARCHAR(255),
    cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    RG VARCHAR (12) NOT NULL UNIQUE,
    cpf VARCHAR (14) NOT NULL UNIQUE, 
    email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    pin INTEGER(6) NOT NULL,
    celular VARCHAR(14) NOT NULL,
    telefone VARCHAR(13),
    telefone_comercial VARCHAR(13),
    data_nascimento DATE NOT NULL,
	data_pagamento_responsavel DATE NOT NULL,
    fk_ra_aluno_responsavel INTEGER NOT NULL,
    fk_id_tipo_usuario_responsavel INTEGER NOT NULL,
    fk_id_escola_responsavel INTEGER NOT NULL
);

CREATE TABLE dados_aluno (
	ID_dados_aluno INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nota DECIMAL (4,2) NOT NULL,
	presenca BOOLEAN,
	observacoes VARCHAR (255) ,
	fk_ra_aluno_dados_aluno INTEGER NOT NULL,
	fk_id_disciplina_dados_aluno INTEGER NOT NULL
);


CREATE TABLE contato (
	ID_mensagem INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    mensagem TEXT NOT NULL,
    fk_envio_aluno_ra_aluno INTEGER,
    fk_envio_responsavel_id_responsavel INTEGER,
    fk_envio_professor_id_professor INTEGER,
    fk_envio_diretor_id_diretor INTEGER,
    fk_envio_secretario_id_secretario INTEGER,
	fk_recebimento_aluno_ra_aluno INTEGER,
    fk_recebimento_responsavel_id_responsavel INTEGER,
	fk_recebimento_professor_id_professor INTEGER,
    fk_recebimento_diretor_id_diretor INTEGER,
    fk_recebimento_secretario_id_secretario INTEGER
);

CREATE TABLE `admin` (
	ID_admin INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
    nome VARCHAR(50) NOT NULL,
    foto VARCHAR(255),
    email VARCHAR(65) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    data_nascimento DATE NOT NULL,
    fk_id_tipo_usuario_admin INTEGER NOT NULL
);

CREATE TABLE `events` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) CHARACTER SET utf8 NOT NULL,
  `color` VARCHAR(10) CHARACTER SET utf8 NOT NULL,
  `start` DATETIME NOT NULL,
  `end` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


/*	-	FOREIGN KEYs TABLE PROFESSOR	-	*/

ALTER TABLE professor ADD CONSTRAINT fk_id_tipo_usuario_professor FOREIGN KEY (fk_id_tipo_usuario_professor) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE professor ADD CONSTRAINT fk_id_escola_professor FOREIGN KEY (fk_id_escola_professor) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE AULAS_PROFESSOR	-	*/

ALTER TABLE aulas_professor ADD CONSTRAINT fk_id_professor_aulas_professor FOREIGN KEY (fk_id_professor_aulas_professor) REFERENCES professor (ID_professor);
ALTER TABLE aulas_professor ADD CONSTRAINT fk_id_disciplina_professor_aulas_professor FOREIGN KEY (fk_id_disciplina_professor_aulas_professor) REFERENCES disciplina (ID_disciplina);
ALTER TABLE aulas_professor ADD CONSTRAINT fk_id_turma_professor_aulas_professor FOREIGN KEY (fk_id_turma_professor_aulas_professor) REFERENCES turma (ID_turma);


/*	-	FOREIGN KEYs TABLE DIRETOR	-	*/

ALTER TABLE diretor ADD CONSTRAINT fk_id_tipo_usuario_diretor FOREIGN KEY (fk_id_tipo_usuario_diretor) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE diretor ADD CONSTRAINT fk_id_escola_diretor FOREIGN KEY (fk_id_escola_diretor) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE SECRETARIO	-	*/

ALTER TABLE secretario ADD CONSTRAINT fk_id_tipo_usuario_secretario FOREIGN KEY (fk_id_tipo_usuario_secretario) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE secretario ADD CONSTRAINT fk_id_escola_secretario FOREIGN KEY (fk_id_escola_secretario) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE ALUNO	-	*/

ALTER TABLE aluno ADD CONSTRAINT fk_id_turma_aluno FOREIGN KEY (fk_id_turma_aluno) REFERENCES turma (ID_turma);
ALTER TABLE aluno ADD CONSTRAINT fk_id_responsavel_aluno FOREIGN KEY (fk_id_responsavel_aluno) REFERENCES responsavel (ID_responsavel);
ALTER TABLE aluno ADD CONSTRAINT fk_id_dados_aluno FOREIGN KEY (fk_id_dados_aluno) REFERENCES dados_aluno (ID_dados_aluno);
ALTER TABLE aluno ADD CONSTRAINT fk_id_tipo_usuario_aluno FOREIGN KEY (fk_id_tipo_usuario_aluno) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE aluno ADD CONSTRAINT fk_id_escola_aluno FOREIGN KEY (fk_id_escola_aluno) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE RESPONSAVEL	-	*/

ALTER TABLE responsavel ADD CONSTRAINT fk_ra_aluno_responsavel FOREIGN KEY (fk_ra_aluno_responsavel) REFERENCES aluno (RA);
ALTER TABLE responsavel ADD CONSTRAINT fk_id_tipo_usuario_responsavel FOREIGN KEY (fk_id_tipo_usuario_responsavel) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE responsavel ADD CONSTRAINT fk_id_escola_responsavel FOREIGN KEY (fk_id_escola_responsavel) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE DADOS_ALUNO	-	*/

ALTER TABLE dados_aluno ADD CONSTRAINT fk_ra_aluno_dados_aluno FOREIGN KEY (fk_ra_aluno_dados_aluno) REFERENCES aluno (RA);
ALTER TABLE dados_aluno ADD CONSTRAINT fk_id_disciplina_dados_aluno FOREIGN KEY (fk_id_disciplina_dados_aluno) REFERENCES disciplina (ID_disciplina);


/*	-	FOREIGN KEYs TABLE CONTATO	-	*/

ALTER TABLE contato ADD CONSTRAINT fk_envio_aluno_ra_aluno FOREIGN KEY (fk_envio_aluno_ra_aluno) REFERENCES aluno (RA);
ALTER TABLE contato ADD CONSTRAINT fk_envio_responsavel_id_responsavel FOREIGN KEY (fk_envio_responsavel_id_responsavel) REFERENCES responsavel (ID_responsavel);
ALTER TABLE contato ADD CONSTRAINT fk_envio_professor_id_professor FOREIGN KEY (fk_envio_professor_id_professor) REFERENCES professor (ID_professor);
ALTER TABLE contato ADD CONSTRAINT fk_envio_diretor_id_diretor FOREIGN KEY (fk_envio_diretor_id_diretor) REFERENCES diretor (ID_diretor);
ALTER TABLE contato ADD CONSTRAINT fk_envio_secretario_id_secretario FOREIGN KEY (fk_envio_secretario_id_secretario) REFERENCES secretario (ID_secretario);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_aluno_ra_aluno FOREIGN KEY (fk_recebimento_aluno_ra_aluno) REFERENCES aluno (RA);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_responsavel_id_responsavel FOREIGN KEY (fk_recebimento_responsavel_id_responsavel) REFERENCES responsavel (ID_responsavel);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_professor_id_professor FOREIGN KEY (fk_recebimento_professor_id_professor) REFERENCES professor (ID_professor);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_diretor_id_diretor FOREIGN KEY (fk_recebimento_diretor_id_diretor) REFERENCES diretor (ID_diretor);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_secretario_id_secretario FOREIGN KEY (fk_recebimento_secretario_id_secretario) REFERENCES secretario (ID_secretario);


/*	-	FOREIGN KEYs TABLE ADMIN	-	*/

ALTER TABLE `admin` ADD CONSTRAINT fk_id_tipo_usuario_admin FOREIGN KEY (fk_id_tipo_usuario_admin) REFERENCES tipo_usuario (ID_tipo_usuario);


/*	-	INSERTS INTO TABLE TIPO_TURMA 	-	*/
    
INSERT INTO tipo_turma (nome_tipo_turma) VALUES ('berçario');
INSERT INTO tipo_turma (nome_tipo_turma) VALUES ('pre-escola');
INSERT INTO tipo_turma (nome_tipo_turma) VALUES ('ensino fundamental I');
INSERT INTO tipo_turma (nome_tipo_turma) VALUES ('ensino fundamental II');
INSERT INTO tipo_turma (nome_tipo_turma) VALUES ('ensino medio');


/*	-	INSERTS INTO TABLE TURMA 	-	*/

INSERT INTO turma (nome_turma) VALUES ('berçario A');
INSERT INTO turma (nome_turma) VALUES ('pre 1 A');
INSERT INTO turma (nome_turma) VALUES ('pre 2 A');
INSERT INTO turma (nome_turma) VALUES ('1º ano A');
INSERT INTO turma (nome_turma) VALUES ('2º ano A');
INSERT INTO turma (nome_turma) VALUES ('3º ano A');
INSERT INTO turma (nome_turma) VALUES ('3º ano A');
INSERT INTO turma (nome_turma) VALUES ('4º ano A');
INSERT INTO turma (nome_turma) VALUES ('5º ano A');
INSERT INTO turma (nome_turma) VALUES ('6º ano A');
INSERT INTO turma (nome_turma) VALUES ('7º ano A');
INSERT INTO turma (nome_turma) VALUES ('8º ano A');
INSERT INTO turma (nome_turma) VALUES ('9º ano A');
INSERT INTO turma (nome_turma) VALUES ('1º ano medio A');
INSERT INTO turma (nome_turma) VALUES ('2º ano medio A');
INSERT INTO turma (nome_turma) VALUES ('3º ano medio A');


/*	-	INSERTS INTO TABLE TIPO_USUARIO 	-	*/

INSERT INTO tipo_usuario (nome_usuario) VALUES ('admin');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('diretor');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('secretaria');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('professor');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('aluno');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('responsavel');

/*	-	INSERTS INTO TABLE DISCIPLINA 	-	*/

INSERT INTO disciplina (nome_disciplina) VALUES ('portugês');
INSERT INTO disciplina (nome_disciplina) VALUES ('matemática');
INSERT INTO disciplina (nome_disciplina) VALUES ('ingês');
INSERT INTO disciplina (nome_disciplina) VALUES ('geografia');
INSERT INTO disciplina (nome_disciplina) VALUES ('história');
INSERT INTO disciplina (nome_disciplina) VALUES ('biologia');


/*	-	INSERTS INTO TABLE ESCOLA	-	*/

INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, data_pagamento_escola, quantidade_alunos, turma_bercario, turma_pre_escola, turma_fundamental_I, turma_fundamental_II, turma_medio) VALUES ('escola_exemplo', '000.00-000', 000, 'predio a', '00.000.000/0000-00', '(11)0000-0000', 'escola_exemplo@exemplo.com', '2020-03-22', 500, true, true, true, true, true);


/*	-	INSERTS INTO TABLE PROFESSOR	-	*/

INSERT INTO professor (nome_professor, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_professor, fk_id_escola_professor) VALUES ('professor_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'professor_exemplo@exemplo.com', '1234', '(11)00000-0000', '(11)0000-0000', 4, 1);

              
/*	-	INSERTS INTO TABLE AULAS_PROFESSOR	-	*/
              
INSERT INTO aulas_professor (fk_id_professor_aulas_professor, fk_id_disciplina_professor_aulas_professor, fk_id_turma_professor_aulas_professor) VALUES (1, 6, 16);
              
              
/*	-	INSERTS INTO TABLE DIRETOR	-	*/
              
INSERT INTO diretor (nome_diretor, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_diretor, fk_id_escola_diretor) VALUES ('diretor_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'diretor_exemplo@exemplo.com', '1234', '(11)00000-0000', '(11)0000-0000', 2, 1);


/*	-	INSERTS INTO TABLE SECRETARIO	-	*/
              
INSERT INTO secretario (nome_secretario, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_secretario, fk_id_escola_secretario) VALUES ('diretor_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'secretario_exemplo@exemplo.com', '1234', '(11)00000-0000', '(11)0000-0000', 3, 1);


/*	-	INSERTS INTO TABLE ALUNO	-	*/
              
INSERT INTO aluno (RA, nome_aluno, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, data_nascimento, fk_id_turma_aluno, fk_id_tipo_usuario_aluno, fk_id_escola_aluno) VALUES (00000000, 'aluno_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'aluno_exemplo@exemplo.com', '1234', '(11)00000-0000', '(11)0000-0000', '2020-03-22', 16, 5, 1);


/*	-	INSERTS INTO TABLE RESPONSAVEL	-	*/
              
INSERT INTO responsavel (nome_responsavel, cep, numero, complemento, rg, cpf, email, senha, pin, celular, telefone, telefone_comercial, data_nascimento, data_pagamento_responsavel, fk_ra_aluno_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel) VALUES ('responsavel_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'responsavel_exemplo@exemplo.com', '1234', 123456, '(11)00000-0000', '(11)0000-0000', '(11)0000-0000', '2020-03-22', '2020-03-22', 00000000, 6, 1);


/*	-	INSERTS INTO TABLE DADOS_ALUNO	-	*/
              
INSERT INTO dados_aluno (nota, presenca, observacoes, fk_ra_aluno_dados_aluno, fk_id_disciplina_dados_aluno) VALUES ('10.00', true, 'Hoje Fulano se portou de forma inadequada durante atividade', 00000000, 6);


/*	-	INSERTS INTO TABLE CONTATO	-	*/
              
INSERT INTO contato (mensagem, fk_envio_aluno_ra_aluno, fk_recebimento_professor_id_professor) VALUES ('Professor, favor corrigir a pauta de chamada, pois me encontrava presente na aula de hoje, grato!', 00000000, 1);


/*	-	INSERTS INTO TABLE ADMIN	-	*/
              
INSERT INTO `admin` (nome, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('admin_exemplo', 'admin_exemplo@exemplo.com', '1234', '2020.03.22', 1);




/*	-	SELECTs 	-	*/

SELECT * FROM tipo_turma;

SELECT * FROM turma;

SELECT * FROM tipo_usuario;

SELECT * FROM disciplina;

SELECT * FROM escola;

SELECT * FROM professor;

SELECT * FROM aulas_professor;

SELECT * FROM diretor;

SELECT * FROM secretario;

SELECT * FROM aluno;

SELECT * FROM dados_aluno;

SELECT * FROM responsavel;

SELECT * FROM `admin`;

SELECT * FROM contato;



/*	-	DROP DATABASE GestClass;	-	*/