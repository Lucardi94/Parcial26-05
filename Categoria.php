<?php
    class Categoria{
        //Atributos
        private $idCategoria;
        private $descripcion;

        //Constructor
        public function __construct($idCat, $des){
            $this->idCategoria = $idCat;
            $this->descripcion = $des;
        }       

        //Metodos de Acceso
        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setIdCategoria($nIdCat){
            $this->idCategoria = $nIdCat;
        }
        public function setDescripcion($nDes){
            $this->descripcion = $nDes;
        }
        
        //ToString
        public function __toString(){
            return $this->getIdCategoria()." - ".$this->getDescripcion();
        }
    }