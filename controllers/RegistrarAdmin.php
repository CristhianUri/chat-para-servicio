<?php 
    include '../Db/conexion.php';

    $nombre = $_POST['nombre'];
    $apellidos= $_POST['apellidos'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $password2= $_POST['password2'];
    
        # code...

        # code...
        if ($password === $password2 && $password !="" &&$password2!="" ) {
       
            $resgis = $bd->prepare("INSERT INTO admin (nombre ,Apellidos, contraseña, email) VALUES (?,?,?,?);");
            $execute = $resgis->execute([$nombre, $apellidos,$password, $email]);

           echo $execute;
        }
   
        
      
   
?>