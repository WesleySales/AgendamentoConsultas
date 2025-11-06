<?php

include_once '../conexao/Conexao.php';

class MedicoRepository {
    private $connection;

    public function __construct($connection) {
        $this->connection = Conexao::getConexao();
    }

    public static function create($nome, $cpf) {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("INSERT into medicos(nome, crm, especialidade_id) values (?, ?, ?");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $cpf);
        $stmt->execute();
   
        if(!$stmt) {
            return "Erro ao cadastrar medico.";
        }

        return "Médico cadastrado com sucesso.";
    }

    public static function findAll() {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("select m.id,m.nome, m.crm, e.nome_especialidade as especialidade
                                from medicos m
                                join especialidades e on m.especialidade_id = e.id");
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public static function findById($id) {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return "Paciente encontrado: " . $result;
    }

    public static function findEspecialidades() {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("SELECT * FROM especialidades");
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public static function delete($id) {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("DELETE FROM pacientes WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();

        if(!$stmt) {
            return "Erro ao deletar paciente.";
        }

        return "Paciente deletado com sucesso.";
    }
}