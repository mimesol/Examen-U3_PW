<?php
include 'Funciones.php';

$pdo = pdo_connect_mysql();
$stmt = $pdo->query('SELECT * FROM images');
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
include "Conectar_usuario.php";
include 'Usuario.php';

$user = getUserById($_SESSION['id'], $conn);
 ?>

<?=template_header('Galeria')?>

<div class="content box">
        <a href="Edit.php">Regresar</a>
	<div class="images">
    <?php if ($user) { ?>
    <h2>
        Imagenes de   
        <?php echo $user['username']?>
    </h2>
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
</div>


<?php }else {
	header("Location: Login.php");
	exit;
}} ?>