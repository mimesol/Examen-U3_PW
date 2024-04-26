<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
<body>
    <div class="content box">
    	<h1 id="tit">Crear Usuario</h1>
    	<form class="marg" 
    	      action="Conexion_reg.php" 
    	      method="post"
    	      enctype="multipart/form-data">

    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

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
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
                   <br>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Usuario</label> <br>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
                   <br>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Contraseña</label> <br>
		    <input type="password" 
		           class="form-control"
		           name="pass">
                   <br>
		  </div>
		  <br>
		  <button type="submit" class="subirr-image">Registrarse</button>
		  <a href="Login.php" class="link-secondary">Iniciar Sesión</a>
		</form>
    </div>
</body>
</html>