<?php

## Descomentar para versiones de PHP y MySQL actuales
## para evitar los errores de funciones obsoletas
#ini_set('display_errors', '0');

class Comentario
{
    public $nombre;
    public $mensaje;
    public $validador;
    public $fecha;
}

class Conexion
{
	private $domain = "localhost";
	private $database = "libro-visitas";
	private $user = "homestead";
	private $password = "secret";

	public $acceso = null;

	public function __construct(){
        try {
            $this->acceso = new PDO(
                'mysql:host=' . $this->domain . ';dbname=' . $this->database .';port=3306',
                $this->user,
                $this->password,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            //$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo "<strong>Error de Conexión: </strong>" . $ex->getMessage() . "<br>";
            die();
        }
	}
}

class Operador
{
    public $comentarios = [];

    public function consultarComentarios(Conexion $conexion){
        $resultado = null;
		$consulta = "SELECT * FROM librovisitas ORDER BY fecha DESC";

		try{
			$stmt = $conexion->acceso->prepare($consulta);

			if($stmt->execute()){
				$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


                foreach($resultados as $resultado){
                    #creaamos un objeto comentario
                    $comentario = new Comentario();
                    $comentario->nombre = $resultado['nombre'];
                    $comentario->mensaje = $resultado['comentario'];
                    $comentario->fecha = $resultado['fecha'];

                    $this->comentarios[] = $comentario;
                }
			}
		} catch (PDOException $ex){
			echo "<strong>Error de ejecución: </strong>" . $ex->getMessage() . "<br>";
			die();
		}
	}
	
	public function guardarComentario(Conexion $conexion, Comentario $comentario){
		$consulta = 'INSERT INTO librovisitas values (null, :nombre, :mensaje, now())';

		try{
			$stmt = $conexion->acceso->prepare($consulta);

			$stmt->bindParam(':nombre', $comentario->nombre);
			$stmt->bindParam(':mensaje', $comentario->mensaje);

			if($stmt->execute()){
				return $conexion->acceso->lastInsertId(); //Devuelve el último ID que se inserta
			}
		} catch (PDOException $ex){
			echo "<strong>Error de ejecución: </strong>" . $ex->getMessage() . "<br>";
			die();
		}
	}
}

?>