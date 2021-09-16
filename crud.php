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
   $sentencia=$conexion->query("SELECT * FROM users");
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
                    <li><a href="crudped.php">Ir a Pedidos</a></li>
                    <li><a href="crudinv.php">Ir a Inventario</a></li>
                    <li><a href="logout.php?logout=true">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br>
      <h1 class="lista">Lista de usuarios</h1>       
   <div id="main-container">
   <table class="table1">
      <tr id="thead">
         <td><b>ID</b></td>
         <td><B>Nombres</B></td>
         <td><b>Apellidos</b></td>
         <td><b>Email</b></td>
         <td><b>Password</b></td>
         <td><b>Actualizar</b></td>
         <td><b>Eliminar</b></td>
      </tr>
      <?php 
         foreach ($users as $dato) {
            ?>           
               <tr>
                  <td><?php echo $dato->id; ?></td>
                  <td><?php echo $dato->nombre; ?></td>
                  <td><?php echo $dato->apellido; ?></td>
                  <td><?php echo $dato->email; ?></td>
                  <td><?php echo $dato->password; ?></td>
                  <td> <a href="update.php?id=<?php echo $dato->id; ?>">Actualizar</a></td>
                  <td> <a href="delete.php?id=<?php echo $dato->id; ?>">Eliminar</a> </td>
               </tr>                  
            <?php
         }
      ?>
   </table>
   </div> 
   <br>
   <hr>
   <h2 id="agregar">Agregar usuario</h2>
   <div id="registrousuario">
   <form action="insert.php" method="post">
      <table class="table2">
      
         <tr>
            <td>Nombre:</td>
            <td><input type="text" name="nombre"></td>
         </tr>
         <tr>
            <td>Apellido:</td>
            <td><input type="text" name="apellido"></td>
         </tr>
         <tr>
            <td>Email:</td>
            <td><input type="text" name="email"></td>
         </tr> 
         <tr>
            <td>Password:</td>
            <td><input type="text" name="pass"></td>
         </tr>
         <input type="hidden" name="oculto" value="1">
         <tr>
            <td><input type="submit" name="enviar" value="Agregar usuario"></td>
            <td></td>
         </tr>  
      </table>
   </form>
   </div> 

</body>
</html>

