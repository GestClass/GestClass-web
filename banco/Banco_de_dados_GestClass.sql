CREATE DATABASE GestClass
DEFAULT CHARSET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE GestClass;

CREATE TABLE escola (
	ID_escola INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_escola VARCHAR(70) NOT NULL,
    logradouro VARCHAR (70) NOT NULL,
    numero INTEGER NOT NULL,
    bairro VARCHAR (50) NOT NULL,
    estado VARCHAR (30) NOT NULL,
    CNPJ VARCHAR(18) NOT NULL,
    telefone VARCHAR(13) NOT NULL,
    email VARCHAR(65) NOT NULL,
    data_pagamento DATE NOT NULL,
    quantidade_alunos INTEGER,
    fk_id_tipos_turma INTEGER NOT NULL 
);

CREATE TABLE tipo_turmas (
	ID_tipo_turmas INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_tipo_turma VARCHAR(30) NOT NULL
);

CREATE TABLE tipo_usuario(
	ID_tipo_usuario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE disciplina (
	ID_disciplina INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome_disciplina VARCHAR(50),    
    fk_id_professor INTEGER   
);

CREATE TABLE funcionario (
	ID_funcionario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_funcionario VARCHAR (50) NOT NULL,
    foto VARCHAR(255),
    rg VARCHAR(15) NOT NULL,
    cpf VARCHAR(12) NOT NULL,
	email VARCHAR(65) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    telefone VARCHAR(13),
    celular VARCHAR(14) NOT NULL,
    fk_id_tipo_usuario INTEGER NOT NULL,
    fk_dados_professores_id_dados_professor INTEGER NOT NULL,
    fk_escola_funcionario INTEGER NOT NULL
);

CREATE TABLE aluno (
	id_aluno INTEGER AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255),
    nome_aluno VARCHAR (70) NOT NULL,
    celular VARCHAR (16) NOT NULL,    
    CEP VARCHAR (70) NOT NULL,
    numero_casa INTEGER NOT NULL,
    RG VARCHAR (12) NOT NULL,
    CPF VARCHAR (14) NOT NULL, 
    email VARCHAR(65) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    data_nascimento DATE NOT NULL,
    fk_id_responsavel INTEGER NOT NULL,
    fk_id_dados_alunos INTEGER NOT NULL,
    fk_usuario_id_tipo_usuario INTEGER NOT NULL,
    fk_escola_aluno INTEGER NOT NULL
);

CREATE TABLE responsavel (
	ID_responsavel INTEGER PRIMARY KEY AUTO_INCREMENT,
    foto VARCHAR(255),
    nome_aluno VARCHAR (70) NOT NULL,
    numero_celular VARCHAR (16) NOT NULL,    
    logradouro VARCHAR (50) NOT NULL,
    numero INTEGER NOT NULL,
    bairro VARCHAR (50) NOT NULL,
    estado VARCHAR (30) NOT NULL,
    RG VARCHAR (12) NOT NULL,
    CPF VARCHAR (14) NOT NULL, 
    email VARCHAR(65) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    pin INTEGER(6) NOT NULL,
    telefone VARCHAR(13),
    telefone_comercial VARCHAR(13),
    celular VARCHAR(14) NOT NULL,
    data_nascimento DATE NOT NULL,
    fk_ra_aluno INTEGER NOT NULL,
    fk_id_dados_alunos_responsavel INTEGER NOT NULL,
    fk_usuario_id_tipo_usuario_responsavel INTEGER NOT NULL,
    fk_escola_responsavel INTEGER NOT NULL
);

CREATE TABLE dados_aluno (
    ID_dados_alunos INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    notas DECIMAL (2,2) NOT NULL,
    presenca BOOLEAN,
    observacoes VARCHAR (255) ,
    fk_ra_aluno_dados_alunos INTEGER NOT NULL,
    fk_id_disciplina_dados_alunos INTEGER NOT NULL
);
	
CREATE TABLE turma (
	ID_turma INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_turma VARCHAR(50),
    fk_ra_aluno_turma INTEGER
);

CREATE TABLE dados_professor (
	ID_dados_professor INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    fk_id_funcionario_professor INTEGER NOT NULL,
    fk_id_disciplina_professor INTEGER, 
    fk_id_turma_professor INTEGER
);

CREATE TABLE pagamento (
	id_pagamento INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data_pagamento DATE NOT NULL,
	fk_id_responsavel_pagamento INTEGER NOT NULL
);

CREATE TABLE contato (
	ID_mensagem INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mensagem TEXT (550) NOT NULL,
    fk_envio_aluno_ra_aluno INTEGER,
    fk_envio_responsavel_id_responsavel INTEGER,
    fk_envio_funcionario_id_funcionario INTEGER,
    fk_envio_professor_fk_professor INTEGER,
	fk_recebimento_aluno_ra_aluno INTEGER,
    fk_recebimento_responsavel_id_responsavel INTEGER,
    fk_recebimento_funcionario_id_funcionario INTEGER,
    fk_recebimento_professor_fk_professor INTEGER
);

ALTER TABLE dados_professor ADD CONSTRAINT fk_id_funcionario_professor FOREIGN KEY (fk_id_funcionario_professor) REFERENCES funcionario (ID_funcionario);

ALTER TABLE dados_professor ADD CONSTRAINT fk_id_disciplina_professor FOREIGN KEY (fk_id_disciplina_professor) REFERENCES disciplina (ID_disciplina);

ALTER TABLE dados_professor ADD CONSTRAINT fk_id_turma_professor FOREIGN KEY (fk_id_turma_professor) REFERENCES TURMA (ID_turma);

ALTER TABLE pagamento ADD CONSTRAINT fk_id_responsavel_pagamento FOREIGN KEY (fk_id_responsavel_pagamento) REFERENCES responsavel (ID_responsavel);

