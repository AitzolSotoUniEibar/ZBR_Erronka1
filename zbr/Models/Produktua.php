<?php 

    class Produktua{
        private $id;
        private $izena;
        private $prezioa;

        public function __construct($id, $izena, $prezioa) {
            $this->id = $id;
            $this->izena = $izena;
            $this->prezioa = $prezioa;
        }
    
        // Getters
        public function getId() {
            return $this->id;
        }
    
        public function getIzena() {
            return $this->izena;
        }
    
        public function getPrezioa() {
            return $this->prezioa;
        }
    
        // Setters
        public function setId($id) {
            $this->id = $id;
        }
    
        public function setIzena($izena) {
            $this->izena = $izena;
        }
    
        public function setPrezioa($prezioa) {
            $this->prezioa = $prezioa;
        }
    }

?>