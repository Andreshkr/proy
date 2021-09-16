<?php 
    $destino="yecaxow402@sicmag.com";
    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $asunto=$_POST["asunto"];
    $mensaje=$_POST["mensaje"];
    $header="Correo contacto";
    $mensajeCompleto= $mensaje. "\nAtentamente: ". $nombre; 
    mail($destino,$asunto,$mensajeCompleto, $header);
    echo "<script>alert('Correo enviado')</script>";
    echo "<script>setTimeout(\"location.href='index.php'\",1000 )</script>";

            
?>