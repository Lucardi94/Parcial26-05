<?php
    class Equipo{
        //Atributos
        private $nombre;
        private $nombreCapitan;
        private $cantidadJugadores;
        private $objCategoria;
        
        //Contructor
        public function __construct($nom, $nomCap, $canJug, $objCat){
            $this->nombre = $nom;
            $this->nombreCapitan = $nomCap;
            $this->cantidadJugadores = $canJug;
            $this->objCategoria = $objCat;
        }

        //Metodos de Acceso
        public function getNombre(){
            return $this->nombre;
        }
        public function getNombreCapitan(){
            return $this->nombreCapitan;
        }
        public function getCantidadJugadores(){
            return $this->cantidadJugadores;
        }
        public function getObjCategoria(){
            return $this->objCategoria;
        }

        public function setNombre($nNom){
            $this->nombre = $nNom;
        }
        public function setNombreCapitan($nNomCap){
            $this->nombreCapitan = $nNomCap;
        }
        public function setCantidadJugadores($nCanJug){
            $this->cantidadJugadores = $nCanJug;
        } 
        public function setObjCategoria($nObjCat){
            $this->objCategoria = $nObjCat;
        }

        //ToString
        public function __toString(){
            return "Equipo: ". $this->getNombre().
            "\nCapitan: ".$this->getNombreCapitan().
            "\nN° de jugadores: ".$this->getCantidadJugadores().
            "\nCategoria: ".$this->getObjCategoria();
        }
    }