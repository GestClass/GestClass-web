CREATE DATABASE GestClass
DEFAULT CHARSET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;

USE GestClass;

CREATE TABLE turno (
	ID_turno INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_turno VARCHAR(20) NOT NULL
);

CREATE TABLE tipo_usuario(
	ID_tipo_usuario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_usuario VARCHAR(50) NOT NULL
);

CREATE TABLE disciplina(
	ID_disciplina INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_disciplina VARCHAR(50) NOT NULL
);

CREATE TABLE dia_semana (
	ID_dia_semana INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_dia VARCHAR(40) NOT NULL UNIQUE
);

CREATE TABLE escola (
	ID_escola INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_escola VARCHAR(70) NOT NULL,
	cep VARCHAR (10) NOT NULL,
    numero INTEGER NOT NULL,
    complemento VARCHAR (40),
    CNPJ VARCHAR(18) NOT NULL UNIQUE,
    telefone VARCHAR(14) NOT NULL,
    email VARCHAR(65) NOT NULL UNIQUE,
    quantidade_alunos INTEGER,
	data_pagamento_escola DATE NOT NULL,
    turma_bercario BOOLEAN, 
    turma_pre_escola BOOLEAN,
    turma_fundamental_I BOOLEAN,
    turma_fundamental_II BOOLEAN,
    turma_medio BOOLEAN 
);

CREATE TABLE turma (
	ID_turma INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    nome_turma VARCHAR(50) NOT NULL,
    fk_id_escola_turma INTEGER NOT NULL,
    fk_id_turno_turma INTEGER NOT NULL
);

CREATE TABLE aula_escola(
	ID_aula_escola INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT UNIQUE,
	nome_aula VARCHAR(20) NOT NULL,
	aula_start TIME NOT NULL,
    aula_end TIME NOT NULL,    
    fk_id_turno_aula_escola INTEGER NOT NULL,
    fk_id_escola_aula_escola INTEGER NOT NULL
);

CREATE TABLE grade_curricular (
	ID_grade_curricular INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT UNIQUE,
    fk_id_dia_semana_grade_curricular INTEGER NOT NULL,
    fk_id_aula_escola_grade_curricular INTEGER NOT NULL,
    fk_id_disciplina_grade_curricular INTEGER NULL,
    fk_id_turma_grade_curricular INTEGER NOT NULL
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
    celular VARCHAR(15) NOT NULL,
    telefone VARCHAR(14),
    fk_id_tipo_usuario_professor INTEGER NOT NULL,
    fk_id_escola_professor INTEGER NOT NULL
);

CREATE TABLE turmas_professor (
	ID_turmas_professor INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
    fk_id_professor_turmas_professor INTEGER NOT NULL,	
    fk_id_turma_professor_turmas_professor INTEGER 
);

CREATE TABLE disciplinas_professor (
	ID_disciplinas_professor INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL UNIQUE,
    fk_id_professor_disciplinas_professor INTEGER NOT NULL,
    fk_id_disciplina_professor_disciplinas_professor INTEGER, 
    fk_id_turma_professor_disciplinas_professor INTEGER
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
    celular VARCHAR(15) NOT NULL,
    telefone VARCHAR(14),
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
    celular VARCHAR(15) NOT NULL,
    telefone VARCHAR(14),
    fk_id_tipo_usuario_secretario INTEGER NOT NULL,
    fk_id_escola_secretario INTEGER NOT NULL
);

CREATE TABLE aluno (
	RA INTEGER PRIMARY KEY UNIQUE,    
    nome_aluno VARCHAR (70) NOT NULL,
    foto VARCHAR(255),
    RG VARCHAR (12) NOT NULL UNIQUE,
    cpf VARCHAR (14) NOT NULL UNIQUE,  
    email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    celular VARCHAR(15) NOT NULL,
    telefone VARCHAR(14),
    data_nascimento DATE NOT NULL,
    fk_id_turma_aluno INTEGER,
    fk_id_responsavel_aluno INTEGER,
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
    celular VARCHAR(15) NOT NULL,
    telefone VARCHAR(14),
    telefone_comercial VARCHAR(14),
    data_nascimento DATE NOT NULL,
	data_pagamento_responsavel DATE NOT NULL,
    fk_id_tipo_usuario_responsavel INTEGER NOT NULL,
    fk_id_escola_responsavel INTEGER NOT NULL
);

