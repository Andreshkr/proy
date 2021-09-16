<?php 
    //print_r($_POST);
    session_start();
    include "conexion.php";
    if(!$_SESSION['id']){
      header('location:login.php');
   }
    if (!isset($_GET['oculto'])) {
        header("Location: crud.php");
    }
    //include "conexion.php";
    try{
        $conexion=conexionBD();
        echo "Conexion realizada con éxito <br>";
     }catch(PDOException $err){
        echo "Conexion NO realizada <br>";
        var_dump($err->getMessage());
     }
     $id2=$_POST['id2'];
     $nombre2=$_POST['nombre2'];
     $apellido2=$_POST['apellido2'];
     $email2=$_POST['email2'];
     $pass2=$_POST['pass2'];
     $sentencia=$conexion->prepare("UPDATE users SET nombre=?, apellido=?, email=?, password=? WHERE id =?;");
     $resultado=$sentencia->execute([$nombre2,$apellido2,$email2,$pass2,$id2]);
     if($resultado===true){
         header('Location: crud.php');
     }else {
         echo "error";
     }
?>