<?php
    class TorneoProvincial extends Torneo {
        //Atributos
        private $nombreProvincia;

        //Contructor
        public function __construct($idTor, $pre, $colObjPar, $nomLoc, $nomPro){
            parent::__construct($idTor, $pre, $colObjPar, $nomLoc);
            $this->nombreProvincia = $nomPro;
        }

        //Metodos de Acceso
        public function getNombreProvincia(){
            return $this->nombreProvincia;
        }

        public function setNombreProvincia($nNomPro){
            $this->nombreProvincia = $nNomPro;
        }

        //ToString
        public function __toString(){
            $text="\nProvincia: ".$this->getNombreProvincia();
            $text.= "\n".parent::__toString();
            return $text;
        }
    }