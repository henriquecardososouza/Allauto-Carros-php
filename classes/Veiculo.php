<?php

    class Veiculo {
        private String $modelo;
        private String $marca;
        private String $preco;
        private String $img_slider;
        private String $img_page_veiculo;
        private ?int $id = null;

        public function __construct($params) {
            $this->modelo = $params[0];
            $this->marca = $params[1];
            $this->preco = $params[2];
            $this->img_slider = $params[3];
            $this->img_page_veiculo = $params[4];
        }

        public function getModelo() {
            return $this->modelo;
        }
        
        public function getMarca() {
            return $this->marca;
        }
        
        public function getPreco() {
            return $this->preco;
        }

        public function getImgSlider() {
            return $this->img_slider;
        }

        public function getImgPageVeiculo() {
            return $this->img_page_veiculo;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getAllAtributes() {
            $atributes = [$this->id, $this->modelo, $this->marca, $this->preco, $this->img_slider, $this->img_page_veiculo];
            return $atributes;
        }

        public function setModelo(String $modelo) {
            $this->modelo = $modelo;
        }
        
        public function setMarca(String $marca) {
            $this->marca = $marca;
        }
        
        public function setPreco(String $preco) {
            $this->preco = $preco;
        }

        public function setImgSlider(String $path) {
            $this->img_slider = $path;
        }

        public function setImgPageVeiculo(String $path) {
            $this->img_page_veiculo = $path;
        }

        public function setId(int $id) {
            $this->id = $id;
        }
    }

?>