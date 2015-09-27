<?php
/**
 * Created by PhpStorm.
 * User: elporfirio
 * Date: 26/09/15
 * Time: 23:41
 */


require_once("clases.php");

$conexion = new Conexion();

#$comentario = new Comentario();
$operador = new Operador();
$operador->consultarComentarios($conexion);

$comentarios = $operador->comentarios;

$htmlToRender = "";
foreach($comentarios as $comentario)
{
    $htmlToRender .= "<tr>".
                        "<td>" . $comentario->nombre . "</td>".
                        "<td>" . $comentario->mensaje . "</td>".
                        "<td align=\"center\">" . $comentario->fecha . "</td>".
                    " </tr>";
}

echo $htmlToRender;