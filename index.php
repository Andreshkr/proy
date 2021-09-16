<?php


//if(!$_SESSION['id']){
// header('location:login.php');
//}

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
    
    <title>Document</title>
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
    <div class="frase">
        <h1>Bienvenido a SD Fast Food</h1>
        <br>
        <h2>Los mejores platillos y la mejor calidad</h2>
        <br>
    </div>
    <div class="about">
        <h1>Nosotros</h1>
        <p>
            <h3>
            Somos un restaurante con 20 años de experiencia en el sector <br> de pizzerías y 
            con más de 10 años de trabajo para que <br> los clientes disfruten tanto la experiencia 
             como la calidad <br> y variedad de pizzas y mas comidas rápidas.
            </h3>
        </p>
    </div>
    <div class="sdfast">
        <img src="./img/Captura (1).png" alt="" width="250px">
    </div>    
</body>
</html>