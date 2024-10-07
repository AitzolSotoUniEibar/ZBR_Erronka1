<?php

class ProfilaController {
    //Profila bistaratzeko
    public function profila() {

        if (!isset($_SESSION['erabiltzailea_id'])) {//Ez badu saioa hasi login orrira bidaliko zaio erabiltzaileari
            header('Location: login');
            exit();
        }

        $userID = $_SESSION['erabiltzailea_id'];//Erabiltzailearen id-a gorde

        if($_SESSION['rol'] == 'bezero'){
            $eskaeraModel = new Eskaera(); 
            $eskaerak = $eskaeraModel->getEskaerak($userID);//Bezeroaren eskaerak erakusteko
        }else if($_SESSION['rol'] == 'admin'){
            $erabiltzaileaModel = new Erabiltzailea();
            $erabiltzaileak = $erabiltzaileaModel->getErabiltzaileGuztiak();//Erabiltzaile guztiak erakusteko "admin" bada
    
            $produktuaModel = new Produktua();
            $produktuak = $produktuaModel->getProduktuGuztiak();//Produktuak erakusteko, "admin" bada
        }


        include 'Views/profila.php';
    }

    /**Produktu bat ezabatzeko funtzioa */
    public function ezabatuProduktua($id) {
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {//Erabiltzailea admin dela ziurtatu
            $produktuaModel = new Produktua();
            $produktuaModel->deleteProduktua($id);//Produktua ezabatu
        }
        header('Location: profila');//Profila orrira joan
    
        exit();
    }

    /**Erabiltzailea ezabatzeko funtzioa */
    public function ezabatuErabiltzailea($id){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {//Erabiltzailea admin dela ziurtatu
            $erabiltzaileaModel = new Erabiltzailea();
            $erabiltzaileaModel->deleteErabiltzailea($id);//Aukeratutako erabiltzailea ezabatu
        }
        header('Location: profila');//Profila orrira joan
    
        exit();
    }

    /**Funtzio honek produktu bat editatzeko orria bistaratzen du */
    public function editatuProduktua($id){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {//Erabiltzailea admin dela ziurtatu
            $produktuaModel = new Produktua();
            $produktua = $produktuaModel->getProduktuaById($id);//Produktuaren datuak jaso

            include 'Views/produktuaEditatu.php';//Produktua editatzeko orria bistaratu
        }else{//Ez bada admin profila orrira bidaliko zaio
            header('Location: profila');
        }
    }

    /**Produktu baten datuak eguneratzeko */
    public function eguneratuProduktua($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produktuaModel = new Produktua();
    
            $produktuaData = [//Formularioak sartutako datuak jaso
                'izena' => $_POST['izena'],
                'prezioa' => $_POST['prezioa']
            ];
            $produktuaModel->produktuaEguneratu($id, $produktuaData);//Produktua eguneratu
            header('Location: profila');//Profilera joan
    
            exit();
        }
    }

    /**Funtzio honek erabiltzaile bat editatzeko orria bistaratzen du */
    public function editatuErabiltzailea($id){
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {//Erabiltzailea admin dela ziurtatu
            $erabiltzaileaModel = new Erabiltzailea();
            $erabiltzailea = $erabiltzaileaModel->getErabiltzaileaById($id);//Erabiltzailearen datuak jaso

            include 'Views/erabiltzaileaEditatu.php';
        }else{
            header('Location: profila');
        }
    }

    public function eguneratuErabiltzailea($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $erabiltzaileaModel = new Erabiltzailea();
    
            $erabiltzaileaData = [//Erabiltzailearen datuak jaso
                'izena' => $_POST['izena'],
                'abizena' => $_POST['abizena'],
                'rol' => $_POST['rol'],
                'erabiltzaile_izena' => $_POST['erabiltzaile_izena']
            ];
            $erabiltzaileaModel->erabiltzaileaEguneratu($id, $erabiltzaileaData);//Erabiltzailea eguneratu jasotako datuekin 
            header('Location: profila');
    
            exit();
        }
    }
}
?>