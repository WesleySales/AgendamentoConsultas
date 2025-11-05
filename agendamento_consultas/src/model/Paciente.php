<?php

    class User {
        private $id;
        private $nome;
        private $cpf;

        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
            $this->cpf = $cpf;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }
        
        public function getCpf() {
            return $this->cpf;
        }

    }

?>