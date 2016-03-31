drop table if exists deportes cascade;

create table deportes (
    id bigserial constraint pk_deportes primary key,
    nombre varchar(50) not null constraint uq_deportes_nombre unique
);
insert into deportes(nombre)
    values('Fútbol'),
          ('Balonecesto'),
          ('Tenis'),
          ('E-sport'),
          ('Mas deportes');

drop table if exists competiciones cascade;

create table competiciones (
    id bigserial constraint pk_competiciones primary key,
    nombre varchar(50) not null,
    id_deporte  bigint not null constraint fk_competiciones_deportes
                    references deportes(id)
                    on delete no action
                    on update cascade
); 

insert into competiciones(nombre,id_deporte)
    values('Liga BBVA',1),
         ('Liga Adenlante',1);

drop table if exists participantes cascade;

create table participantes (
    id bigserial constraint pk_participantes primary key,
    nombre varchar(50) not null,
    id_deporte  bigint not null constraint fk_participante_deportes
                    references deportes(id)
                    on delete no action
                    on update cascade
);

insert into participantes(nombre,id_deporte)
    values('Real Madrid',1),
         ('FC Barcelona',1);

drop table if exists eventos cascade;

create table eventos (
    id bigserial constraint pk_eventos primary key,
    id_participante_casa  bigint not null constraint fk_eventos_participante_casa
                    references participantes(id)
                    on delete no action
                    on update cascade,
    id_participante_visitante  bigint not null constraint fk_eventos_participante_visitante
                    references participantes(id)
                    on delete no action
                    on update cascade,                
    id_deporte  bigint not null constraint fk_eventos_deportes
                    references deportes(id)
                    on delete no action
                    on update cascade,
    resultado_casa  numeric(3),                
    resultado_visitante  numeric(3),
    fecha_hora  timestamp not null
);

insert into eventos (id_participante_casa,id_participante_visitante,id_deporte,fecha_hora)
    values(2,1,1,'2016-4-2 20:30:00'::timestamp);