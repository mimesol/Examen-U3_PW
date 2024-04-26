<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
include "Conectar_usuario.php";
include 'Usuario.php';

$user = getUserById($_SESSION['id'], $conn);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Perfil</title>
    <link href="Estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php if ($user) { ?>

    <div class="content box">
      <br><br>
    <a href="Index.php">Regresar</a>
        
        <form class="marg" 
              action="Conexion_edit.php" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1">Editar Perfil</h4><br>
            <!-- error -->
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
          <div class="mb-3">
            <label class="form-label">Nombre</label> <br>
            <input type="text" 
                   class="form-control"
                   name="fname"
                   value="<?php echo $user['fname']?>">
          </div>
                <br>
          <div class="mb-3">
            <label class="form-label">Usuario</label> <br>
            <input type="text" 
                   class="form-control"
                   name="uname"
                   value="<?php echo $user['username']?>">
          </div>
          <br>
          <div class="mb-3">
		    <label class="form-label">Contraseña</label> <br>
		    <input type="password" 
		           class="form-control"
		           name="pass"
                   >
		  </div>
                <br>
          <button type="submit" class="subirr-image">Modificar</button>
          <a href="img_usuario.php" class="link-secondary">Galeria</a>
        </form>
    </div>
    <?php }else{ 
        header("Location: Index.php");
        exit;
    } ?>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>