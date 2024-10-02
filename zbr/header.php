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

<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link">Home</a></li>
                <li><a href="./historia.php" class="nav-link px-2 link">Historia</a></li>
                <li><a href="./tienda.php" class="nav-link px-2 link">Tienda</a></li>
                <li><a href="./informacion.php" class="nav-link px-2 link">Información</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Bilatu..." aria-label="Search">
            </form>

            <div class="text-end">
                <?php if (isset($_SESSION['erabiltzaile_izena'])):?>
                    <span class="text-light">Ongi etorri, <?php echo htmlspecialchars($_SESSION['izena']); ?> <?php echo htmlspecialchars($_SESSION['abizena']); ?></span>
                    <a href="logout" class="btn btn-outline-light">Logout</a>
                <?php else: // Si no hay sesión ?>
                    <a href="login" class="btn btn-outline-light">Login</a>
                    <a href="erregistratu" class="btn btn-warning me-2">Erregistratu</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>