-- Create database
create database system_services;

use system_services;

-- Create users table
create table users (
	id bigint not null auto_increment primary key ,
	name varchar(100) not null ,
	last_name varchar(100),
	email varchar(100) not null,
	created_at timestamp,
	updated_at timestamp,
	deleted_at timestamp,
	unique key (email)
);

-- Seed users table
insert into users (name, last_name, email, created_at) values 
('John', 'Doe', 'johndoe@example.com', now()),
('Lorem', 'Ipsum', 'loremipsum@example.com', now());


-- Create roles table
CREATE TABLE roles (
  id bigint not null auto_increment primary key,
  name varchar(100) not null,
  created_at timestamp,
  updated_at timestamp,
  deleted_at timestamp,
  unique key (name)
);

-- Seed roles table
insert into roles (name, created_at) values 
('Asesor', now()),
('Ejecutivo', now());

-- Create role_users table
CREATE TABLE role_users (
  id bigint not null auto_increment primary key,
  user_id bigint not null,
  role_id bigint not null,
  created_at timestamp,
  updated_at timestamp,
  deleted_at timestamp,
  foreign key (user_id) REFERENCES users(id),
  foreign key (role_id) REFERENCES roles(id)
);

-- Assign roles to users
insert into role_users (user_id, role_id, created_at) values 
(1, 1, now()),
(2, 2, now());

-- Check roles assigned to users
select u.id as user_id, u.name, u.email, r.name as role_name
from users u
join role_users ru on u.id = ru.user_id
join roles r on ru.role_id = r.id

-- Create clients table
CREATE TABLE clients (
  id bigint not null auto_increment primary key,
  name varchar(255) not null,
  type enum('Empresa o Negocio', 'Instituci�n Educativa'),
  platform boolean default false,
  catalog boolean default false,
  content boolean default false,
  other boolean default false,
  adviser_id bigint not null,
  executive_id bigint not null,
  created_at timestamp,
  updated_at timestamp,
  deleted_at timestamp,
  foreign key (adviser_id) REFERENCES users(id),
  foreign key (executive_id) REFERENCES users(id)
);

-- Seed clients table
INSERT INTO clients (name, `type`, platform, `catalog`, content, other, adviser_id, executive_id, created_at) values
('Alpha', 'Empresa o Negocio', 0, 1, 0, 0, 1, 2, now());

-- select clients and its advisers and executives
select c.*, ad.name as adviser, ex.name as executive from clients c
inner join users ad on ad.id = c.adviser_id 
inner join users ex on ex.id = c.executive_id;

