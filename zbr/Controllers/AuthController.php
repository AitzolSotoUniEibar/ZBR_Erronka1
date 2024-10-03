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
                        // Iniciar sesión
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
    
            // Incluir la vista de login (asegúrate de que este archivo existe)
            include 'Views/login.php';
        }

        public function logout() {
            // Destruir la sesión
            session_unset(); // Elimina todas las variables de sesión
            session_destroy(); // Destruye la sesión
    
            // Redirigir al home
            header("Location: home"); // Asegúrate de que esta URL sea correcta
            exit; // Termina el script después de redirigir
        }

        public function erregistratu() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //htmlspeciachars code injection sahiesteko
                $izena = htmlspecialchars(trim($_POST['izena']));
                $abizena = htmlspecialchars(trim($_POST['abizena']));
                $erabiltzailea = htmlspecialchars(trim($_POST['erabiltzailea']));
                $pasahitza1 = htmlspecialchars(trim($_POST['pasahitza1']));
                $pasahitza2 = htmlspecialchars(trim($_POST['pasahitza2']));

                if($pasahitza1 == $pasahitza2){//Sartutako pasahitzak berdinak badira bezeroa sortu eta login-era joan
                    $hashed_password = password_hash($pasahitza1, PASSWORD_DEFAULT);
                    $bezeroa = new Erabiltzailea($izena,$abizena,'bezeroa',$erabiltzailea,$hashed_password);
                    $bezeroa->gorde();
                    header("Location: login");
                }
            }

            include 'Views/erregistratu.php';
        }
    }
?>