CREATE TABLE boletim_listagem (
	ID_boletim_listagem INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT UNIQUE,
    fk_id_escola_boletim_listagem INTEGER NOT NULL,
    fk_id_disciplina_boletim_listagem INTEGER NOT NULL
);

CREATE TABLE boletim_aluno (
	ID_boletim_aluno INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	nota DECIMAL (4,2) NOT NULL,
	observacoes VARCHAR (255),
    nome_atividade VARCHAR(70) NOT NULL,
    data_atividade DATE NOT NULL,
	fk_ra_aluno_boletim_aluno INTEGER NOT NULL,
	fk_id_disciplina_boletim_aluno INTEGER NOT NULL,
    fk_id_boletim_listagem_boletim_aluno INTEGER NOT NULL
);


CREATE TABLE listagem_chamada(
	ID_listagem INTEGER PRIMARY KEY AUTO_INCREMENT UNIQUE,
    data_chamada DATE NOT NULL,
    fk_id_escola_listagem_chamada INTEGER NOT NULL,
    fk_id_disciplina_listagem_chamada INTEGER NOT NULL,
    fk_id_professor_listagem_chamada INTEGER NOT NULL
);


CREATE TABLE chamada_aluno (
	ID_chamada_aluno INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	presenca BOOLEAN NOT NULL,
    data_aula DATE NOT NULL,
	fk_ra_aluno_chamada_aluno INTEGER NOT NULL,
	fk_id_disciplina_chamada_aluno INTEGER NOT NULL,
    fk_id_professor_chamada_aluno INTEGER NOT NULL,
    fk_id_listagem_chamada_aluno INTEGER NOT NULL
);

CREATE TABLE envio_boleto (
	ID_envio_boleto INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT UNIQUE,
    fk_id_diretor_envio_boleto INTEGER NULL,
    fk_id_secretario_envio_boleto INTEGER NULL,
    fk_id_responsavel_recebimento_boleto INTEGER NOT NULL,
    data_envio DATETIME NOT NULL,
    boleto VARCHAR(255) NOT NULL
);

