<?php
/**
 * Created by PhpStorm.
 * User: elporfirio
 * Date: 26/09/15
 * Time: 13:32
 */

require('clases.php');

#definir nuestra id de acceso
$conexion = new Conexion();

#definir nuestro objeto comentario
$comentario = new Comentario();
$comentario->nombre = "Cesar Cancino";
$comentario->mensaje = "visita capa8.tv";

#definimos a la persona que nos ayuda y hace las acciones
$operador = new Operador();
$operador->guardarComentario($conexion, $comentario);

$operador->consultarComentarios($conexion);

var_dump($operador->comentarios);