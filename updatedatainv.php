<?php 
    //print_r($_POST);
    session_start();
    include "conexion.php";
    if(!$_SESSION['id']){
      header('location:login.php');
   }
    if (!isset($_GET['oculto'])) {
        header("Location: crudinv.php");
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
     $producto2=$_POST['producto2'];
     $cantidad2=$_POST['cantidad2'];
     $marca2=$_POST['marca2'];
     $proveedor2=$_POST['proveedor2'];
     $sentencia=$conexion->prepare("UPDATE inventario SET producto=?, cantidad=?, marca=?, proveedor=? WHERE id =?;");
     $resultado=$sentencia->execute([$producto2,$cantidad2,$marca2,$producto2,$id2]);
     if($resultado===true){
         header('Location: crudinv.php');
     }else {
         echo "error";
     }
?>