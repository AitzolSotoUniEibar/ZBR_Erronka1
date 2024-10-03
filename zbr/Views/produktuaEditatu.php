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
        <h1>Produktua</h1>
        <form action="eguneratuProduktua?id=<?php echo $produktua->getId(); ?>" method="POST">
            <div class="editatu-form">
                <label for="id">ID:</label>
                <input type="text" value='<?php echo $produktua->getId(); ?>' class="editatu-input" readonly>

                <label for="izena">Izena:</label>
                <input type="text" value='<?php echo $produktua->getIzena(); ?>' name='izena' class="editatu-input">

                <label for="prezioa">Prezioa:</label>
                <input type="text" value='<?php echo $produktua->getPrezioa(); ?>' name='prezioa' class="editatu-input">
                
                <input type="submit" value="Eguneratu" class="editatu-btn">
            </div>
        </form>
    </div>
</body>
</html>