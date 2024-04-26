<?php  
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {



if(isset($_POST['fname']) && 
   isset($_POST['uname'])){

    include "Conectar_usuario.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $old_pp = $_POST['old_pp'];
    $id = $_SESSION['id'];

    if (empty($fname)) {
    	$em = "Se requiere el nombre";
    	header("Location: Edit.php?error=$em");
	    exit;
    }else if(empty($uname)){
    	$em = "Se requiere el nombre del usuario";
    	header("Location: Edit.php?error=$em");
	    exit;
    }else {

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
        
         $img_name = $_FILES['pp']['name'];
         $tmp_name = $_FILES['pp']['tmp_name'];
         $error = $_FILES['pp']['error'];
         
         if($error === 0){
               $sql = "UPDATE users 
                       SET fname=?, username=?, password=?
                       WHERE id=?";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $uname, $new_img_name, $id]);
               $_SESSION['fname'] = $fname;
               header("Location: Edit.php?success=Su cuenta ha sido creada con éxito");
                exit;
            }else {
               $em = "";
               header("Location: Edit.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "Error";
            header("Location: Edit.php?error=$em&$data");
            exit;
        
      }
    }


}else {
	header("Location: Edit.php?error=error");
	exit;
}


}else {
	header("Location: Index.php");
	exit;
} 

