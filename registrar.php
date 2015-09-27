<?php
require_once("clases.php");

//print_r($_POST);
//CAPTCHA
session_start();
$captcha = trim(strtolower(substr($_POST["verificacion"], 0, 6)));
$verificar = strtolower($_SESSION['captcha']['code']);

if ($captcha == $verificar) {
    if (isset($_POST['nombre_visitante']) && isset($_POST['mensaje_visitante'])) {
        $conexion = new Conexion();

        $comentario = new Comentario();
        $comentario->nombre = $_POST['nombre_visitante'];
        $comentario->mensaje = $_POST['mensaje_visitante'];

        $operador = new Operador();
        $operador->guardarComentario($conexion, $comentario);

        $respuesta = [
            "exitoso" => true,
            "mensaje" => "Dato Registrado"
        ];

        echo json_encode($respuesta);
    } else {
        echo "No has ingresado los datos para el registro";
        //header('Location: index.php');
    }
} else {
    $respuesta = [
        "exitoso" => false,
        "mensaje" => "La verificacion no es correcta"
    ];

    echo json_encode($respuesta);
}
