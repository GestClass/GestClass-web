CREATE DATABASE GestClass
DEFAULT CHARSET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE GestClass;

CREATE TABLE tipo_usuario(
	nome_usuario VARCHAR(50) NOT NULL,
	ID_tipo_usuario INTEGER NOT NULL PRIMARY KEY
);

CREATE TABLE disciplina (
	nome_disciplina VARCHAR(50),
    ID_disciplina INTEGER AUTO_INCREMENT PRIMARY KEY,
    fk_id_professor INTEGER   
);

 ALTER TABLE disciplina ADD CONSTRAINT fk_id_professor FOREIGN KEY (fk_id_professor) REFERENCES professor (ID_professor);

CREATE TABLE funcionario (
	ID_funcionario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_funcionario VARCHAR (50) NOT NULL,
    rg VARCHAR(15) NOT NULL,
    cpf VARCHAR(12) NOT NULL,
    foto VARCHAR(50) NOT NULL,
    fk_id_tipo_usuario INTEGER NOT NULL
);

ALTER TABLE funcionario ADD CONSTRAINT fk_id_tipo_usuario FOREIGN KEY (fk_id_tipo_usuario) REFERENCES tipo_usuario (ID_tipo_usuario);

CREATE TABLE aluno (
	RA INTEGER PRIMARY KEY,
    foto VARCHAR(255),
    nome_aluno VARCHAR (70) NOT NULL,
    numero_celular VARCHAR (16) NOT NULL,    
    logradouro VARCHAR (50) NOT NULL,
    numero INTEGER NOT NULL,
    bairro VARCHAR (50) NOT NULL,
    estado VARCHAR (30) NOT NULL,
    RG VARCHAR (12) NOT NULL,
    CPF VARCHAR (14) NOT NULL, 
    data_nascimento DATE NOT NULL,
    fk_id_responsavel INTEGER,
    fk_id_dados_alunos INTEGER,
    fk_usuario_id_tipo_usuario INTEGER
    
);

ALTER TABLE aluno ADD CONSTRAINT fk_id_responsavel FOREIGN KEY (fk_id_responsavel) REFERENCES responsavel (ID_responsavel);
ALTER TABLE aluno ADD CONSTRAINT fk_id_dados_alunos FOREIGN KEY (fk_id_dados_alunos) REFERENCES dados_aluno (ID_dados_alunos);
ALTER TABLE aluno ADD CONSTRAINT fk_usuario_id_tipo_usuario FOREIGN KEY (fk_usuario_id_tipo_usuario) REFERENCES tipo_usuario (ID_tipo_usuario);

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
    data_nascimento DATE NOT NULL,
    fk_ra_aluno INTEGER,
    fk_id_dados_alunos_responsavel INTEGER,
    fk_usuario_id_tipo_usuario_responsavel INTEGER
    
);

ALTER TABLE responsavel ADD CONSTRAINT fk_ra_aluno FOREIGN KEY (fk_ra_aluno) REFERENCES aluno (RA);
ALTER TABLE responsavel ADD CONSTRAINT fk_id_dados_alunos_responsavel FOREIGN KEY (fk_id_dados_alunos_responsavel) REFERENCES dados_aluno (ID_dados_alunos);
ALTER TABLE responsavel ADD CONSTRAINT fk_usuario_id_tipo_usuario_responsavel FOREIGN KEY (fk_usuario_id_tipo_usuario_responsavel) REFERENCES tipo_usuario (ID_tipo_usuario);

CREATE TABLE dados_aluno (
ID_dados_alunos INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
notas DECIMAL (2,2) NOT NULL,
presenca BOOLEAN,
observacoes VARCHAR (255) ,
fk_ra_aluno_dados_alunos INTEGER NOT NULL,
fk_id_disciplina_dados_alunos INTEGER NOT NULL
);

ALTER TABLE dados_aluno ADD CONSTRAINT fk_ra_aluno_dados_alunos FOREIGN KEY (fk_ra_aluno_dados_alunos) REFERENCES aluno (RA);
ALTER TABLE dados_aluno ADD CONSTRAINT fk_id_disciplina_dados_alunos FOREIGN KEY (fk_id_disciplina_dados_alunos) REFERENCES disciplina (ID_disciplina);
	
CREATE TABLE turma (
	ID_turma INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_turma VARCHAR(50),
    fk_ra_aluno_turma INTEGER
);

ALTER TABLE turma ADD CONSTRAINT fk_ra_aluno_turma FOREIGN KEY (fk_ra_aluno_turma) REFERENCES aluno (RA);


CREATE TABLE professor (
	ID_professor INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    fk_id_disciplina_professor INTEGER, 
    fk_id_turma_professor INTEGER,
    fk_tipo_usuario_id_tipo_usuario_professor INTEGER
);

ALTER TABLE professor ADD CONSTRAINT fk_id_disciplina_professor FOREIGN KEY (fk_id_disciplina_professor) REFERENCES disciplina (ID_disciplina);
ALTER TABLE professor ADD CONSTRAINT fk_id_turma_professor FOREIGN KEY (fk_id_turma_professor) REFERENCES TURMA (ID_turma);
ALTER TABLE professor ADD CONSTRAINT fk_tipo_usuario_id_tipo_usuario_professor FOREIGN KEY (fk_tipo_usuario_id_tipo_usuario_professor) REFERENCES tipo_usuario (ID_tipo_usuario);

CREATE TABLE pagamento (
	id_pagamento INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    data_pagamento DATE NOT NULL,
	fk_id_responsavel_pagamento INTEGER NOT NULL
);

ALTER TABLE pagamento ADD CONSTRAINT fk_id_responsavel_pagamento FOREIGN KEY (fk_id_responsavel_pagamento) REFERENCES responsavel (ID_responsavel);


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

ALTER TABLE contato ADD CONSTRAINT fk_envio_aluno_ra_aluno FOREIGN KEY (fk_envio_aluno_ra_aluno) REFERENCES aluno (RA);
ALTER TABLE contato ADD CONSTRAINT fk_envio_responsavel_id_responsavel FOREIGN KEY (fk_envio_responsavel_id_responsavel) REFERENCES responsavel (ID_responsavel);
ALTER TABLE contato ADD CONSTRAINT fk_envio_funcionario_id_funcionario FOREIGN KEY (fk_envio_funcionario_id_funcionario) REFERENCES funcionario (ID_funcionario);
ALTER TABLE contato ADD CONSTRAINT fk_envio_professor_fk_professor FOREIGN KEY (fk_envio_professor_fk_professor) REFERENCES professor (ID_professor);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_aluno_ra_aluno FOREIGN KEY (fk_recebimento_aluno_ra_aluno) REFERENCES aluno (RA);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_responsavel_id_responsavel FOREIGN KEY (fk_recebimento_responsavel_id_responsavel) REFERENCES responsavel (ID_responsavel);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_funcionario_id_funcionario FOREIGN KEY (fk_recebimento_funcionario_id_funcionario) REFERENCES funcionario (ID_funcionario);
ALTER TABLE contato ADD CONSTRAINT fk_recebimento_professor_fk_professor FOREIGN KEY (fk_recebimento_professor_fk_professor) REFERENCES professor (ID_professor);

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `color` varchar(10) CHARACTER SET utf8 NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
	
  drop table events;  
    
/*DROP DATABASE GestClass;*/



