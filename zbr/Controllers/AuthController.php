<?php

    class AuthController {

        public function login(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $erabiltzaile_izena = htmlspecialchars(trim($_POST['erabiltzaile_izena']));
                $pasahitza = htmlspecialchars(trim($_POST['pasahitza']));
    
                // Erabiltzailea bilatu
                $erabiltzailea = Erabiltzailea::findErabiltzailea($erabiltzaile_izena);
    
                // Erabiltzailea aurkitu baldin bada
                if ($erabiltzailea) {
                    // Pasahitza egiaztatu (password_verify pasahitza hasheatuta dagoelako)
                    if (password_verify($pasahitza, $erabiltzailea->getPasahitza()))  {
                        //Saioa hasi eta erabiltzailearen informazioa gorde
                        $_SESSION['erabiltzailea_id'] = $erabiltzailea->getId(); 
                        $_SESSION['erabiltzaile_izena'] = $erabiltzailea->getErabiltzaileIzena();
                        $_SESSION['izena'] = $erabiltzailea->getIzena();
                        $_SESSION['abizena'] = $erabiltzailea->getAbizena();
                        $_SESSION['rol'] = $erabiltzailea->getRol();
                        header("Location: home"); 
                        exit;
                    }
                }
            }
    
            //Login-eko view-a kargatu
            include 'Views/login.php';
        }

        public function logout() {
            //Saioa itxi
            session_unset(); // Sesioko variable guztiak ezabatu
            session_destroy(); 
    
            //Home orria ireki
            header("Location: home");
            exit;
        }

        public function erregistratu() {
            //Erregistratzeko formularioa bidaltzen bada
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {//Datuak jaso
                $izena = htmlspecialchars(trim($_POST['izena']));
                $abizena = htmlspecialchars(trim($_POST['abizena']));
                $erabiltzailea = htmlspecialchars(trim($_POST['erabiltzailea']));
                $pasahitza1 = htmlspecialchars(trim($_POST['pasahitza1']));
                $pasahitza2 = htmlspecialchars(trim($_POST['pasahitza2']));

                if($pasahitza1 == $pasahitza2){//Sartutako pasahitzak berdinak badira bezeroa sortu eta login-era joan
                    $hashed_password = password_hash($pasahitza1, PASSWORD_DEFAULT);
                    $bezeroa = new Erabiltzailea($izena,$abizena,'bezeroa',$erabiltzailea,$hashed_password);
                    $bezeroa->gorde();//Bezeroa datu basean gorde
                    header("Location: login");
                }
            }
            //Erregistro orria kargatu
            include 'Views/erregistratu.php';
        }
    }
?>
