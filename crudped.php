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
   $sentencia=$conexion->query("SELECT * FROM pedidos");
   $users=$sentencia->fetchAll(PDO::FETCH_OBJ);
   //print_r($users);

   ?>
   <!DOCTYPE html>
   <html lang="es">
   
   <head>
       <title>Usuarios</title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="./css/styleindex.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="./css/tablas.css">
   </head>
   
   <body>
   <header>
        <div class="ancho">
            <div class="logo">
                <p><a href="crud.php">SD Fast Food</a></p>
            </div>
            <nav>
                <ul>                     
                    <li><a href="crudinv.php">Ir a Inventario</a></li>
                    <li><a href="crud.php">Ir a Usuarios</a></li>
                    <li><a href="logout.php?logout=true">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br>
      <h1 class="lista">Lista de pedidos</h1>       
   <div id="main-container">
   <table class="table1">
      <tr id="thead">
         <td><b>ID</b></td>
         <td><B>Nombres</B></td>
         <td><b>Dirección</b></td>
         <td><b>Email</b></td>
         <td><b>Pedido</b></td>
         <td><b>Eliminar</b></td>
      </tr>
      <?php 
         foreach ($users as $dato) {
            ?>           
               <tr>
                  <td><?php echo $dato->id; ?></td>
                  <td><?php echo $dato->nombre; ?></td>
                  <td><?php echo $dato->direccion; ?></td>
                  <td><?php echo $dato->email; ?></td>
                  <td><?php echo $dato->pedido; ?></td>
                  <td> <a href="deleteped.php?id=<?php echo $dato->id; ?>">Eliminar</a> </td>
               </tr>                  
            <?php
         }
      ?>
   </table>
   </div> 
</body>
</html>