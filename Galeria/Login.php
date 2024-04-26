<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Mi Galeria</title>
            <link href="Estilos.css" rel="stylesheet" type="text/css">
        </head>
        <body>
        <div class="content box">
            <h2 id="tit">LOGIN</h2>
    	<form class="marg" 
    	      action="Conexion_login.php" 
    	      method="post">
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label">Usuario</label>
                <br>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>
                <br>
		  <div class="mb-3">
		    <label class="form-label">Contraseña</label>
            <br>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>
		  <br>
		  <button type="submit" class="subirr-image">Iniciar Sesión</button>
		  <a href="Registrarse.php" class="link-secondary">Registrarse</a>
		</form>
    </div>
    </body>
</html>