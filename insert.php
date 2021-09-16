<?php
    ob_start();
    session_start();
    include "conexion.php";
    if(!$_SESSION['id']){
      header('location:login.php');
   }
    if (!isset($_POST['oculto'])) {
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
    
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['email'];
    $password=$_POST['pass'];
    $consulta=$conexion->prepare("INSERT INTO users (nombre, apellido, email, password) VALUES (?,?,?,?);");
    $resultado=$consulta->execute([$nombre,$apellido,$correo,$password]);
    if ($resultado===true) {
        header("Location: crud.php");
    }else {
        echo "error";
    }
    ob_end_flush();
?>