<?php 
    include "../Db/conexion.php";

    $email = $_POST['email'];
    $pasword= $_POST['password'];
    //veridicamos que el email y contraseña no este vacia 
    if ($email=="" && $password=="") {
        # code...
        header("location: ../view/admin/index.php");
    } else{
        // si no esta vacio buscamos en la base de datos el email y contraseña mediante el email
        $valid = $bd->prepare("SELECT email, contraseña FROM admin WHERE email=?;");
        $execute =$valid->execute([$email]);
        $resul = $valid->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($resul as $row) {
            # code...
            //validamos que el email y contraseña sean iguales a los datos que ingresamos en el formulario
            if ($row['email']===$email && $row['contraseña']===$pasword) {
                # code...
                //si se cumple iniciamos sesion
                session_start();
                
                $_SESSION['email']= $email;
                header("location: ../view/admin/admin.php");
            }else{
                header("location: ../view/admin/index.php?error=false"); 
            }
        }
    }
?>