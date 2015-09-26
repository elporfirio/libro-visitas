<?php

## Descomentar para versiones de PHP y MySQL actuales
## para evitar los errores de funciones obsoletas
#ini_set('display_errors', '0');

class conectarBD
{
	private $domain = "localhost";
	private $database = "libro-visitas";
	private $user = "homestead";
	private $password = "secret";

	public $conexion = null;

	public function conectarse(){
		try {
			$this->conexion = new PDO(
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

	public function __construct(){
		$this->conectarse();
	}
}

class operacionesBD
{
	private $registrovisitas;
	
	public function __construct(){
		$this->registrovisitas = [];
	}

	public function obtenerRegistroVisitas(){
		return $this->registrovisitas;
	}
	
	public function consultarVisitas($conexion){
		$consulta = "SELECT * FROM librovisitas ORDER BY fecha DESC";

		try{
			$stmt = $conexion->prepare($consulta);

			if($stmt->execute()){
				$this->registrovisitas = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
		} catch (PDOException $ex){
			echo "<strong>Error de ejecución: </strong>" . $ex->getMessage() . "<br>";
			die();
		}
	}
	
	public function registrarVisitas($conexion, $nombre, $mensaje){
		$consulta = 'INSERT INTO librovisitas values (null, :nombre, :mensaje, now())';

		try{
			$stmt = $conexion->prepare($consulta);

			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':mensaje', $mensaje);

			if($stmt->execute()){
				return $conexion->lastInsertId(); //Devuelve el último ID que se inserta
			}
		} catch (PDOException $ex){
			echo "<strong>Error de ejecución: </strong>" . $ex->getMessage() . "<br>";
			die();
		}
	}
}

?>