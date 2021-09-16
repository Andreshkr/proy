<?php
    session_start();
   $mensaje=""; 
   if (isset($_POST['btnaccion'])) {
       switch ($_POST['btnaccion']) {
           case 'Agregar':
               if(is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))){
                $ID=openssl_decrypt( $_POST['id'],COD,KEY);
                $mensaje="Ok ID correcto". $ID;
               }else {
                $mensaje="Upss ID incorrecto". $ID;
               }
               if (!isset($_SESSION['CARRITO'])) {
                   $producto=array(
                       'ID'=>$ID,
                       'NOMBRE'=>$ID,
                       'CANTIDAD'=>$ID,
                       'PRECIO'=>$ID
                   );
                   $_SESSION['CARRITO'][0]=$producto;
               }else{
                   $numeroProductos=count($_SESSION['CARRITO']);
                   $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$ID,
                    'CANTIDAD'=>$ID,
                    'PRECIO'=>$ID
                );
                $_SESSION['CARRITO'][$numeroProductos]=$producto;
               }
               $mensaje=print_r($_SESSION,true);

            break;
           
           
       }
   }
?>