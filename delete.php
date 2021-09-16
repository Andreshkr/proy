<?php 
    //print_r($_GET);
    ob_start();
    session_start();
    include "conexion.php";
    if(!$_SESSION['id']){
      header('location:login.php');
   }
    if (!isset($_GET['id'])) {
        exit();
    }   
    //include 'conexion.php';
    try{
        $conexion=conexionBD();
        echo "Conexion realizada con éxito <br>";
     }catch(PDOException $err){
        echo "Conexion NO realizada <br>";
        var_dump($err->getMessage());
     }
    $codigo=$_GET['id'];
    $sentencia=$conexion->prepare("DELETE FROM users WHERE id=?;");
    $resultado=$sentencia->execute([$codigo]);
    if ($resultado===true) {    
        header('Location: crud.php');

    }else {
        echo "error";
    }
    ob_end_flush();
?>