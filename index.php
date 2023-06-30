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
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

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
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Show a second modal and hide this one with the button below.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open
                        second modal</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frm_actualizar" method="post">
                        <div class="mb-3">
                            <label for="aid" class="form-label">id</label>
                            <input type="text" class="form-control" name="aid" value="" id="aid" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aFecha" class="form-label">Fecha</label>
                            <input type="text" class="form-control" name="aFecha" value="" id="aFecha" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="aUsuario" value="" id="aUsuario"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aDepartamento" class="form-label">Departamento</label>
                            <input type="text" class="form-control" name="aDepartamento" value="" id="aDepartamento"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aDescripcion" class="form-label">Observacion</label>
                            <input type="text" class="form-control" name="aDescripcion" value="" id="aDescripcion"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="aObservacion" class="form-label">Observacion</label>
                            <input type="text" class="form-control" name="aObservacion" value="" id="aObservacion"
                                placeholder="">
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="submit" name="btn_editar" id="btn_editar"
                                class="btn btn-primary">Actualizar</button>
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="submit" name="btn_eliminar" id="btn_eliminar"
                                class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to
                        first</button>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first
        modal</button>


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
            alert($value);
            $.ajax({
                url: '../controladores/mensaje.php',
                type: 'POST',
                data: 'text=' + $value,
                success: function(result) {
                    $replay =
                        '<div class="bot-inbox inbox"><div class="icon"><i class="bi bi-robot"></i></div><div class="msg-header"><p class="text-break">' +
                        result + '</p></div></div></br>';
                    $(".form").append($replay);


                    $replay2 =
                        '<div class="bot-inbox inbox"><div class="icon"><i class="bi bi-robot"></i></div><div class="msg-header"><p class="text-break">' +
                        result + '</p></div></div></br>';
                    $(".form").append($replay2);



                    // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
    </script>

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