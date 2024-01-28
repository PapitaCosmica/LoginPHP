<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start(); ?>
    <nav>
        <ul>
            <li>
                <a href="index.php?action=inicio">Inicio</a>
            </li>

           <!-- <li>
                <a href="index.php?action=registro">Registro</a>
            </li>
-->
         <?php 

         
         if (isset($_SESSION["validar"])){
           if($_SESSION["validar"]){
            echo "<li> <a href='index.php?action=salir'>Salir</a> </li>";
            
          
           } 
         }  else { 
            echo "<li> <a href='index.php?action=ingresar'>Ingresar</a> </li>";}
         ?>
        
          <!--  <li>
                <a href="index.php?action=ingresar">Ingresar</a>
            </li>
         -->
            <li>
                <a href="index.php?action=servicios">Servicios</a>
            </li>

            <li>
                <a href="index.php?action=contacto">Contacto</a>
            </li>
            
        </ul>
    </nav>
</body>
</html>