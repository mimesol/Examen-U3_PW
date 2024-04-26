<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
include "Conectar_usuario.php";
include 'Usuario.php';

$user = getUserById($_SESSION['id'], $conn);
$imagen = $_GET['imagen'];
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de la imagenes</title>
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <br><br>
    <a href="Index.php">Regresar</a>
    <br><br>
    <?php
        echo "<img src='imagenes/$imagen'>";
    ?>
    <?php if ($user) { ?>
    <p>
        Usuario:  
        <?php echo $user['username']?>
    </p>
    <?php } ?>
    <p>Fecha de subida: <span id="fecha"></span></p>

    <script>
        var fecha = new Date();
        var fechaFormateada = fecha.toLocaleDateString();
        document.getElementById("fecha").innerText = fechaFormateada;
    </script>
    <?php
        $contar = 'c.txt';
        if(file_exists($contar)){
            $cc = file_get_contents($contar);
            $cc++;
        }else{
            $cc = 1;
        }
        file_put_contents($contar,$cc);
        echo "    $cc vistas";
    ?>
</body>
</html>

<?php }else {
	header("Location: Login.php");
	exit;
} ?>