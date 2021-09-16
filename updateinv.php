<?php 
    session_start();
    include "conexion.php";
    if(!$_SESSION['id']){
      header('location:login.php');
   }
    if (!isset($_GET['id'])) {
        header("Location: crud.php");
    }
    //include "conexion.php";
    try{
        $conexion=conexionBD();
        echo "";
     }catch(PDOException $err){
        echo "Conexion NO realizada <br>";
        var_dump($err->getMessage());
     }
    $id=$_GET['id'];
    $sentencia=$conexion->prepare("SELECT * FROM inventario WHERE id = ?; ");
    $sentencia->execute([$id]);
    $inventario=$sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($inventario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleindex.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/tablas.css">
    <title>Actualizar</title>
</head>
<body>
<header>
        <div class="ancho">
            <div class="logo">
                <p><a href="crudinv.php">SD Fast Food</a></p>
            </div>
            <nav>
                <ul>                    
                    <li><a href="crud.php">Ir a Usuarios</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <h2 id="agregar">Actualizar Datos</h2>
    <div id="registrousuario">
    <form action="updatedatainv.php" method="post">
        
        <table class="table2">
            <tr>
                <td>Producto: </td>
                <td><input type="text" name="producto2" value="<?php echo $inventario->producto; ?>" ></td>
            </tr>             
            <tr>
                <td>Cantidad: </td>
                <td><input type="text" name="cantidad2" value="<?php echo $inventario-> cantidad;?>" ></td>
                
            </tr>               
            <tr>
                <td>Marca:</td>
                <td><input type="text"  name="marca2" value="<?php echo $inventario->marca;?>"></td>
                
            </tr>
            <tr>
                <td>Proveedor:</td>
                <td><input type="text" name="proveedor2" value="<?php echo $inventario->proveedor; ?>" ></td>
            </tr>
            <tr>
                <input type="hidden" name="oculto">
                <input type="hidden" name="id2" value="<?php echo $inventario->id; ?>">

                <td colspan="2"><input type="submit" value="Actualizar usuario"></td>
            </tr>

        </table>
    </form>
    </div>
</body>
</html>