<?php

    class User {
        private $id;
        private $nome;
        private $crm;
        private $especialidade_id;

        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
            $this->crm = $crm;
            $this->especialidade_id = $especialidade_id;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }
        
        public function getCrm() {
            return $this->crm;
        }

        public function getEspecialidadeId() {
            return $this->especialidade_id;
        }

    }

?>