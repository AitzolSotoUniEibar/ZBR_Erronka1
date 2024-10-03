<?php 
    // Obtener el nombre del archivo actual
    $current_page = basename($_SERVER['PHP_SELF']); 
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/header.css">
    <title>ZBR</title>
    <meta charset="utf8">
</head>

<header class="p-2">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <img src="img/logo_zbr.png" alt="" class="logo">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="home" class="nav-link px-2 link">Home</a></li>
                <li><a href="./historia.php" class="nav-link px-2 link">Historia</a></li>
                <li><a href="./tienda.php" class="nav-link px-2 link">Tienda</a></li>
                <li><a href="./informacion.php" class="nav-link px-2 link">Información</a></li>
            </ul>


            <div class="text-end">
                <?php if (isset($_SESSION['erabiltzaile_izena'])): ?>
                    <div class="dropdown">
                        <img src="img/profila.png" class="profilIrudia">
                        <a class="dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['izena']); ?> <?php echo htmlspecialchars($_SESSION['abizena']); ?>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="profila">Nire profila</a></li>
                            <li><a class="dropdown-item" href="logout">Saioa itxi</a></li>
                        </ul>
                    </div>
                <?php else:  ?>
                    <a href="login" class="btn login-btn">Login</a>
                    <a href="erregistratu" class="btn erregistratu-btn">Erregistratu</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>