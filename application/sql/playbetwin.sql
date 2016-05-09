/**************************************************
                    Usuarios
**************************************************/
drop table if exists roles cascade;

create table roles (
    id bigserial constraint pk_roles primary key,
    descripcion varchar(15)
);

insert into roles (descripcion)
    values ('Administrador'),
            ('Usuario');

drop table if exists usuarios cascade;

create table usuarios(
    id                  bigserial             constraint pk_usuarios primary key,
    nick             varchar(100) not null constraint uq_usuarios_usuario unique,
    nombre              varchar(200) not null ,
    password            char(60)     not null constraint ck_password_valida
                                              check (length(password) = 60),
    email               varchar(100) not null,
    coins               numeric(10)      not null default 5000,
    registro_verificado bool         not null default false,
    rol_id              bigint       not null default 2 constraint fk_usuarios_roles
                                                        references roles(id)
                                                        on delete no action
                                                        on update cascade,
    activado            bool         not null default true
);


insert into usuarios (nick,nombre,password, email, registro_verificado,rol_id)
        values ('admin', 'Sergio Alcántara', crypt('sergio', gen_salt('bf')), 'sergio.alcantara.1992@gmail.com', true, 1),
                ('sergio', 'sergio', crypt('alcantara', gen_salt('bf')),'sergio.alcantara@iesdonana.org', true, 2),
                ('abrahan', 'abrahan', crypt('abrahan', gen_salt('bf')),'abrahan.alcantara@iesdonana.org', true, 2);

drop table if exists ci_sessions cascade;

create table "ci_sessions" (
    "id" varchar(40) not null primary key,
    "ip_address" varchar(45) not null,
    "timestamp" bigint default 0 not null,
    "data" text default '' not null
);

drop view if exists v_usuarios_valido cascade;

create view v_usuarios_valido as
    select *
    from usuarios
    where registro_verificado = true;

create index "ci_sessions_timestamp" on "ci_sessions" ("timestamp");

drop view if exists v_usuarios_roles cascade;

create view v_usuarios_roles as
    select usuarios.*, descripcion
    from
    usuarios join roles
    on
    usuarios.rol_id = roles.id;

/**************************************************
            Apuesta e información
**************************************************/

drop table if exists deportes cascade;

create table deportes (
    id bigserial constraint pk_deportes primary key,
    nombre varchar(50) not null constraint uq_deportes_nombre unique,
    activado boolean default true
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
                    on update cascade,
    activado boolean default true
); 

insert into competiciones(nombre,id_deporte)
    values('Liga BBVA',1),
         ('Liga Adenlante',1),
         ('NBA',2);

drop table if exists participantes cascade;

create table participantes (
    id      bigserial constraint pk_participantes primary key,
    nombre varchar(50) not null,
    id_deporte  bigint not null constraint fk_participante_deportes
                    references deportes(id)
                    on delete set null
                    on update cascade,
    activado boolean default true
);

insert into participantes(nombre,id_deporte)
    values('Real Madrid',1),
         ('FC Barcelona',1),
         ('Real Betis',1),
         ('Sevilla FC',1),
         ('Pelicans', 2),
         ('Nets',2);

drop view if exists v_participantes cascade;

create view v_participantes as 
select  p.id as id , p.nombre as participante, d.nombre as deporte, p.activado as activado   
    from participantes as p join deportes as d on p.id_deporte=d.id
    where p.activado=true;

drop table if exists eventos cascade;

create table eventos (
    id      bigserial constraint pk_eventos primary key,
    id_participante_casa  bigint not null constraint fk_eventos_participante_casa
                    references participantes(id)
                    on delete no action
                    on update cascade,
    id_participante_visitante  bigint not null constraint fk_eventos_participante_visitante
                    references participantes(id)
                    on delete no action
                    on update cascade,
    id_competicion bigint not null constraint fk_eventos_competiciones
                    references competiciones(id)
                    on delete no action
                    on update cascade,                 
    resultado_casa  numeric(3),                
    resultado_visitante  numeric(3),
    fecha_hora  timestamp not null,
    activado boolean default true
);

insert into eventos (id_participante_casa,id_participante_visitante,id_competicion,fecha_hora,resultado_casa , resultado_visitante)
    values(2,1,1,'2016-04-02 20:30:00'::timestamp, 1, 2),
          (3,4,1,'2016-05-06 20:30:00'::timestamp, NULL, NULL),
          (2,3,1,'2016-06-05 20:30:00'::timestamp, NULL, NULL),
          (5,6,3,'2016-04-05 20:30:00'::timestamp, 88,80);


drop view if exists v_eventos_participantes cascade;

create view v_eventos_participantes as 
select eventos.id as id , par1.nombre as participante_casa, par2.nombre as participante_visitante, 
resultado_casa, resultado_visitante, fecha_hora as fecha_completa ,  to_char(fecha_hora, 'HH24:MI DD/MM/YYYY') as fecha_hora, comp.nombre as competicion
    from eventos join participantes as par1 
    on  id_participante_casa = par1.id 
    join participantes as par2 
    on  id_participante_visitante = par2.id 
    join competiciones as comp 
    on id_competicion = comp.id;


/***********************************************************
                    Guardar apuestas
***********************************************************/

drop table if exists apuestas cascade;

create table apuestas (
    id      bigserial constraint pk_apuestas primary key,
    id_usuario bigint not null constraint fk_apuestas_usuario
                    references usuarios (id)
                    on delete no action
                    on update cascade,
    id_evento bigint not null constraint fk_apuestas_evento
                    references eventos(id)
                    on delete no action
                    on update cascade,
    pronostico      char(1) not null
);


insert into apuestas (id_usuario, id_evento, pronostico)
    values (1,1,'X'),
            (2,1,'1'),
            (3,1,'2');

/********************************************************************
                       Premios y publicidad
********************************************************************/

drop table if exists publicidades cascade;

create table publicidades (
    id bigserial constraint pk_publicidades primary key,
    nombre varchar (50) not null,
    url varchar (200) not null,
    activado boolean  default false,
    imagen boolean default false,
    coins numeric(10) not null
);


insert into publicidades (nombre, url, coins)
    values('betfair', 'https://www.betfair.es/es', 500 ),
          ('bwin', 'https://www.bwin.es/?wm=4456181&bsbd=1', 500),
          ('williamhill', 'http://sports.williamhill.es/bet_esp/es', 500),
          ('luckia', 'https://www.luckia.es/', 500),
          ('sportium', 'http://sports.sportium.es/es', 500),
          ('wanabet', 'https://www.wanabet.es/', 500);


drop table if exists premios cascade;

create table premios (
    id bigserial constraint pk_premios primary key,
    nombre varchar (50) not null,
    activado boolean  default false,
    imagen boolean default false,
    coins numeric(10) not null
);
