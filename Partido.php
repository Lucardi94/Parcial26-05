<?php
    class Partido{
        //Atributos
        private $idPartido;
        private $fecha;
        private $cantidadGolesE1;
        private $cantidadGolesE2;
        private $coleccionObjEquipo;

        //Contructor
        public function __construct($idPar, $fec, $canGolE1, $canGolE2, $colObjEqu){
            $this->idPartido = $idPar;
            $this->fecha = $fec;
            $this->cantidadGolesE1 = $canGolE1;
            $this->cantidadGolesE2 = $canGolE2;
            $this->coleccionObjEquipo = $colObjEqu;
        }

        //Metodos de Acceso 
        public function getIdPartido(){
            return $this->idPartido;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getCantidadGolesE1(){
            return $this->cantidadGolesE1;
        }        
        public function getCantidadGolesE2(){
            return $this->cantidadGolesE2;
        }
        public function getColeccionObjEquipo(){
            return $this->coleccionObjEquipo;
        } 

        public function setIdPartido($nIdPar){
            $this->idPartido = $nIdPar;
        }
        public function setFecha($nFec){
            $this->fecha = $nFec;
        }
        public function setCantidadGolesE1($nCanGolE1){
            $this->cantidadGolesE1 = $nCanGolE1;
        }
        public function setCantidadGolesE2($nCanGolE2){
            $this->cantidadGolesE2 = $nCanGolE2;
        }
        public function setColeccionObjEquipo($nColObjEqu){
            $this->coleccionObjEquipo = $nColObjEqu;
        }

        //Funciones
        public function resultadoPartido(){
            if ($this->getCantidadGolesE1() > $this->getCantidadGolesE2()) return 0;
            elseif ($this->getCantidadGolesE1() < $this->getCantidadGolesE2()) return 1;
            else return 2;
        }

        //ToString
        public function __toString(){
            return "Partido: ".$this->getIdPartido().
            "\nFecha: ".$this->getFecha()->format('Y-m-d').
            "\n".$this->getColeccionObjEquipo()[0]->getNombre()." ".$this->getCantidadGolesE1().
            " - ".$this->getColeccionObjEquipo()[1]->getNombre()." ".$this->getCantidadGolesE2();
        }
    }