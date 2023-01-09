<?php

    class Usuario {
        private String $nome;
        private String $email;
        private String $senha;
        private ?int $id = null;

        public function __construct($nome, $email, $senha) {
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function getNome() {
            return $this->nome;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getSenha() {
            return $this->senha;
        }
        
        public function getId() {
            return $this->id;
        }

        public function setNome(String $nome) {
            $this->nome = $nome;
        }
        
        public function setEmail(String $email) {
            $this->email = $email;
        }
        
        public function setSenha(String $senha) {
            $this->senha = $senha;
        }

        public function setId(int $id) {
            $this->id = $id;
        }
    }

?>