ALTER TABLE contato ADD CONSTRAINT fk_envio_aluno_ra_aluno FOREIGN KEY (fk_envio_aluno_ra_aluno) REFERENCES aluno (RA);

ALTER TABLE contato ADD CONSTRAINT fk_envio_responsavel_id_responsavel FOREIGN KEY (fk_envio_responsavel_id_responsavel) REFERENCES responsavel (ID_responsavel);

ALTER TABLE contato ADD CONSTRAINT fk_envio_funcionario_id_funcionario FOREIGN KEY (fk_envio_funcionario_id_funcionario) REFERENCES funcionario (ID_funcionario);

ALTER TABLE contato ADD CONSTRAINT fk_recebimento_aluno_ra_aluno FOREIGN KEY (fk_recebimento_aluno_ra_aluno) REFERENCES aluno (RA);

ALTER TABLE contato ADD CONSTRAINT fk_recebimento_responsavel_id_responsavel FOREIGN KEY (fk_recebimento_responsavel_id_responsavel) REFERENCES responsavel (ID_responsavel);

ALTER TABLE contato ADD CONSTRAINT fk_recebimento_funcionario_id_funcionario FOREIGN KEY (fk_recebimento_funcionario_id_funcionario) REFERENCES funcionario (ID_funcionario);

ALTER TABLE aluno ADD CONSTRAINT fk_id_responsavel FOREIGN KEY (fk_id_responsavel) REFERENCES responsavel (ID_responsavel);

ALTER TABLE aluno ADD CONSTRAINT fk_id_dados_alunos FOREIGN KEY (fk_id_dados_alunos) REFERENCES dados_aluno (ID_dados_alunos);

ALTER TABLE aluno ADD CONSTRAINT fk_usuario_id_tipo_usuario FOREIGN KEY (fk_usuario_id_tipo_usuario) REFERENCES tipo_usuario (ID_tipo_usuario);

ALTER TABLE aluno ADD CONSTRAINT fk_escola_aluno FOREIGN KEY (fk_escola_aluno) REFERENCES escola (ID_escola);

ALTER TABLE funcionario ADD CONSTRAINT fk_dados_professores_id_dados_professor FOREIGN KEY (fk_dados_professores_id_dados_professor) REFERENCES dados_professor (ID_dados_professor);

ALTER TABLE funcionario ADD CONSTRAINT fk_id_tipo_usuario FOREIGN KEY (fk_id_tipo_usuario) REFERENCES tipo_usuario (ID_tipo_usuario);

ALTER TABLE funcionario ADD CONSTRAINT fk_escola_funcionario FOREIGN KEY (fk_escola_funcionario) REFERENCES escola (ID_escola);

ALTER TABLE escola ADD CONSTRAINT fk_id_tipos_turma FOREIGN KEY (fk_id_tipos_turma) REFERENCES tipo_turmas (ID_tipo_turmas);

ALTER TABLE disciplina ADD CONSTRAINT fk_id_professor FOREIGN KEY (fk_id_professor) REFERENCES funcionario (ID_funcionario);

ALTER TABLE responsavel ADD CONSTRAINT fk_ra_aluno FOREIGN KEY (fk_ra_aluno) REFERENCES aluno (RA);

ALTER TABLE responsavel ADD CONSTRAINT fk_id_dados_alunos_responsavel FOREIGN KEY (fk_id_dados_alunos_responsavel) REFERENCES dados_aluno (ID_dados_alunos);

ALTER TABLE responsavel ADD CONSTRAINT fk_usuario_id_tipo_usuario_responsavel FOREIGN KEY (fk_usuario_id_tipo_usuario_responsavel) REFERENCES tipo_usuario (ID_tipo_usuario);

ALTER TABLE responsavel ADD CONSTRAINT fk_escola_responsavel FOREIGN KEY (fk_escola_responsavel) REFERENCES escola (ID_escola);

ALTER TABLE dados_aluno ADD CONSTRAINT fk_ra_aluno_dados_alunos FOREIGN KEY (fk_ra_aluno_dados_alunos) REFERENCES aluno (RA);

ALTER TABLE dados_aluno ADD CONSTRAINT fk_id_disciplina_dados_alunos FOREIGN KEY (fk_id_disciplina_dados_alunos) REFERENCES disciplina (ID_disciplina);

ALTER TABLE turma ADD CONSTRAINT fk_ra_aluno_turma FOREIGN KEY (fk_ra_aluno_turma) REFERENCES aluno (RA);

CREATE TABLE `events` (
  `id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) CHARACTER SET utf8 NOT NULL,
  `color` VARCHAR(10) CHARACTER SET utf8 NOT NULL,
  `start` DATETIME NOT NULL,
  `end` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
	
    
    /*	-	INSERTS IN DESCRIPTIONS TABLES	-	*/
    
    
INSERT INTO tipo_turmas (nome_tipo_turma) VALUES ('berçario');
INSERT INTO tipo_turmas (nome_tipo_turma) VALUES ('pre-escola');
INSERT INTO tipo_turmas (nome_tipo_turma) VALUES ('ensino fundamental I');
INSERT INTO tipo_turmas (nome_tipo_turma) VALUES ('ensino fundamental II');
INSERT INTO tipo_turmas (nome_tipo_turma) VALUES ('ensino medio');

INSERT INTO tipo_usuario (nome_usuario) VALUES ('diretor');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('secretaria');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('professor');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('responsavel');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('aluno');


/*	-	SELECTS OF DESCRIPTIONS TABLES	-	*/


SELECT * FROM tipo_turmas;

SELECT * FROM tipo_usuario;

    
/*	-	DROP DATABASE GestClass;	-	*/



