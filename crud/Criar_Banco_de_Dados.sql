

create table pessoa (
 id serial not null,
 nome varchar(50) not null,
 sobrenome varchar(50) not null,
 sexo char(1) not null,
 primary key(id)
);

insert into pessoa (nome,sobrenome,sexo) values ('João','da Silva','M');
insert into pessoa (nome,sobrenome,sexo) values ('Pedro','dos Santos','M');
insert into pessoa (nome,sobrenome,sexo) values ('Lucas','Almeida','M');
insert into pessoa (nome,sobrenome,sexo) values ('Paulo','de Carvalho','M');
insert into pessoa (nome,sobrenome,sexo) values ('Maria','Oliveira','F');



