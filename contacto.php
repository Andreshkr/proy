<?php 
    include "conexion.php";
    try{
        $conexion=conexionBD();
        echo "";
     }catch(PDOException $err){
        echo "Conexion NO realizada <br>";
        var_dump($err->getMessage());
     }
    //error_reporting(0);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleindex.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/stylecontacto.css">
    <title>Contacto</title>
</head>
<body>
    <header>
        <div class="ancho">
            <div class="logo">
                <p><a href="index.php">SD Fast Food</a></p>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="menuf.php">Menú</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required> 
        <input type="text" name="correo" placeholder="Correo" required>
        <input type="text" name="asunto" placeholder="asunto" required>
        <textarea name="mensaje" cols="30" rows="10" placeholder="Mensaje" required></textarea>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.5859670884365!2d-74.11209305774102!3d4.667665393567758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b77d8fd8a8f%3A0xc27181e20ba0bd62!2sAv.%20Boyac%C3%A1%20%2348a-2%20a%2048a-94%2C%20Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1631205657467!5m2!1ses-419!2sco" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</body>
</html>
<?php 
    if(isset($_POST["enviar"])){  
        //echo "su pedido es "."<br>". $pizza1."<br>". $pizza2."<br>". $pizza3."<br>";
        $consulta=$conexion->prepare("insert into contacto (nombre,email,asunto,mensaje) values (:name,:email,:affair,:message)");
        $nombre=$_POST["nombre"];
        $correo=$_POST["correo"];
        $asunto=$_POST["asunto"];
        $mensaje=$_POST["mensaje"];
        $consulta->bindParam(":name",$nombre);
        $consulta->bindParam(":email",$correo);
        $consulta->bindParam(":affair",$asunto);
        $consulta->bindParam(":message",$mensaje);
        if($consulta->execute())
        {
        echo "Correo enviado";
        }else {
        echo "error";
        }
    }
?>