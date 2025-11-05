<?php

    class User {
        private $id;
        private $medico_id;
        private $paciente_id;
        private $data_consulta;
        private $horario;
        private $observacao;
        private $status_agendamento;

        public function __construct() {
            $this->medico_id = $medico_id;
            $this->paciente_id = $paciente_id;  
            $this->data_consulta = $data_consulta;
            $this->horario = $horario;
            $this->observacao = $observacao;
            $this->status_agendamento = $status_agendamento;
        }

        public function getId() {
            return $this->id;
        }
        public function getMedicoId() {
            return $this->medico_id;
        }
        public function getPacienteId() {
            return $this->paciente_id;
        }
        public function getDataConsulta() {
            return $this->data_consulta;
        }
        public function getHorario() {
            return $this->horario;
        }
        public function getObservacao() {
            return $this->observacao;
        }
        public function getStatusAgendamento() {
            return $this->status_agendamento;
        }

    }

?>