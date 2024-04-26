<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) &&  
   isset($_POST['pass'])){

    include "Conectar_usuario.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Se requiere su nombre";
    	header("Location: Registrarse.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "Se requiere su usuario";
    	header("Location: Registrarse.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Se requiere su contraseña";
    	header("Location: Registrarse.php?error=$em&$data");
	    exit;
    }else {
      $pass = password_hash($pass, PASSWORD_DEFAULT);

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);

               // Insert into Database
               $sql = "INSERT INTO users(fname, username, password, pp) 
                 VALUES(?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $uname, $pass, $new_img_name]);

               header("Location: Registrarse.php?success=Su cuenta ha sido creada con éxito");
                exit;
            }else {
               $em = "";
               header("Location: Registrarse.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "Error";
            header("Location: Registrarse.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO users(fname, username, password) 
       	        VALUES(?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fname, $uname, $pass]);

       	header("Location: Registrarse.php?success=Su cuenta ha sido creada con éxito");
   	    exit;
      }
    }


}else {
	header("Location: Registrarse.php?error=error");
	exit;
}