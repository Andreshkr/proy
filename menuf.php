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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylemenu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/stylecontacto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <title>Menú</title>
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
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="./img/pizzaatun.jpg" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Pizza atun $10.000</h5>
                        <p class="card-text">pimiento, champiñon, queso</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="./img/pizzamarg.jpg" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Pizza Margarita $10.000</h5>
                        <p class="card-text">tomate, queso, albahaca</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="./img/pizzaverd.jpg" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Pizza de Verduras $10.000</h5>
                        <p class="card-text">berenjena, pimiento, aceituna </p>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="./img/h1.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa Vegetariana $15.000</h5>
                        <p class="card-text">Frijol, lenteja, vegetales</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="./img/h2.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa clásica $15.000</h5>
                        <p class="card-text">Carne, huevo, queso</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="./img/h3.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa de pollo $15.000</h5>
                        <p class="card-text">huevo, queso , verdurast</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <form method="POST">
        <h2>Hacer pedido</h2>
        <input type="text" name="nombreap" placeholder="Nombres y Apellidos" required> 
        <input type="text" name="direccion" placeholder="Dirección" required> 
        <input type="text" name="correo" placeholder="Correo" required>
        <textarea name="pedido" cols="30" rows="10" placeholder="Pedido" required></textarea>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
<?php 
    if(isset($_POST["enviar"])){  
        //echo "su pedido es "."<br>". $pizza1."<br>". $pizza2."<br>". $pizza3."<br>";
        $consulta=$conexion->prepare("insert into pedidos (nombre,direccion,email,pedido) values (:name,:adress,:email,:order)");
        $nombre=$_POST["nombreap"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $pedido=$_POST["pedido"];
        $consulta->bindParam(":name",$nombre);
        $consulta->bindParam(":adress",$direccion);
        $consulta->bindParam(":email",$correo);
        $consulta->bindParam(":order",$pedido);
        if($consulta->execute())
        {
        echo "<script>alert('Pedido enviado correctamente!!')</script>";
        }else {
        echo "error";
        }
    }
?>
</body>
</html>