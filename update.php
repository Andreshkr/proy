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
    $sentencia=$conexion->prepare("SELECT * FROM users WHERE id = ?; ");
    $sentencia->execute([$id]);
    $persona=$sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleindex.css">
    <link rel="stylesheet" href="./css/tablas.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <title>Document</title>
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
    <form action="updatedata.php" method="post">
        <table class="table2">
            <tr>
                <td>Nombres: </td>
                <td><input type="text" name="nombre2" value="<?php echo $persona->nombre; ?>" ></td>
            </tr>             
            <tr>
                <td>Apellidos: </td>
                <td><input type="text" name="apellido2" value="<?php echo $persona-> apellido;?>" ></td>
                
            </tr>               
            <tr>
                <td>Email:</td>
                <td><input type="text"  name="email2" value="<?php echo $persona->email;?>"></td>
                
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="pass2" value="<?php echo $persona->password; ?>" ></td>
            </tr>
            <tr>
                <input type="hidden" name="oculto">
                <input type="hidden" name="id2" value="<?php echo $persona->id; ?>">

                <td colspan="2"><input type="submit" value="Actualizar usuario"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>