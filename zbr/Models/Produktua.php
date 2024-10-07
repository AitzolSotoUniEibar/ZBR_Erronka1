<?php 

    class Produktua{
        private $id;
        private $izena;
        private $prezioa;

        public function __construct($id = null, $izena = null, $prezioa = null) {
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

        //DB
        /**Produktu bat ID bidez bilatzeko funtzioa */
        public function getProduktuaById($produktuaId) {
            global $pdo;
    
            $stmt = $pdo->prepare("SELECT * FROM produktuak WHERE id = :id");
            $stmt->bindParam(':id', $produktuaId);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Produktua($data['id'], $data['izena'],$data['prezioa']);
            }
            return null;
        }

        /**Produktu guztiak kontsultatzeko funtzioa*/
        public function getProduktuGuztiak(){
            global $pdo;

            $stmt = $pdo->prepare("SELECT * FROM produktuak");
            $stmt->execute();

            $produktuak = [];
            if ($stmt->rowCount() > 0) {
                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $produktua = new Produktua(
                        $data['id'],
                        $data['izena'], 
                        $data['prezioa'], 
                    );
                    $produktuak[] = $produktua;
                }
                return $produktuak;
            } else {
                return null;
            }
        }

        /**Produktua ezabatzeko funtzioa*/
        public function deleteProduktua($id) {
            global $pdo;
            
            $stmt = $pdo->prepare("DELETE FROM produktuak WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            return $stmt->execute();
        }

        /**Produktu baten informazioa eguneratzeko funtzioa */
        public function produktuaEguneratu($id,$produktua){
            global $pdo;

            $sql = "UPDATE produktuak SET izena = :izena, prezioa = :prezioa WHERE id = :id";

            $stmt = $pdo->prepare($sql);
        
            $stmt->bindParam(':izena', $produktua['izena'], PDO::PARAM_STR);
            $stmt->bindParam(':prezioa', $produktua['prezioa'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();
        }
    }

?>