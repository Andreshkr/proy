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
    
    $producto=$_POST['producto'];
    $cantidad=$_POST['cantidad'];
    $marca=$_POST['marca'];
    $proveedor=$_POST['proveedor'];
    $consulta=$conexion->prepare("INSERT INTO inventario (producto, cantidad, marca, proveedor) VALUES (?,?,?,?);");
    $resultado=$consulta->execute([$producto,$cantidad,$marca,$proveedor]);
    if ($resultado===true) {
        header("Location: crudinv.php");
    }else {
        echo "error";
    }
    ob_end_flush();
?>