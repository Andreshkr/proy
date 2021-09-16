<?php
   session_start();
   include "conexion.php";
   if(!$_SESSION['id']){
     header('location:login.php');
   }
    
    try{
        $conexion=conexionBD();
        echo "";
     }catch(PDOException $err){
        echo "Conexion NO realizada <br>";
        var_dump($err->getMessage());
     }
   $sentencia=$conexion->query("SELECT * FROM inventario");
   $users=$sentencia->fetchAll(PDO::FETCH_OBJ);
   //print_r($users);

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
   <title>Inventario</title>
</head>
<body>
<header>
        <div class="ancho">
            <div class="logo">
                <p><a href="crudinv.php">SD Fast Food</a></p>
            </div>
            <nav>
                <ul>                    
                    <li><a href="crud.php">Ir a pedidos</a></li>
                    <li><a href="crud.php">Ir a Usuarios</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

   <br>
   <h1 class="lista">Lista Inventario</h1>
   <div id="main-container">
   <table class="table1">
      <tr id="thead">
         <td> <b>ID</b> </td>
         <td><b>Producto</b></td>
         <td><b>Cantidad</b></td>
         <td><b>Marca</b></td>
         <td><b>Proveedor</b></td>
         <td><b>Actualizar</b></td>
         <td><b>Eliminar</b></td>
      </tr>
      <?php 
         foreach ($users as $dato) {
            ?>           
               <tr>
                  <td><?php echo $dato->id; ?></td>
                  <td><?php echo $dato->producto; ?></td>
                  <td><?php echo $dato->cantidad; ?></td>
                  <td><?php echo $dato->marca; ?></td>
                  <td><?php echo $dato->proveedor; ?></td>
                  <td> <a href="updateinv.php?id=<?php echo $dato->id; ?>">Actualizar</a></td>
                  <td> <a href="deleteinv.php?id=<?php echo $dato->id; ?>">Eliminar</a> </td>
               </tr>                  
            <?php
         }
      ?>
   </table>
   </div>
   <br>
   <hr>
   <br>
   <h2 id="agregar">Agregar insumo</h2>
   <div id="registrousuario">
   <form action="insertinv.php" method="post">
      <table class="table2">
         <tr>
            <td>Producto:</td>
            <td><input type="text" name="producto"></td>
         </tr>
         <tr>
            <td>Cantidad:</td>
            <td><input type="text" name="cantidad"></td>
         </tr>
         <tr>
            <td>Marca:</td>
            <td><input type="text" name="marca"></td>
         </tr> 
         <tr>
            <td>Proveedor:</td>
            <td><input type="text" name="proveedor"></td>
         </tr>
         <input type="hidden" name="oculto" value="1">
         <tr>
            <td><input type="submit" name="enviar" value="Agregar Insumo"></td>
            <td></td>
         </tr>  
      </table>
   </form>
   </div>
</body>
</html>

