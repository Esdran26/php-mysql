create table es_clientes( 
cli_id integer AUTO_INCREMENT primary key,
cli_nombre varchar(30)
);

create table es_pedidos(
ped_id integer AUTO_INCREMENT PRIMARY KEY, 
ped_nombre varchar(40), 
ped_descripcion varchar(50),
ped_cli_id integer,
constraint fk_ped_cli_id foreign key(ped_cli_id) references es_clientes(cli_id)
);



create table es_productos(
prod_id integer auto_increment primary key,
prod_nombre varchar(40),
prod_existencias integer,
prod_precio integer,
prod_descripcion varchar(100),
prod_ped_id integer,
constraint fk_prod_ped_id foreign key(prod_ped_id) references es_pedidos(ped_id)
);

create table es_contacto(
con_id integer AUTO_INCREMENT PRIMARY KEY, 
con_nombre varchar(40), 
con_descripcion varchar(50),
con_cli_id integer,
constraint fk_con_cli_id foreign key(con_cli_id) references es_clientes(cli_id)
);

