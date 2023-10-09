<?php
session_start();
include "conexion.php";
$user = $_POST["user"];
$password = $_POST["password"];  
$resultado = mysqli_query($con, "select * from personas where id_persona='$user'" );
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($con));
}
$fila = mysqli_fetch_assoc($resultado);

if ($user == $fila['id_persona'] && $password == $fila['contra']) {
    $_SESSION["user"] = $user;
    $_SESSION["color"] =$fila['color'];
    $resultado = mysqli_query($con, "select * from docente where id_persona='$user'" );
    $docente = mysqli_fetch_assoc($resultado);
    if(isset($docente['id_persona']))
    $_SESSION["rol"]="docente";
     else
     $_SESSION["rol"]= "estudiante";
    header("Location: panel.php");
}
else
   header("Location: login.php");
