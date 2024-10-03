<?php 
    class Eskaera{
        private $id;
        private $bezeroa_id;
        private $produktua_id;
        private $kantitatea;
        private $eskaera_data;

        public function __construct($id = null, $bezeroa_id = null, $produktua_id = null , $kantitatea = null , $eskaera_data = null) {
            $this->id = $id;
            $this->bezeroa_id = $bezeroa_id;
            $this->produktua_id = $produktua_id;
            $this->kantitatea = $kantitatea;
            $this->eskaera_data = $eskaera_data;
        }
    
        // Getters
        public function getId() {
            return $this->id;
        }
    
        public function getBezeroaId() {
            return $this->bezeroa_id;
        }
    
        public function getProduktuaId() {
            return $this->produktua_id;
        }
    
        public function getKantitatea() {
            return $this->kantitatea;
        }
    
        public function getEskaeraData() {
            return $this->eskaera_data;
        }
    
        // Setters
        public function setId($id) {
            $this->id = $id;
        }
    
        public function setBezeroaId($bezeroa_id) {
            $this->bezeroa_id = $bezeroa_id;
        }
    
        public function setProduktuaId($produktua_id) {
            $this->produktua_id = $produktua_id;
        }
    
        public function setKantitatea($kantitatea) {
            $this->kantitatea = $kantitatea;
        }
    
        public function setEskaeraData($eskaera_data) {
            $this->eskaera_data = $eskaera_data;
        }

        //DB
        public function getEskaerak($userID){
            // Asegúrate de que $pdo es tu instancia de PDO
            global $pdo;

            $userID = htmlspecialchars($userID);
            
            // Preparar y ejecutar la consulta
            $stmt = $pdo->prepare("SELECT * FROM eskaerak WHERE bezero_id = :id");
            $stmt->bindParam(':id', $userID);
            $stmt->execute();

            $eskaerak = [];
            if ($stmt->rowCount() > 0) {
                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $eskaera = new Eskaera(
                        $data['id'], 
                        $data['bezero_id'], 
                        $data['produktua_id'], 
                        $data['kantitatea'], 
                        $data['eskaera_data']
                    );

                    $eskaerak[] = $eskaera;
                }
                return $eskaerak;
            } else {
                return null;
            }
        }
    }
?>