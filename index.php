<?php
//CAPTCHA
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Libro de Visitas // desarrollado by elporfirio.com</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="contenido">
	<div id="area_formulario">
    <h2>Gracias por tus comentarios</h2>
    <form action="registrar.php" method="post" name="formulario_visitas" id="formulario_visitas">
          <label>Nombre:</label>
          <input name="nombre_visitante" id="nombre" type="text" required>
          <br><br>
          <label>Mensaje:</label>
          <textarea name="mensaje_visitante" id="mensaje" cols="40" rows="5" required></textarea>
          <br><br>
          <label>¿Eres humano?:</label>
          <img src="<?php echo $_SESSION['captcha']['image_src'] ?>">
          <input name="verificacion" id="captcha" type="text" required>
          <br><br>
          <input type="submit" class="boton" id="boton" value="enviar comentario">
    </form>
    </div>
    <br>
    <div id="respuesta" style="display: none">

    </div>
    <br>
    <div id="area_comentarios">
      <table>
        <h2>Comentarios anteriores</h2>
        <thead>
        <tr>
          <th width="20%" scope="col">Nombre</th>
          <th width="66%" scope="col">Mensaje</th>
          <th width="14%" scope="col">Fecha</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
      </table>      
    </div>
   <p class="creditos">Desarrollado by <a href="http://www.elporfirio.com">elporfirio.com</a> en base a <a href="http://www.cesarcancino.com">Cesar Cancino</a></p>
</div>

<script src="jquery.js"></script>
<script>
    $(document).ready(function(){

        var traerDatos = function (){
            $.get("consultar.php", function(respuesta){
                $("tbody").html(respuesta);
            });
        };

        function quitarRespuesta(){
            setTimeout(function(){
                $("#respuesta").fadeOut();
            }, 3000);
        }


        function registrarDatos(){
            var nombre = $("#nombre").val();
            var mensaje = $("#mensaje").val();
            var captcha = $("#captcha").val();

            $.post("registrar.php",{
                verificacion : captcha,
                nombre_visitante : nombre,
                mensaje_visitante : mensaje
            }, function(data){
                if(data.exitoso == false){
                    $("#respuesta")
                        .text(data.mensaje)
                        .removeClass()
                        .addClass('no_exitoso')
                        .fadeIn();
                    $("#captcha").val('');
                    quitarRespuesta();
                } else {
                    traerDatos();
                    $("#respuesta")
                        .text(data.mensaje)
                        .removeClass()
                        .addClass('exitoso')
                        .fadeIn();

                    $("#nombre").val('');
                    $("#mensaje").val('');
                    $("#captcha").val('');
                    quitarRespuesta();
                }
            }, 'json');
        }

        $("#formulario_visitas").on("submit", function(evento){
            evento.preventDefault();

            registrarDatos();
        });

        traerDatos();
    });
</script>
</body>
</html>