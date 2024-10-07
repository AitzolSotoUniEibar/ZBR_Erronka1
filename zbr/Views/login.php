<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZBR</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/sesion.css">
</head>
<!--Login egiteko formularioa-->
<body>
    <div class="container">
        <div class="izena">
            <img src="img/logo_zbr.png" alt="" class="logo">
            <h2>ZBR</h2>
        </div>
        <form action="login" method="post">
            <div class="sesion-form">
                <input type="text" id="erabiltzaile_izena" name="erabiltzaile_izena" placeholder="Erabiltzailea" class="sesion-input" required>
                <input type="password" id="pasahitza" name="pasahitza" placeholder="Pasahitza" class="sesion-input" required>
                <input type="submit" value="Login" class="sesion-btn">
            </div>
        </form>
        <div class="register-link">
            <p>Ez duzu konturik?<a href="erregistratu">Sortu hemen</a></p>
        </div>

    </div>
</body>
</html>