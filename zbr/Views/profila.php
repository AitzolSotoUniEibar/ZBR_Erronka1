<!DOCTYPE html>
<html lang="en">
<?php require "header.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZBR</title>
    <link rel="stylesheet" href="CSS/profila.css">
</head>

<body>
    <div class="eskaerak">
        <?php
        // Verifica si la sesión de usuario tiene el rol definido
        if (isset($_SESSION['rol'])) {
            // Si el rol es "admin"
            if ($_SESSION['rol'] == 'admin') {
                echo "<h2>Administratzailea</h2>";

                if (!empty($erabiltzaileak)) {
                    echo "<h3>Erabiltzaileak</h3>";
                    echo "<div class='table-container'>";
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Izena</th>
                                    <th>Abizena</th>
                                    <th>Rol</th>
                                    <th>Erabiltzailea</th>
                                    <th>Pasahitza</th>
                                    <th>Editatu</th>
                                    <th>Ezabatu</th>
                                </tr>
                            </thead>
                            <tbody>";
                    
                    foreach ($erabiltzaileak as $erabiltzaile) {
                        echo "<tr>
                                <td>" . $erabiltzaile->getId() . "</td>
                                <td>" . $erabiltzaile->getIzena() . "</td>
                                <td>" . $erabiltzaile->getAbizena() . "</td>
                                <td>" . $erabiltzaile->getRol() . "</td>
                                <td>" . $erabiltzaile->getErabiltzaileIzena() . "</td>
                                <td>" . $erabiltzaile->getPasahitza() . "</td>
                                <td class='action'><a href='editatuErabiltzailea?id=" . $erabiltzaile->getId() . "')\"><img src='img/edit.png' class='edit'></a></td>
                                <td class='action'><a href='ezabatuErabiltzailea?id=" . $erabiltzaile->getId() . "' onclick=\"return confirm('Ziur zaude ezabatu nahi duzula?')\"><img src='img/delete.png' class='edit'></a></td>
                            </tr>";
                    }
            
                    echo "  </tbody>
                        </table>
                        </div>";
                } else {
                    echo "<p>Ez dago erabiltzailerik.</p>";
                }

                if (!empty($produktuak)) {
                    echo "<h3 class='mt-3'>Produktuak</h3>";
                    echo "<div class='table-container'>";
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Izena</th>
                                    <th>Prezioa</th>
                                    <th>Editatu</th>
                                    <th>Ezabatu</th>
                                </tr>
                            </thead>
                            <tbody>";
                    
                    foreach ($produktuak as $produktua) {
                        echo "<tr>
                                <td>" . $produktua->getId() . "</td>
                                <td>" . $produktua->getIzena() . "</td>
                                <td>" . $produktua->getPrezioa() . "€</td>
                                <td class='action'><a href='editatuProduktua?id=" . $produktua->getId() . "')\"><img src='img/edit.png' class='edit'></a></td>
                                <td class='action'><a href='ezabatuProduktua?id=" . $produktua->getId() . "' onclick=\"return confirm('Ziur zaude ezabatu nahi duzula?')\"><img src='img/delete.png' class='edit'></a></td>
                            </tr>";
                    }
            
                    echo "  </tbody>
                        </table>
                        </div>";
                } else {
                    echo "<p>Ez dago eskaerarik.</p>";
                }
            }
            // Si el rol es "bezero"
            elseif ($_SESSION['rol'] == 'bezero') {
                echo "<h1>Kaixo " . $_SESSION['izena'] . "!</h1>";

                if (!empty($eskaerak)) {
                    echo "<h2>Zure eskaerak:</h2>";
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Produktua</th>
                                    <th>Kantitatea</th>
                                    <th>Eskaera data</th>
                                </tr>
                            </thead>
                            <tbody>";
                    
                    $produktuaModel = new Produktua();
                    foreach ($eskaerak as $eskaera) {
                        $produktua = $produktuaModel->getProduktuaById($eskaera->getProduktuaId());
                        echo "<tr>
                                <td>" . htmlspecialchars($eskaera->getId()) . "</td>
                                <td>" . htmlspecialchars($produktua->getIzena()) . "</td>
                                <td>" . htmlspecialchars($eskaera->getKantitatea()) . "</td>
                                <td>" . htmlspecialchars($eskaera->getEskaeraData()) . "</td>
                            </tr>";
                    }
            
                    echo "  </tbody>
                        </table>";
                } else {
                    echo "<p>Ez dago eskaerarik.</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>