<?php
include '../Db/conexion.php';
//actualizamos la informacion del PDF encaso de haber registrado mal algun dato
$id=$_POST['aid'];
$fecha=$_POST['aFecha'];
$usuario=$_POST['aUsuario'];
$descripcion=$_POST['aDescripcion'];
$observacion=$_POST['aObservacion'];
  

$sentencia = $bd->prepare("UPDATE servicio SET Fecha=?   Usuario=?, Descripcion=?, Observacion=? WHERE ID_Servicio=$id;");
$resultado = $sentencia->execute([$fecha,$usuario, $descripcion,$observacion]);

echo $resultado;

?>