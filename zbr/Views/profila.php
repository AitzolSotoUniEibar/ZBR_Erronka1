<!DOCTYPE html>
<html lang="en">
<?php require "header.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZBR</title>
    <link rel="stylesheet" href="CSS/profila.css">
</head>
<!--Erabiltzailearen profila-->
<body>
    <div class="eskaerak">
        <?php
        
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] == 'admin') {/**Erabiltzailea admin baldin bada erabiltzaile eta produktu guztiak bistaratuko dira*/
                echo "<h2>Administratzailea</h2>";

                if (!empty($erabiltzaileak)) {
                    echo "<div class='erakutsiBotoia'>";
                        echo "<h3>Erabiltzaileak</h3>";
                        echo "<button id='erabiltzaileakBotoia'>Erabiltzaileak ikusi</button>";
                    echo "</div>";
                    echo "<div id='erabiltzaileakDiv' class='table-container erakutsiDiv'>";
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
                    
                    foreach ($erabiltzaileak as $erabiltzaile) {/**Erabiltzaileak */
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
                    echo "<div class='erakutsiBotoia'>";
                        echo "<h3>Produktuak</h3>";
                        echo "<button id='produktuakBotoia'>Produktuak ikusi</button>";
                    echo "</div>";
                    echo "<div id='produktuakDiv' class='table-container erakutsiDiv'>";
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
                    
                    foreach ($produktuak as $produktua) {/**Produktuak */
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
            
            elseif ($_SESSION['rol'] == 'bezero') {/**Erabiltzailea bezero bat baldin bada bere eskaerak bistaratuko dira */
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
                    foreach ($eskaerak as $eskaera) {/**Eskaeren informazioa*/
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

    <script>
        $(document).ready(function() {
            $("#erabiltzaileakBotoia").click(function() {
                console.log("hola");
                $("#erabiltzaileakDiv").slideToggle("slow");  //Erabiltzaileen div-a erakutsi eta ezkutatu
                var botoiaTxt = $("#erabiltzaileakDiv").is(":visible") ? "Erabiltzaileak ezkutatu" : "Erabiltzaileak ikusi";//Botoiaren testua aldatzeko
                $(this).text(botoiaTxt);  
            });

            $("#produktuakBotoia").click(function() {
                console.log("hola");
                $("#produktuakDiv").slideToggle("slow");  //Erabiltzaileen div-a erakutsi eta ezkutatu
                var botoiaTxt = $("#produktuakDiv").is(":visible") ? "Produktuak ezkutatu" : "Produktuak ikusi";//Botoiaren testua aldatzeko
                $(this).text(botoiaTxt);  
            });
        });
    </script>
</body>
</html>