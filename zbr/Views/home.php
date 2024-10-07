<!DOCTYPE html>
<html lang="es">
    <?php 
        require 'header.php';
    ?>

    <body>
<!--Webguneko hasiera orria-->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="..\ZBR\img\bolis.png" class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h4 class="display-6 fw-bold text-body-emphasis lh-1 mb-1">"La escritura es el eco del alma, donde cada palabra es un susurro eterno en el papel."</h4><br>
                <p class="lead">¡Bienvenido a **ZBR**, tu tienda especializada en bolígrafos y artículos de escritura!

                    Desde nuestros inicios, hemos creído en el poder de la palabra escrita. Un buen bolígrafo no solo es una herramienta, sino una extensión de las ideas, la creatividad y la precisión que cada persona puede plasmar en el papel.
                    Ya seas estudiante, profesional o simplemente un amante de la escritura, en **ZBR** encontrarás el bolígrafo perfecto para cada ocasión. ¡Nos alegra que nos acompañes en este viaje de ideas y tinta!
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-secondary">Productos</button>
                    <button type="button" class="btn btn-secondary">Historia</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">¿Por qué nosotros?</h2>

        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">
                <h2 class="fw-bold text-body-emphasis"><-ZBR-> lideres en cuidar lo nuestro</h2>
                <p class="text-body-secondary">En ZBR, priorizamos la integridad, la calidad y la satisfacción del cliente, lo que nos ha establecido como un nombre de confianza en la industria. Nuestro compromiso con la excelencia se refleja en cada aspecto de nuestro negocio.</p>
                <button type="button" class="btn btn-secondary btn-lg px-4">Saber más</button>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col d-flex flex-column gap-2">
                    <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-secondary bg-gradient fs-4 rounded-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#collection"></use>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Calidad inigualable</h4>
                    <p class="text-body-secondary">Nuestros bolígrafos están elaborados con materiales de alta calidad, asegurando una escritura suave y precisa en todo momento.</p>
                </div>

                <div class="col d-flex flex-column gap-2">
                    <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-secondary bg-gradient fs-4 rounded-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#gear-fill"></use>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Ergonomia</h4>
                    <p class="text-body-secondary">Nuestros bolígrafos destacan por su diseño moderno y ergonómico, que garantiza una experiencia de escritura fluida y cómoda.</p>
                </div>

                <div class="col d-flex flex-column gap-2">
                    <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-secondary bg-gradient fs-4 rounded-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#speedometer"></use>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Compromiso</h4>
                    <p class="text-body-secondary">Brindamos un servicio personalizado, escuchando y adaptándonos a las necesidades de nuestros clientes para garantizar su satisfacción.</p>
                </div>

                <div class="col d-flex flex-column gap-2">
                    <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-secondary bg-gradient fs-4 rounded-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#table"></use>
                        </svg>
                    </div>
                    <h4 class="fw-semibold mb-0 text-body-emphasis">Responsabilidad</h4>
                    <p class="text-body-secondary">Nos comprometemos con el medio ambiente al utilizar proveedores ecológicos y empaques sostenibles, combinando calidad con responsabilidad ambiental.</p>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!--  FOOTER -->
    <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Company, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a href="default.asp"><img src="./img/icons/instagramrdy.png" alt="HTML tutorial" style="width:42px;height:42px;"></a></li>
        <li class="ms-3"><a href="default.asp"><img src="./img/icons/facebookrdy.png" alt="HTML tutorial" style="width:50px;height:42px;"></a></li>
        <li class="ms-3"><a href="default.asp"><img src="./img/icons/gmailrdy.png" alt="HTML tutorial" style="width:42px;height:42px;"></a></li>
        </ul>
    </footer>
    </div>
    </body>
</html>