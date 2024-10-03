<!DOCTYPE html>
<html lang="en">
<?php require "header.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/editatu.css">
</head>
<body>
    <div class="editatu-container">
        <h1>Erabiltzailea</h1>
        <form action="eguneratuErabiltzailea?id=<?php echo $erabiltzailea->getId(); ?>" method="POST">
            <div class="editatu-form">
                <label for="id">ID:</label>
                <input type="text" value='<?php echo $erabiltzailea->getId(); ?>' class="editatu-input" readonly>

                <label for="izena">Izena:</label>
                <input type="text" value='<?php echo $erabiltzailea->getIzena(); ?>' name='izena' class="editatu-input">

                <label for="izena">Abizena:</label>
                <input type="text" value='<?php echo $erabiltzailea->getAbizena(); ?>' name='abizena' class="editatu-input">

                <label for="rol">Rol:</label>
                <select name="rol" class="editatu-input">
                    <option value="bezero" <?php echo $erabiltzailea->getRol() === 'bezero' ? 'selected' : ''; ?>>Bezero</option>
                    <option value="admin" <?php echo $erabiltzailea->getRol() === 'admin' ? 'selected' : ''; ?>>Admin</option>
                </select>

                <label for="erabiltzaile_izena">Erabiltzaile izena:</label>
                <input type="text" value='<?php echo $erabiltzailea->getErabiltzaileIzena(); ?>' name='erabiltzaile_izena' class="editatu-input">

                <input type="submit" value="Eguneratu" class="editatu-btn">
            </div>
        </form>
    </div>
</body>
</html>