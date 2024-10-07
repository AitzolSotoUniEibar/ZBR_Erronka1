<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/sesion.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>ZBR</title>
</head>
<body>
    <div class="container">
        <div class="izena">
                <img src="img/logo_zbr.png" alt="" class="logo">
                <h2>ZBR</h2>
        </div>
        <!--Erabiltzaile berri bat sortzeko formularioa-->
        <form action="erregistratu" method="post">
            <div class="sesion-form">
                <input type="text" id="izena" name="izena" placeholder="Izena" class="sesion-input" required>
    
                <input type="text" id="abizena" name="abizena" placeholder="Abizena" class="sesion-input" required>

                <input type="text" id="erabiltzailea" name="erabiltzailea" placeholder="Erabiltzailea" class="sesion-input" required>
    
                <input type="password" id="pasahitza1" name="pasahitza1" placeholder="Pasahitza" class="sesion-input" required>
    
                <input type="password" id="pasahitza2" name="pasahitza2"  placeholder="Errepikatu pasahitza" class="sesion-input" required>
    
                <input type="submit" value="Erregistratu" class="sesion-btn">
            </div>
        </form>
    </div>
</body>
</html>