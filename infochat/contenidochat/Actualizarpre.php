<?php
include "../../Db/conexion.php";
//Actualizamos la infomación almacenada en la memoria del chat
    $id = $_POST['id'];
    $resposne = $_POST['responses'];
    $queries = $_POST['queries'];

    $update = $bd -> prepare("UPDATE chatbot SET responses=? , queries=? WHERE Id_Chat = $id;");
    $action = $update ->execute([$resposne, $queries]);



    if ($action == true) {
        # code...
        header("location: ../../view/admin/contenidochat.php");
    }

?>