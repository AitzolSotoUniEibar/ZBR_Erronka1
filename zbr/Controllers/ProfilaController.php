<?php

class ProfilaController {
    public function profila() {

        if (!isset($_SESSION['erabiltzailea_id'])) {
            header('Location: login');
            exit();
        }

        $userID = $_SESSION['erabiltzailea_id'];

        $eskaeraModel = new Eskaera(); 
        $eskaerak = $eskaeraModel->getEskaerak($userID);

        $erabiltzaileaModel = new Erabiltzailea();
        $erabiltzaileak = $erabiltzaileaModel->getErabiltzaileGuztiak();

        $produktuaModel = new Produktua();
        $produktuak = $produktuaModel->getProduktuGuztiak();

        include 'Views/profila.php';
    }

    public function ezabatuProduktua($id) {
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
            $produktuaModel = new Produktua();
            $produktuaModel->deleteProduktua($id);
        }
        header('Location: profila');
    
        exit();
    }

    public function ezabatuErabiltzailea($id){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
            $erabiltzaileaModel = new Erabiltzailea();
            $erabiltzaileaModel->deleteErabiltzailea($id);
        }
        header('Location: profila');
    
        exit();
    }

    public function editatuProduktua($id){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
            $produktuaModel = new Produktua();
            $produktua = $produktuaModel->getProduktuaById($id);

            include 'Views/produktuaEditatu.php';
        }else{
            header('Location: profila');
        }
    }

    public function eguneratuProduktua($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produktuaModel = new Produktua();
    
            $produktuaData = [
                'izena' => $_POST['izena'],
                'prezioa' => $_POST['prezioa']
            ];
            $produktuaModel->produktuaEguneratu($id, $produktuaData);
            header('Location: profila');
    
            exit();
        }
    }

    public function editatuErabiltzailea($id){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
            $erabiltzaileaModel = new Erabiltzailea();
            $erabiltzailea = $erabiltzaileaModel->geterabiltzaileaById($id);

            include 'Views/erabiltzaileaEditatu.php';
        }else{
            header('Location: profila');
        }
    }

    public function eguneratuerabiltzailea($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $erabiltzaileaModel = new Erabiltzailea();
    
            $erabiltzaileaData = [
                'izena' => $_POST['izena'],
                'abizena' => $_POST['abizena'],
                'rol' => $_POST['rol'],
                'erabiltzaile_izena' => $_POST['erabiltzaile_izena']
            ];
            $erabiltzaileaModel->erabiltzaileaEguneratu($id, $erabiltzaileaData);
            header('Location: profila');
    
            exit();
        }
    }
}
?>