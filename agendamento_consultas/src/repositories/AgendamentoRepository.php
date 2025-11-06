<?php
include_once '../conexao/Conexao.php';

class AgendamentoRepository {
    private $connection;

    public function __construct($connection) {
        $this->connection = Conexao::getConexao();
    }

    public static function create($medico_id, $paciente_id , $data_consulta, $horario) {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("INSERT into agendamentos (medico_id, paciente_id, data_consulta, horario) values
                             (?, ?, ?, ?)");
        $stmt->bindParam(1, $medico_id);
        $stmt->bindParam(2, $paciente_id);
        $stmt->bindParam(3, $data_consulta);
        $stmt->bindParam(4, $horario);
        $stmt->execute();
   
        if(!$stmt) {
            return "Erro ao realizar agendamento.";
        }

        return "Agendamento realizado com sucesso.";
    }

    public static function findAll() {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("select m.nome as medico, p.nome as paciente, a.data_consulta as data, a.horario, st.nome_status as status
                from agendamentos a
                join medicos m on a.medico_id = m.id
                join pacientes p on a.paciente_id = p.id
                join status_agendamento st on a.status_agendamento = st.id");
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }

    public static function findByMedico($id) {
        $pdo = Conexao::getConexao();
        $stmt = $pdo->prepare("SELECT * FROM agendamentos WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
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