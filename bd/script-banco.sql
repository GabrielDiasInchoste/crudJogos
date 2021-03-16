create table Jogador (
	codJogador integer AUTO_INCREMENT not null,
	nome VARCHAR(50) not null,
  posicao VARCHAR(20) not null,
  idade integer not null,
  pais VARCHAR(50) not null,
	codTime integer not null,
	primary key (codJogador)
);
create table Estadio (
	codEstadio integer AUTO_INCREMENT not null,
	nome VARCHAR(50) not null,
  pais VARCHAR(50) not null,
	primary key (codEstadio)
);
create table Time (
	codTime integer AUTO_INCREMENT not null,
	nome VARCHAR(50) not null,
    pais VARCHAR(50) not null,
    codEstadio integer not null,
	primary key (codTime)
);
create table Jogo (
	codJogo integer AUTO_INCREMENT not null,
	codTime_A integer not null,
    codTime_B integer not null,
    codEstadio integer not null,
	campeonato VARCHAR(50) not null,
    gols_A integer not null,
    gols_b integer not null,
	primary key (codJogo)
);
ALTER TABLE Jogador ADD CONSTRAINT jogador_time_FK
	FOREIGN KEY (codTime)
	REFERENCES Time (codTime)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION;

ALTER TABLE Jogos ADD CONSTRAINT jogos_time_A_FK
	FOREIGN KEY (codTime_A)
	REFERENCES Time (codTime)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION;

ALTER TABLE Jogos ADD CONSTRAINT jogos_time_B_FK
	FOREIGN KEY (codTime_B)
	REFERENCES Time (codTime)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


insert into Estadio(codEstadio,nome,pais)values(1,'Beira Rio','Brasil');
insert into Estadio(codEstadio,nome,pais)values(2,'Santiago Bernabeu','Espanha');
insert into Estadio(codEstadio,nome,pais)values(3,'Camp Nou','Espanha');

insert into Time(codTime,codEstadio,nome,pais)values(1,1,'Internacional','Brasil');
insert into Time(codTime,codEstadio,nome,pais)values(2,2,'Real Madri','Espanha');
insert into Time(codTime,codEstadio,nome,pais)values(3,3,'Barcelona','Espanha');

insert into Jogador(codJogador,codTime,nome,posicao,idade ,pais )values(1,1,'Gabriel Dias','Goleiro','22','Brasil');
insert into Jogador(codJogador,codTime,nome,posicao,idade ,pais )values(2,2,'Cristiano Ronaldo','Atacante','34','Portugal');
insert into Jogador(codJogador,codTime,nome,posicao,idade ,pais )values(3,3,'Messi','Meia','30','Argentina');

insert into Jogo(codJogo,codTime_A,codTime_B,codEstadio,campeonato ,gols_A, gols_b )values(1,1,2,1,'Brasileiro','1','0');
insert into Jogo(codJogo,codTime_A,codTime_B,codEstadio,campeonato ,gols_A, gols_b)values(2,1,3,2,'Libertadores','2','1');
insert into Jogo(codJogo,codTime_A,codTime_B,codEstadio,campeonato ,gols_A, gols_b)values(3,2,3,3,'Espanhol','0','2');

Insert into usuario values(1,'Gabriel','175787@upf.br','senha');
Update usuario set senha = md5('senha') where id = 1;

-- drop table estadio;
-- drop table time;
-- drop table jogador;
-- drop table jogos;
-- drop table usuario;
