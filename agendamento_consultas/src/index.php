<?php

print_r("Sistema de Agendamento de Consultas Médico");

include_once './conexao/Conexao.php';
include_once './repositories/PacienteRepository.php';

$pdo = Conexao::getConexao();

$pacientes = PacienteRepository::findAll();

// PacienteRepository::create("João Silva", "123.456.789-00");
$paciente = PacienteRepository::findById(1);

print_r($paciente);

