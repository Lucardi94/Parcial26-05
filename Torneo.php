<?php
    class Torneo {
        /***
         * Funciones:
         *  - obtenerEquipoGanadorTorneo()
         *      + resultadoTorneo()
         *          - sumarPartidoGanado($nombre, $listaResultadoTorneo)
         *          - sumarGoles($nombre, $listaResultadoTorneo, $goles)
         *  - obtenerPremioTorneo()
        */
        //Atributos
        private $idTorneo;
        private $premio;
        private $colObjPartidos;
        private $nombreLocalidad;

        //Contructor
        public function __construct($idTor, $pre, $colObjPar, $nomLoc){
            $this->idTorneo = $idTor;
            $this->premio = $pre;
            $this->colObjPartidos = $colObjPar;
            $this->nombreLocalidad = $nomLoc;
        }

        //Metodos de Acceso
        public function getIdTorneo(){
            return $this->idTorneo;
        }        
        public function getPremio(){
            return $this->premio;
        }        
        public function getColObjPartidos(){
            return $this->colObjPartidos;
        }
        public function getNombreLocalidad(){
            return $this->nombreLocalidad;
        }

        public function setIdTorneo($nIdTor){
            $this->idTorneo = $nIdTor;
        }
        public function setPremio($nPre){
            $this->premio = $nPre;
        }
        public function setColObjPartidos($nColObjPar){
            $this->colObjPartidos = $nColObjPar;
        }
        public function setNombreLocalidad($nNomLoc){
            $this->nombreLocalidad = $nNomLoc;
        }

        //Funciones
        public function sumarGoles($equipo, $listaResultadoTorneo, $goles){
            /***
             * Recorre la lista (que cuenta los equipos y sus partidos ganados).
             * Si este equipo ya aparece en la lista, le suma un partido ganado.
             * Si este equipo no aparece en la lista, crea en la lista este equipo con los goles.
             * Retorna la lista actualizada.
            */
            $i = 0;
            $encontro = FALSE;
            while ($i < count($listaResultadoTorneo) && !$encontro){
                if ($listaResultadoTorneo[$i]["equipo"]->getNombre() == $equipo->getNombre()){
                    $encontro = TRUE;
                    $listaResultadoTorneo[$i]["goles"] += $goles;
                }
                $i++;
            }
            if (!$encontro){
                array_push($listaResultadoTorneo, array ("equipo"=>$equipo, "partido"=>0, "goles"=>$goles));
            }
            return $listaResultadoTorneo;
        }

        public function sumarPartidoGanado($equipo, $listaResultadoTorneo){
            /***
             * Recorre la lista (que cuenta los equipos y sus partidos ganados).
             * Si este equipo ya aparece en la lista, le suma un partido ganado.
             * Si este equipo no aparece en la lista, crea en la lista este equipo con el partido ganado.
             * Retorna la lista actualizada.
            */
            $i = 0;
            $encontro = FALSE;
            while ($i < count($listaResultadoTorneo) && !$encontro){
                if ($listaResultadoTorneo[$i]["equipo"]->getNombre() == $equipo->getNombre()){
                    $encontro = TRUE;
                    $listaResultadoTorneo[$i]["partido"]++;
                }
                $i++;
            }
            return $listaResultadoTorneo;
        }

        public function resultadoTorneo(){
            /***
             * Retorna un arreglo asosiativo con los equipos y sus partidos ganados.
             * Evalua el resultado del partido y suma segun el equipo ganador.
             * Suma la cantidad de goles de los equipos. 
            */
            $listaResultadoTorneo = array ();
            foreach ($this->getColObjPartidos() as $partido){
                $listaResultadoTorneo = $this->sumarGoles($partido->getColeccionObjEquipo()[0], $listaResultadoTorneo, $partido->getCantidadGolesE1());
                $listaResultadoTorneo = $this->sumarGoles($partido->getColeccionObjEquipo()[1], $listaResultadoTorneo, $partido->getCantidadGolesE2());
                switch ($partido->resultadoPartido()) {
                    case 0:
                        $listaResultadoTorneo = $this->sumarPartidoGanado($partido->getColeccionObjEquipo()[0], $listaResultadoTorneo);
                        break;
                    case 1:
                        $listaResultadoTorneo = $this->sumarPartidoGanado($partido->getColeccionObjEquipo()[1], $listaResultadoTorneo);
                        break;
                }
            }
            return $listaResultadoTorneo;
        }

        public function obtenerEquipoGanadorTorneo(){
            /***
             * Retorna un arreglo asociativo con el equipo ganador, con sus partidos ganados y goles.
             * Si los equipos tienen misma cantidad de partidos ganados, se recurre a cual metio mas goles.
             */
            $listaResultadoTorneo = $this->resultadoTorneo();
            $ganador = array ("equipo"=>"", "partido"=>0, "goles"=>0);
            foreach ($listaResultadoTorneo as $equipo){
                if ($equipo["partido"] > $ganador["partido"] || ($equipo["partido"] == $ganador["partido"] && $equipo["goles"] > $ganador["goles"]) ){
                    $ganador = $equipo;
                }
            }
            return $ganador;


        }

        public function obtenerPremioTorneo(){
            return $this->getPremio();            
        }

        //ToString
        public function textoEquipos(){
            $txt = "Partidos: ";
            foreach ($this->getColObjPartidos() as $partido){
                $txt.="\n".$partido."\n-----       ------\n";
            }
            return $txt;
        }
        public function __toString(){
            return "Torneo: ".$this->getIdTorneo().
            "\nPremio: ".$this->getPremio()."$".
            "\nLocalidad: ".$this->getNombreLocalidad().
            "\n".$this->textoEquipos();

        }
    }