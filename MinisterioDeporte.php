<?php
    class MinisterioDeporte {
        /***
         * Funciones:
         *  - public function registrarTorneo($ColPartidos,$tipo,$ArrayAsociativo)
         */
        //Atributos
        private $anio;
        private $colObjTorneo;

        //Contructor
        public function __construct($ani, $colObjTor){
            $this->anio = $ani;
            $this->colObjTorneo = $colObjTor;
        }

        //Metodos de Acceso
        public function getAnio(){
            return $this->anio;
        }
        public function getColObjTorneo(){
            return $this->colObjTorneo;
        }

        public function setAnio($nAni){
            $this->anio = $nAni;
        }
        public function setColObjTorneo($nColObjTor){
            $this->colObjTorneo = $nColObjTor;
        }

        //Funciones       
        public function registrarTorneo($ColPartidos,$tipo,$ArrayAsociativo){
            if ($tipo == "provincial"){
                $objTorneo = new TorneoProvincial($ArrayAsociativo["id"], $ArrayAsociativo["premio"], $ColPartidos, $ArrayAsociativo["nombreLocalidad"], $ArrayAsociativo["nombreProvincia"]);
            } else $objTorneo = new TorneoNacional($ArrayAsociativo["id"], $ArrayAsociativo["premio"], $ColPartidos, $ArrayAsociativo["nombreLocalidad"]);
            $listaTorneo = $this->getColObjTorneo();
            array_push($listaTorneo, $objTorneo);
            $this->setColObjTorneo($listaTorneo);
            return $objTorneo;
        }

        public function otorgarPremioTorneo($idTorneo){
            $i = 0;
            $encontro = FALSE;
            while($i < count($this->getColObjTorneo()) && !$encontro){
                $torneoAct = $this->getColObjTorneo()[$i];
                if ($torneoAct->getIdTorneo() == $idTorneo){
                    $campeon = array ("equipo"=>$torneoAct->obtenerEquipoGanadorTorneo()["equipo"],"premio"=>$torneoAct->obtenerPremioTorneo());
                    $encontro = TRUE;
                }
                $i++;
            }
            return $campeon;
        }

        //ToString
        public function textoTorneo(){
            $txt = "";
            foreach ($this->getColObjTorneo() as $torneo){
                $txt.=$torneo."\n----- ------ ------ ------\n";
            }
            return $txt."\n";
        }
        public function __toString(){
            return "Año ".$this->getAnio().
            "\n".$this->textoTorneo();
        }
    }