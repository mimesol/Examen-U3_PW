<?php 
session_start();

if(isset($_POST['uname']) && 
   isset($_POST['pass'])){

    include "Conectar_usuario.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
    	$em = "Se requiere nombre de usuario";
    	header("Location: Conexion_login.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Se requiere contraseña";
    	header("Location: Conexion_login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          $pp =  $user['pp'];

          if($username === $uname){
             if(password_verify($pass, $password)){
                 $_SESSION['id'] = $id;
                 $_SESSION['fname'] = $fname;
                 $_SESSION['pp'] = $pp;

                 header("Location: Index.php");
                 exit;
             }else {
               $em = "Nombre de usuario o contraseña incorrecta";
               header("Location: Conexion_login.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Nombre de usuario o contraseña incorrecta";
            header("Location: Conexion_login.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Nombre de usuario o contraseña incorrecta";
         header("Location: Conexion_login.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: Conexion_login.php?error=error");
	exit;
}
