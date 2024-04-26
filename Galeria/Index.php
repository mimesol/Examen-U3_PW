<?php
include 'Funciones.php';

$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT * FROM images');
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Galeria')?>

<div class="content box">
        <a href="Edit.php">Editar Usuario</a>
	<center>
        <a href="Subir_img.php" class="subirr-image">Subir Imágenes</a>
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
                                echo "<a href='Datos_img.php?imagen=$imagen'><img class='ajustar' src= '$ruta_imagenes$imagen'></a>";
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
</div>

<?=template_footer()?>