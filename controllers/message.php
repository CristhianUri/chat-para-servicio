<?php
// conectando a la base de datos
include '../Db/conexion.php';

// obteniendo el mensaje del usuario a través de ajax
$getMesg =  $_POST['text'];

if (!$getMesg=="") {
  
    
        # code..
    //comprobando la consulta del usuario a la consulta de la base de datos
    $check_data = $bd->query("SELECT responses FROM chatbot WHERE queries LIKE '%$getMesg%'");
    $check_data -> execute();
    //recuperando la reproducción de la base de datos de acuerdo con la consulta del usuario
    $data = $check_data->fetchAll(PDO:: FETCH_ASSOC);

    // si la consulta del usuario coincide con la consulta de la base de datos, mostraremos la respuesta; de lo contrario, irá a otra declaración
    if ($check_data -> rowCount()) {
        foreach ($data as $datos) {
        # code...
        //almacenando la respuesta a una variable que enviaremos a ajax
            $replay = $datos['responses'];
            echo $replay;
            }
        // mediante el switch evaluamos la información almacenada en la valiable getMesg para saber a cual 
        //formato PDF se debe de enviar 
        switch ($getMesg) {
            case '1':
                $qr = $bd->query("SELECT ID_Servicio, Descripcion FROM servicio Where usuario = 'Victor'");
                $q = $qr ->fetchAll(PDO::FETCH_ASSOC);
                foreach ($q as $q2) {
                    # code...
                    $replay2 = ' </br>'.$q2['ID_Servicio'].'' ." ".' '.$q2['Descripcion'].'';
                    echo $replay2;
                }
                
           
                break;
                case '2':
                    # code...
                    $replay2 = '<a href="#" class=" text-white" data-bs-toggle="modal" data-bs-target="#form">
                   Presiona aqui
                  </a>';
               echo $replay2;
                    break;
           
            default:
                # code...
                break;
        }
    } else {
        echo "¡Lo siento, no tengo una respuesta a esa pregunta por el momento";

        //con este query almacenamos las preguntas que no contemplamos en la tabla noresponse
        $query = $bd-> prepare("INSERT INTO noresponse (queries2) VALUES (?);");
        $execute = $query -> execute([$getMesg]);
    }

} else {
    # code...
    echo "Porfavor ingresa una pregunta";
}

?>