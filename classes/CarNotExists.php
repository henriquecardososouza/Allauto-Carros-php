<?php

    class CarNotExists {
        private String $modelo;
        private String $marca;
        private String $preco;
        private String $img_slider;
        private ?int $id = null;

        public function __construct() {
            $this->modelo = "Aguardando";
            $this->marca = "";
            $this->preco = "";
            $this->img_slider = "img/products/notFound/slider.webp";
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
        
        public function getId() {
            return $this->id;
        }

        public function getAllAtributes() {
            $atributes = [$this->id, $this->modelo, $this->marca, $this->preco, $this->img_slider];
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

        public function setId(int $id) {
            $this->id = $id;
        }
    }

?>