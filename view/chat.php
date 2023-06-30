<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <title>chatbot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<style>
#canvas {
    border: 1px solid;
}
</style>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Abrir <i class="bi bi-robot"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <h3>ChatBot <i class="bi bi-robot"></i></h3>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="wrapper">
                        <div class="title"></div>
                        <div class="form">
                            <div class="bot-inbox inbox">
                                <div class="icon">
                                    <i class="bi bi-robot"></i>
                                </div>
                                <div class="msg-header">
                                    <p>Hola, ¿cómo puedo ayudarte?</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <div class="input-group">
                        <input id="data" type="text" class="form-control " placeholder="Escribe algo aquí..">
                        <button id="send-btn" class="btn btn-success ">Enviar</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->


    <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3">
                        <h2>Registro</h2>
                        <p>Favor de insertar los datos solicitados correctamente </p>
                        <form method="post" id="frm_registrar" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="usuario" name="usuario">
                                </div>
                                <div class="col-6 ">
                                    <input type="text" class="form-control" placeholder="Departamento"
                                        name="departamento">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="text" class="form-control" placeholder="descripción"
                                        name="descripcion">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="text" class="form-control" placeholder="observacion"
                                        name="observacion">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="text" class="form-control" value="Pendiente" placeholder="Estatus"
                                        name="estatus" id="estatus">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="text" class="form-control" placeholder="servicio" name="servicio">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type="date" class="form-control" placeholder="" name="fecha">
                                </div>
                                <div class="col-6 mt-2">
                                    <input type='hidden' name='imagen' id='imagen' />
                                </div>

                                <div class="col-6 mt-2">
                                    <button type="submit" class="btn btn-success" name="submit" id="submit"
                                        onclick='GuardarTrazado()'>Guardar</button>
                                </div>
                            </div>
                        </form>
                        <canvas class="mt-3" id='canvas' width="350" height="100" style='border: 1px solid #black;'>
                            <p>Tu navegador no soporta canvas</p>
                        </canvas>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" onclick='LimpiarTrazado()'>limpiar</button>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="clear" id="clear">limpiar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#clear").on('click', function(e) {

            e.preventDefault();
            LimpiarTrazado();
        });
    });
    </script>
    <script>
    function el(el) {
        return document.getElementById(el);
    }

    el("data").addEventListener("input", function() {
        el("send-btn").disabled = Boolean(this.value.length <= 0);
    });
    </script>
    <script>
    $(document).ready(function() {
        $("#send-btn").on("click", function() {
            $value = $("#data").val();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value +
                '</p></div></div>';

            $(".form").append($msg);
            $("#data").val('');
            // iniciar el código ajax
            $.ajax({
                url: '../controllers/message.php',
                type: 'POST',
                data: 'text=' + $value,
                success: function(result) {
                    $replay =
                        '<div class="bot-inbox inbox"><div class="icon"><i class="bi bi-robot"></i></div><div class="msg-header"><p class="text-break">' +
                        result + '</p></div></div></br>';
                    $(".form").append($replay);

          
                        
                        
                       

                    // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('submit', '#frm_registrar', function() {

            //Obtenemos datos.
            var data = $(this).serialize();
            alert(data);
            $.ajax({
                type: 'POST',
                url: "../controllers/Insert.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                success: function(data) {
                    if (data == 1) {
                        alert('Datos Registrados');
                    } else {
                        alert('Error de registro');
                    }
                }
            });

            return false;
        });
    });
    </script>
    <script>
    $('#form').on('show.bs.modal', function(event) {
       // $("#estatus ").val("");
        



    });
    </script>
    
    <script src="../ajax/canvas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>