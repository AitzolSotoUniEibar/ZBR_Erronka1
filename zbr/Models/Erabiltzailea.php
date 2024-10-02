<?php 
    require 'konexioa.php';

    class Erabiltzailea{
        private $id;
        private $izena;
        private $abizena;
        private $rol;
        private $erabiltzaile_izena;
        private $pasahitza;

        // Constructor
        public function __construct($izena, $abizena, $rol, $erabiltzaile_izena, $pasahitza) {
            $this->izena = $izena;
            $this->abizena = $abizena;
            $this->rol = $rol;
            $this->erabiltzaile_izena = $erabiltzaile_izena;
            $this->pasahitza = $pasahitza;
        }

        // Getters
        public function getId() {
            return $this->id;
        }

        public function getIzena() {
            return $this->izena;
        }

        public function getAbizena() {
            return $this->abizena;
        }

        public function getRol() {
            return $this->rol;
        }

        public function getErabiltzaileIzena() {
            return $this->erabiltzaile_izena;
        }

        public function getPasahitza() {
            return $this->pasahitza;
        }

        // Setters
        public function setId($id) {
            $this->id = $id;
        }

        public function setIzena($izena) {
            $this->izena = $izena;
        }

        public function setAbizena($abizena) {
            $this->abizena = $abizena;
        }

        public function setRol($rol) {
            $this->rol = $rol;
        }

        public function setErabiltzaileIzena($erabiltzaile_izena) {
            $this->erabiltzaile_izena = $erabiltzaile_izena;
        }

        public function setPasahitza($pasahitza) {
            $this->pasahitza = $pasahitza;
        }

        //DB
        public function gorde(){
            global $pdo;
            $stmt = $pdo->prepare("INSERT INTO erabiltzaileak (izena, abizena, rol ,erabiltzailea, pasahitza) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->izena, $this->abizena, $this->rol, $this->erabiltzaile_izena, $this->pasahitza]);
        }

        // Método estático para encontrar un usuario por email
        public static function findErabiltzailea($erabiltzaile_izena) {
            // Asegúrate de que $pdo es tu instancia de PDO
            global $pdo;

            $erabiltzaile_izena = htmlspecialchars($erabiltzaile_izena);

            // Preparar y ejecutar la consulta
            $stmt = $pdo->prepare("SELECT * FROM erabiltzaileak WHERE erabiltzailea = :erabiltzailea");
            $stmt->bindParam(':erabiltzailea', $erabiltzaile_izena);
            $stmt->execute();

            // Verificar si se encontró un usuario
            if ($stmt->rowCount() > 0) {
                // Retornar el primer usuario encontrado
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $erabiltzailea = new Erabiltzailea($data['izena'], $data['abizena'], $data['rol'],$data['erabiltzailea'], $data['pasahitza']);
                $erabiltzailea->id = $data['id']; // Asigna el ID del usuario
                return $erabiltzailea;
            } else {
                return null; // No se encontró ningún usuario
            }
        }

    }
?>