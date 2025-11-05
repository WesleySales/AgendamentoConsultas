
create DATABASE agendamento_consultas;
use agendamento_consultas;

create table medicos(
	id int primary key auto_increment,
    nome varchar(40),
    crm varchar(14),
    especialidade_id int,
    
    foreign key (especialidade_id) references especialidades(id)
);

create table especialidades(
	id int primary key auto_increment,
    nome_especialidade varchar(40)
);

create table pacientes(
	id int primary key auto_increment,
    nome varchar(40),
    cpf varchar(11)
);

create table agendamentos(
	id int primary key auto_increment,
    medico_id int,
    paciente_id int,
    data_consulta date,
    horario time,
    observacao varchar(150),
    status_agendamento int default 1,
    
    foreign key (medico_id) references medicos(id),
    foreign key (paciente_id) references pacientes(id),
    foreign key (status_agendamento) references status_agendamento(id)
);

create table status_agendamento(
	id int primary key auto_increment,
    nome_status varchar(50)
);

insert into especialidades (nome_especialidade) values
("Ortopedista"),
("Ginecologista");

insert into medicos(nome, crm, especialidade_id) values
("Joao Pedro", "123456",1),
("Antonia Silva", "222333222",2),
("Joao Pedro", "123456",2);

insert into pacientes(nome, cpf) values
("Italo Sales", "111111"),
("Antonia Silva", "555555"),
("Joao Pedro", "669878");
    
insert into agendamentos (medico_id, paciente_id, data_consulta, horario) values
(1,2,'2025-12-20',12),
(2,3,'2025-08-20',13),
(3,1,'2025-12-20',12);

insert into status_agendamento (nome_status) values
('Ativo'), ('Cancelado');

select m.nome, p.nome, a.data_consulta, a.horario, st.nome_status as status_agendamento
from agendamentos a
join medicos m on a.medico_id = m.id
join pacientes p on a.paciente_id = p.id
join status_agendamento st on a.status_agendamento = st.id

use agendamento_consultas
