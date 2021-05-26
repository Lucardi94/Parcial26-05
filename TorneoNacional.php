<?php
    class TorneoNacional extends Torneo {
        //Contructor
        public function __construct($idTor, $pre, $colObjPar, $nomLoc){
            parent::__construct($idTor, $pre, $colObjPar, $nomLoc);
        }

        //Funciones
        public function obtenerPremioTorneo(){
            $premio = parent::obtenerPremioTorneo();
            $ganador = parent::obtenerEquipoGanadorTorneo();
            return $premio + (0.1 * $premio * $ganador["equipo"]->getCantidadJugadores());            
        }
    }