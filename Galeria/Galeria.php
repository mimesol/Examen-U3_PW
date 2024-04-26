<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Mi Galeria</title>
            <link href="Estilos.css" rel="stylesheet" type="text/css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Mi Galeria</h1>
                <a href="#"><i class="fas fa-image"></i>Registrarse</a>
            </div>
        </nav>
        <div class="content box">
        <center>
            <a href="Login.php" class="subirr-image">Iniciar Sesión</a>
        </center>
        <div class="images">
                <?php
                        $ruta_imagenes = "Imagenes_guardadas/";
                        $imagenes = opendir( $ruta_imagenes );
                        $hay_imagenes = false;

                        if($imagenes){
                            while( $imagen = readdir( $imagenes ) ) {
                                if ( is_file( $ruta_imagenes . $imagen ) && getimagesize( $ruta_imagenes . $imagen ))
                                {
                                    echo "<img class='ajustar' src= '$ruta_imagenes$imagen'>";
                                    $hay_imagenes = true;
                                }
                            }
                            closedir( $imagenes );
                        }else{
                            echo "Error: al cargar carpeta de imagenes";
                        }
                        if(!$hay_imagenes){
                            echo "No hay imagenes aun. Fue la primera";
                        }
                        
                ?>
	</div>
    </body>
</html>