CREATE TABLE contato (
	ID_mensagem INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    mensagem TEXT NOT NULL,
    assunto VARCHAR(50) NOT NULL,
    data_mensagem DATETIME NOT NULL,
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

CREATE TABLE datas_fim_bimestres (
	ID_datas_fim_bimestres INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    bimestre1 DATE NOT NULL,
    bimestre2 DATE NOT NULL,
    bimestre3 DATE NOT NULL,
    bimestre4 DATE NOT NULL,
    fk_id_escola_datas_fim_bimestres INTEGER NOT NULL UNIQUE
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


/*	-	FOREIGN KEYs TABLE TURMA	-	*/
ALTER TABLE turma ADD CONSTRAINT fk_id_escola_turma FOREIGN KEY (fk_id_escola_turma) REFERENCES escola (ID_escola);
ALTER TABLE turma ADD CONSTRAINT fk_id_turno_turma FOREIGN KEY (fk_id_turno_turma) REFERENCES turno (ID_turno);


/*	-	FOREIGN KEYs TABLE AULA_ESCOLA	-	*/

ALTER TABLE aula_escola ADD CONSTRAINT fk_id_turno_aula_escola FOREIGN KEY (fk_id_turno_aula_escola) REFERENCES turno (ID_turno);
ALTER TABLE aula_escola ADD CONSTRAINT fk_id_escola_aula_escola FOREIGN KEY (fk_id_escola_aula_escola) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE GRADE_CURRICULAR 	-	*/

ALTER TABLE grade_curricular ADD CONSTRAINT fk_id_dia_semana_grade_curricular FOREIGN KEY (fk_id_dia_semana_grade_curricular) REFERENCES dia_semana (ID_dia_semana);
ALTER TABLE grade_curricular ADD CONSTRAINT fk_id_aula_escola_grade_curricular FOREIGN KEY (fk_id_aula_escola_grade_curricular) REFERENCES aula_escola (ID_aula_escola);
ALTER TABLE grade_curricular ADD CONSTRAINT fk_id_disciplina_grade_curricular FOREIGN KEY (fk_id_disciplina_grade_curricular) REFERENCES disciplina (ID_disciplina);
ALTER TABLE grade_curricular ADD CONSTRAINT fk_id_turma_grade_curricular FOREIGN KEY (fk_id_turma_grade_curricular) REFERENCES turma (ID_turma);


/*	-	FOREIGN KEYs TABLE PROFESSOR	-	*/

ALTER TABLE professor ADD CONSTRAINT fk_id_tipo_usuario_professor FOREIGN KEY (fk_id_tipo_usuario_professor) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE professor ADD CONSTRAINT fk_id_escola_professor FOREIGN KEY (fk_id_escola_professor) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE TURMAS_PROFESSOR	-	*/

ALTER TABLE turmas_professor ADD CONSTRAINT fk_id_professor_turmas_professor FOREIGN KEY (fk_id_professor_turmas_professor) REFERENCES professor (ID_professor);
ALTER TABLE turmas_professor ADD CONSTRAINT fk_id_turma_professor_turmas_professor FOREIGN KEY (fk_id_turma_professor_turmas_professor) REFERENCES turma (ID_turma);


/*	-	FOREIGN KEYs TABLE DISCPLINAS_PROFESSOR	-	*/

ALTER TABLE disciplinas_professor ADD CONSTRAINT fk_id_professor_disciplinas_professor FOREIGN KEY (fk_id_professor_disciplinas_professor) REFERENCES professor (ID_professor);
ALTER TABLE disciplinas_professor ADD CONSTRAINT fk_id_disciplina_professor_disciplinas_professor FOREIGN KEY (fk_id_disciplina_professor_disciplinas_professor) REFERENCES disciplina (ID_disciplina);
ALTER TABLE disciplinas_professor ADD CONSTRAINT fk_id_turma_professor_disciplinas_professor FOREIGN KEY (fk_id_turma_professor_disciplinas_professor) REFERENCES turma (ID_turma);



/*	-	FOREIGN KEYs TABLE DIRETOR	-	*/

ALTER TABLE diretor ADD CONSTRAINT fk_id_tipo_usuario_diretor FOREIGN KEY (fk_id_tipo_usuario_diretor) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE diretor ADD CONSTRAINT fk_id_escola_diretor FOREIGN KEY (fk_id_escola_diretor) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE SECRETARIO	-	*/

ALTER TABLE secretario ADD CONSTRAINT fk_id_tipo_usuario_secretario FOREIGN KEY (fk_id_tipo_usuario_secretario) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE secretario ADD CONSTRAINT fk_id_escola_secretario FOREIGN KEY (fk_id_escola_secretario) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE ALUNO	-	*/

ALTER TABLE aluno ADD CONSTRAINT fk_id_turma_aluno FOREIGN KEY (fk_id_turma_aluno) REFERENCES turma (ID_turma);
ALTER TABLE aluno ADD CONSTRAINT fk_id_responsavel_aluno FOREIGN KEY (fk_id_responsavel_aluno) REFERENCES responsavel (ID_responsavel);
ALTER TABLE aluno ADD CONSTRAINT fk_id_tipo_usuario_aluno FOREIGN KEY (fk_id_tipo_usuario_aluno) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE aluno ADD CONSTRAINT fk_id_escola_aluno FOREIGN KEY (fk_id_escola_aluno) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE RESPONSAVEL	-	*/

ALTER TABLE responsavel ADD CONSTRAINT fk_id_tipo_usuario_responsavel FOREIGN KEY (fk_id_tipo_usuario_responsavel) REFERENCES tipo_usuario (ID_tipo_usuario);
ALTER TABLE responsavel ADD CONSTRAINT fk_id_escola_responsavel FOREIGN KEY (fk_id_escola_responsavel) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE BOLETIM_ALUNO	-	*/

ALTER TABLE boletim_aluno ADD CONSTRAINT fk_id_disciplina_boletim_aluno FOREIGN KEY (fk_id_disciplina_boletim_aluno) REFERENCES disciplina (ID_disciplina);
ALTER TABLE boletim_aluno ADD CONSTRAINT fk_ra_aluno_boletim_aluno FOREIGN KEY (fk_ra_aluno_boletim_aluno) REFERENCES aluno (RA);


/*	-	FOREIGN KEYs TABLE CHAMADA_ALUNO	-	*/

ALTER TABLE chamada_aluno ADD CONSTRAINT fk_ra_aluno_chamada_aluno FOREIGN KEY (fk_ra_aluno_chamada_aluno) REFERENCES aluno (RA);
ALTER TABLE chamada_aluno ADD CONSTRAINT fk_id_disciplina_chamada_aluno FOREIGN KEY (fk_id_disciplina_chamada_aluno) REFERENCES disciplina (ID_disciplina);
ALTER TABLE chamada_aluno ADD CONSTRAINT fk_id_professor_chamada_aluno FOREIGN KEY (fk_id_professor_chamada_aluno) REFERENCES professor (ID_professor);
ALTER TABLE chamada_aluno ADD CONSTRAINT fk_id_listagem_chamada_aluno FOREIGN KEY (fk_id_listagem_chamada_aluno) REFERENCES listagem_chamada(ID_listagem);


/*	-	FOREIGN KEYs TABLE LISTAGEM_CHAMADA	-	*/

ALTER TABLE listagem_chamada ADD CONSTRAINT fk_id_escola_listagem_chamada FOREIGN KEY(fk_id_escola_listagem_chamada) REFERENCES escola (ID_escola);
ALTER TABLE listagem_chamada ADD CONSTRAINT fk_id_disciplina_listagem_chamada FOREIGN KEY(fk_id_disciplina_listagem_chamada) REFERENCES disciplina (ID_disciplina);
ALTER TABLE listagem_chamada ADD CONSTRAINT fk_id_professor_listagem_chamada FOREIGN KEY(fk_id_professor_listagem_chamada) REFERENCES professor (ID_professor);


/*	-	FOREIGN KEYs TABLE ENVIO_BOLETO	 -	*/

ALTER TABLE envio_boleto ADD CONSTRAINT fk_id_diretor_envio_boleto FOREIGN KEY (fk_id_diretor_envio_boleto) REFERENCES diretor (ID_diretor);
ALTER TABLE envio_boleto ADD CONSTRAINT fk_id_secretario_envio_boleto FOREIGN KEY (fk_id_secretario_envio_boleto) REFERENCES secretrio (ID_secretario);
ALTER TABLE envio_boleto ADD CONSTRAINT fk_id_responsavel_recebimento_boleto FOREIGN KEY (fk_id_responsavel_recebimento_boleto) REFERENCES responsavel (ID_responsavel);


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


/*	-	FOREIGN KEYs TABLE DATAS_FIM_BIMESTRES	- 	*/

ALTER TABLE datas_fim_bimestres ADD CONSTRAINT fk_id_escola_datas_fim_bimestres FOREIGN KEY (fk_id_escola_datas_fim_bimestres) REFERENCES escola (ID_escola);


/*	-	FOREIGN KEYs TABLE ADMIN	-	*/

ALTER TABLE `admin` ADD CONSTRAINT fk_id_tipo_usuario_admin FOREIGN KEY (fk_id_tipo_usuario_admin) REFERENCES tipo_usuario (ID_tipo_usuario);

/*	-	INSERTS INTO TABLE TIPO_TURMA 	-	*/
    
INSERT INTO turno (nome_turno) VALUES ('Matutino');
INSERT INTO turno (nome_turno) VALUES ('Vespertino');
INSERT INTO turno (nome_turno) VALUES ('Noturno');

/*	-	INSERTS INTO TABLE TIPO_USUARIO 	-	*/

INSERT INTO tipo_usuario (nome_usuario) VALUES ('admin');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('diretor');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('secretaria');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('professor');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('aluno');
INSERT INTO tipo_usuario (nome_usuario) VALUES ('responsavel');

/*	-	INSERTS INTO TABLE DISCIPLINA 	-	*/

INSERT INTO disciplina (nome_disciplina) VALUES ('português');
INSERT INTO disciplina (nome_disciplina) VALUES ('inglês');
INSERT INTO disciplina (nome_disciplina) VALUES ('matemática');
INSERT INTO disciplina (nome_disciplina) VALUES ('biologia');
INSERT INTO disciplina (nome_disciplina) VALUES ('Ciências');
INSERT INTO disciplina (nome_disciplina) VALUES ('Quimíca');
INSERT INTO disciplina (nome_disciplina) VALUES ('Física');
INSERT INTO disciplina (nome_disciplina) VALUES ('Filosofia');
INSERT INTO disciplina (nome_disciplina) VALUES ('história');
INSERT INTO disciplina (nome_disciplina) VALUES ('geografia');
INSERT INTO disciplina (nome_disciplina) VALUES ('Sociologia');
INSERT INTO disciplina (nome_disciplina) VALUES ('Ed. Física');

/*	-	INSERTS INTO TABLE ESCOLA	-	*/

INSERT INTO escola (nome_escola, cep, numero, complemento, CNPJ, telefone, email, data_pagamento_escola, quantidade_alunos, turma_bercario, turma_pre_escola, turma_fundamental_I, turma_fundamental_II, turma_medio) VALUES ('escola_exemplo', '000.00-000', 000, 'predio a', '00.000.000/0000-00', '(11) 0000-0000', 'escola_exemplo@exemplo.com', '2020-03-22', 500, true, true, true, true, true);


/*	-	INSERTS INTO TABLE TURMA 	-	*/

INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('berçario A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('pre 1 A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('pre 2 A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('1º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('2º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('3º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('3º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('4º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('5º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('6º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('7º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('8º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('9º ano A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('1º ano medio A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('2º ano medio A', 1, 1);
INSERT INTO turma (nome_turma, fk_id_escola_turma, fk_id_turno_turma) VALUES ('3º ano medio A', 1, 1);


/*	-	INSERTs INTO TABLE AULA_ESCOLA	-	*/

INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('1º aula', '07:00:00', '07:50:00', 1, 1);
INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('2º aula', '07:50:00', '08:40:00', 1, 1);
INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('3º aula', '08:40:00', '09:30:00', 1, 1);
INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('Intervalo', '09:30:00', '09:50:00', 1, 1);
INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('4º aula', '09:50:00', '10:40:00', 1, 1);
INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('5º aula', '10:40:00', '11:30:00', 1, 1);
INSERT INTO aula_escola (nome_aula, aula_start, aula_end, fk_id_turno_aula_escola, fk_id_escola_aula_escola) VALUES ('6º aula', '11:30:00', '12:20:00', 1, 1);


/*	-	INSERTS INTO TABLE GRADE_CURRICULAR	-	*/

INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 1, 5, 16);
INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 2, 5, 16);
INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 3, 6, 16);
INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 4, 5, 16);
INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 5, 6, 16);
INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 6, 7, 16);
INSERT INTO grade_curricular (fk_id_dia_semana_grade_curricular, fk_id_aula_escola_grade_curricular, fk_id_disciplina_grade_curricular, fk_id_turma_grade_curricular) VALUES (2, 7, 7, 16);



/*	-	INSERTS INTO TABLE PROFESSOR	-	*/

INSERT INTO professor (nome_professor, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_professor, fk_id_escola_professor) VALUES ('professor_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'professor_exemplo@exemplo.com', '1234', '(11)00000-0000', '(11)0000-0000', 4, 1);

              
/*	-	INSERTS INTO TABLE TURMAS_PROFESSOR	-	*/
              
INSERT INTO turmas_professor (fk_id_professor_turmas_professor, fk_id_turma_professor_turmas_professor) VALUES (1, 16);
INSERT INTO turmas_professor (fk_id_professor_turmas_professor, fk_id_turma_professor_turmas_professor) VALUES (1, 15);
INSERT INTO turmas_professor (fk_id_professor_turmas_professor, fk_id_turma_professor_turmas_professor) VALUES (1, 14);
INSERT INTO turmas_professor (fk_id_professor_turmas_professor, fk_id_turma_professor_turmas_professor) VALUES (1, 13);
              
              
/*	-	INSERTS INTO TABLE DISCIPLINAS_PROFESSOR	-	*/
              
INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES (1, 5, 16);
INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES (1, 4, 16);
INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES (1, 3, 15);
INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES (1, 2, 14);
INSERT INTO disciplinas_professor (fk_id_professor_disciplinas_professor, fk_id_disciplina_professor_disciplinas_professor, fk_id_turma_professor_disciplinas_professor) VALUES (1, 1, 13);


/*	-	INSERTS INTO TABLE DIRETOR	-	*/
              
INSERT INTO dia_semana (nome_dia) VALUES ("Domingo");
INSERT INTO dia_semana (nome_dia) VALUES ("Segunda-Feira");
INSERT INTO dia_semana (nome_dia) VALUES ("Terça-Feira");
INSERT INTO dia_semana (nome_dia) VALUES ("Quarta-Feira");
INSERT INTO dia_semana (nome_dia) VALUES ("Quinta-Feira");
INSERT INTO dia_semana (nome_dia) VALUES ("Sexta-Feira");
INSERT INTO dia_semana (nome_dia) VALUES ("Sábado"); 


/*	-	INSERTS INTO TABLE DIRETOR	-	*/
              
INSERT INTO diretor (nome_diretor, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_diretor, fk_id_escola_diretor) VALUES ('diretor_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'diretor_exemplo@exemplo.com', '1234', '(11) 00000-0000', '(11) 0000-0000', 2, 1);


/*	-	INSERTS INTO TABLE SECRETARIO	-	*/
              
INSERT INTO secretario (nome_secretario, cep, numero, complemento, rg, cpf, email, senha, celular, telefone, fk_id_tipo_usuario_secretario, fk_id_escola_secretario) VALUES ('secretario_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'secretario_exemplo@exemplo.com', '1234', '(11) 00000-0000', '(11) 0000-0000', 3, 1);

/*	-	INSERTS INTO TABLE RESPONSAVEL	-	*/
              
INSERT INTO responsavel (nome_responsavel, cep, numero, complemento, rg, cpf, email, senha, pin, celular, telefone, telefone_comercial, data_nascimento, data_pagamento_responsavel, fk_id_tipo_usuario_responsavel, fk_id_escola_responsavel) VALUES ('responsavel_exemplo', '000.00-000', '000', 'predio A', '00.000.000-0', '000.000.000-00', 'responsavel_exemplo@exemplo.com', '1234', 123456, '(11) 00000-0000', '(11) 0000-0000', '(11) 0000-0000', '2020-03-22', '2020-03-22', 6, 1);


/*	-	INSERTS INTO TABLE ALUNO	-	*/
              
INSERT INTO aluno (RA, nome_aluno, rg, cpf, email, senha, celular, telefone, data_nascimento, fk_id_turma_aluno, fk_id_responsavel_aluno, fk_id_tipo_usuario_aluno, fk_id_escola_aluno) VALUES (00000000, 'aluno_exemplo','00.000.000-0', '000.000.000-00', 'aluno_exemplo@exemplo.com', '1234', '(11) 00000-0000', '(11) 0000-0000', '2020-03-22', 16, 1, 5, 1);
INSERT INTO aluno (RA, nome_aluno, rg, cpf, email, senha, celular, telefone, data_nascimento, fk_id_turma_aluno, fk_id_responsavel_aluno, fk_id_tipo_usuario_aluno, fk_id_escola_aluno) VALUES (00000001, 'aluno_dois', '00.000.000-1', '000.000.000-01', 'aluno2_exemplo@exemplo.com', '1234', '(11) 00000-0000', '(11) 0000-0000', '2020-03-22', 16, 1, 5, 1);


/*	-	INSERTS INTO TABLE BOLETIM_ALUNO	-	*/
              
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-03-22', 00000000, 6);
/*	Bim 1	*/
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-03-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('0.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-03-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-03-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('5.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-03-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-03-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('0.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-03-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-03-12', 00000001, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('5.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-03-12', 00000001, 4);
/*	Bim 2	*/
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-06-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-06-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('4.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-06-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-06-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('10.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-06-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('8.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-06-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('8.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-06-12', 00000001, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('4.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-06-12', 00000001, 4);
/*	Bim 3	*/
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('2.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-08-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('8.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-08-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('1.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-08-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('3.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-08-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('9.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-08-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('9.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-08-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('6.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-08-12', 00000001, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('8.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-08-12', 00000001, 4);
/*	Bim 4	*/
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('8.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-11-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('8.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-11-12', 00000000, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('5.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-11-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('5.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-11-12', 00000000, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('4.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-11-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('4.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-11-12', 00000001, 5);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('7.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 1', '2020-11-12', 00000001, 4);
INSERT INTO boletim_aluno (nota, observacoes, nome_atividade, data_atividade, fk_ra_aluno_boletim_aluno, fk_id_disciplina_boletim_aluno) VALUES ('5.00', 'Hoje Fulano se portou de forma inadequada durante atividade', 'atividade 2', '2020-11-12', 00000001, 4);


/*	-	INSERTS INTO TABLE LISTAGEM_CHAMADA	-	*/

INSERT INTO listagem_chamada (data_chamada, fk_id_escola_listagem_chamada, fk_id_disciplina_listagem_chamada, fk_id_professor_listagem_chamada) VALUES ('2020-05-28', 1, 1, 1);

/*	-	INSERTS INTO TABLE CHAMADA_ALUNO	-	*/
             
INSERT INTO chamada_aluno (presenca, data_aula, fk_ra_aluno_chamada_aluno, fk_id_disciplina_chamada_aluno, fk_id_professor_chamada_aluno, fk_id_listagem_chamada_aluno) VALUES ( true, '2020-03-22',00000000, 6, 1, 1);


/*	-	INSERTS INTO TABLE datas_fim_bimestres	-	*/

INSERT INTO datas_fim_bimestres (bimestre1, bimestre2, bimestre3, bimestre4, fk_id_escola_datas_fim_bimestres) VALUES ('2020-04-15', '2020-06-30', '2020-10-03', '2020-12-10', 1);


/*	-	INSERTs INTO TABLE ENVIO_BOLETO 	-	*/

INSERT INTO envio_boleto (fk_id_diretor_envio_boleto, fk_id_responsavel_recebimento_boleto, data_envio, boleto) VALUES (1, 1, 'boleto teste');


/*	-	INSERTS INTO TABLE CONTATO	-	*/
              
INSERT INTO contato (mensagem, assunto, data_mensagem, fk_envio_aluno_ra_aluno, fk_recebimento_professor_id_professor) VALUES ('Professor, favor corrigir a pauta de chamada, pois me encontrava presente na aula de hoje, grato!', 'Correção de chamada', '2020-06-13', 00000000, 1);


/*	-	INSERTS INTO TABLE ADMIN	-	*/
              
INSERT INTO `admin` (nome, foto, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('Ana Beatriz', 'ana.jpg' , 'ana@gestclass.com', '1234', '2001.04.24', 1);
INSERT INTO `admin` (nome, foto, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('Caio Fonseca', 'caio.jpg', 'caio@gestclass.com', '1234', '2000.09.05', 1);
INSERT INTO `admin` (nome, foto, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('Carlos eduardo', 'kadu.jpg', 'carlos@gestclass.com', '1234', '2002.04.23', 1);
INSERT INTO `admin` (nome, foto, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('Eric Veludo', 'eric.jpg', 'eric@gestclass.com', '1234', '2002.04.07', 1);
INSERT INTO `admin` (nome, foto, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('Hector Lima', 'hector.jpg', 'hector@gestclass.com', '1234', '1994.09.27', 1);
INSERT INTO `admin` (nome, foto, email, senha, data_nascimento, fk_id_tipo_usuario_admin) VALUES ('Monique Correia', 'monique.jpg', 'monique@gestclass.com', '1234', '2002.08.24', 1);


/*	-	SELECTs 	-	*/

SELECT * FROM turno;

SELECT * FROM turma;

SELECT * FROM tipo_usuario;

SELECT * FROM disciplina;

SELECT * FROM escola;

SELECT * FROM professor;

SELECT * FROM turmas_professor;

SELECT * FROM disciplinas_professor;

SELECT * FROM diretor;

SELECT * FROM secretario;

SELECT * FROM aluno;

SELECT * FROM boletim_aluno;

SELECT * FROM chamada_aluno;

SELECT * FROM responsavel;

SELECT * FROM professor;

SELECT * FROM secretario;

SELECT * FROM `admin`;

SELECT * FROM contato;

/*			- Códigos anotações Eric

	SELECT COUNT(nota) FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = 1 AND fk_ra_aluno_boletim_aluno = 0;

	SELECT SUM(nota) FROM boletim_aluno WHERE fk_id_disciplina_boletim_aluno = 1 AND fk_ra_aluno_boletim_aluno = 0;

	SELECT fk_id_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_turma_professor_disciplinas_professor = 16 AND fk_id_disciplina_professor_disciplinas_professor = 5;

	SELECT fk_id_disciplina_professor_disciplinas_professor FROM disciplinas_professor WHERE fk_id_turma_professor_disciplinas_professor = 16;

*/
/*DROP DATABASE GestClass;*/