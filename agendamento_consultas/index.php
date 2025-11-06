<?php


include './src/conexao/Conexao.php';
include './src/repositories/PacienteRepository.php';
include './src/repositories/MedicoRepository.php';
include './src/repositories/AgendamentoRepository.php';

// $pacientes = PacienteRepository::findAll();

// print_r($pacientes); die();

include './src/view/home.php';
// include './src/view/Login.php';



