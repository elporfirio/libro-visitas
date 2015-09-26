<?php

## Descomentar para versiones de PHP y MySQL actuales
## para evitar los errores de funciones obsoletas
ini_set('display_errors', '0');

class conectarBD
{
	public static function conectarse(){
		$conexionSQL = mysql_connect("localhost","homestead","secret");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("libro-visitas");
		return $conexionSQL;
	}
}

class operacionesBD
{
	private $registrovisitas;
	
	public function __construct(){
		$this->registrovisitas = array();
	}
	
	public function consultarVisitas(){
		$consulta = "SELECT * FROM librovisitas ORDER BY fecha DESC";
		$resultado = mysql_query($consulta,conectarBD::conectarse());
		
		if($consulta)
		{
			while($registro = mysql_fetch_assoc($resultado)){
			$this->registrovisitas[]=$registro;
			}
			return $this->registrovisitas;
		}
		else
		{
			echo "Error: ".mysql_errno().
			     " ".mysql_error();
			die;
		}
	}
	
	public function registrarVisitas($nombre,$mensaje){
		$consulta = "INSERT INTO librovisitas values (null,'$nombre','$mensaje', now())";
		
		$resultado = mysql_query($consulta,conectarBD::conectarse());
		
		if(!$resultado)
		{
			echo "Error no se ingresaron los datos: ".mysql_errno().
			     " ".mysql_error();
			//die;
		}
		
		}
}

?>