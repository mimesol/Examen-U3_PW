<?php
include 'Funciones.php';
$msg = '';
if (isset($_FILES['image'], $_POST['title'], $_POST['description'])) {
	$target_dir = 'Imagenes_guardadas/';
	$image_path = $target_dir . basename($_FILES['image']['name']);
	if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
		if (file_exists($image_path)) {
			$msg = 'La imagen ya existe.';
		} else if ($_FILES['image']['size'] > 500000) {
			$msg = 'El tamaño del archivo de imagen es demasiado grande.';
		} else {
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			$pdo = pdo_connect_mysql();
            $stmt = $pdo->prepare('INSERT INTO images (title, description, path, uploaded_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)');
            $stmt->execute([ $_POST['title'], $_POST['description'], $image_path ]); 
            $msg = 'Imagen guardada'; 
		}
	}
}
?>


<?=template_header('Subir image')?>
<div class="marg"><a href="Index.php">Regresar...</a> </div>
<div class="content subirr">
	<form action="Subir_img.php" method="post" enctype="multipart/form-data">
		<label for="image">Selecciona una imagen</label>
		<input type="file" name="image" accept="image/*" id="image">
		<label for="title">Titulo</label>
		<input type="text" name="title" id="title">
		<label for="description">Descripción</label>
		<textarea name="description" id="description"></textarea>
	    <input type="submit" value="Subir image" name="submit">
	</form>
	<p><?=$msg?></p>
</div>


<?=template_footer()?>