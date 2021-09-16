<?php
    function conexionBD()
    {
        return new PDO('mysql:host=localhost;dbname=proy', 'root','');
    }
 ?>