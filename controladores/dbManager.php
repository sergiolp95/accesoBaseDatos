<?php
 
/**
* PDO Clase
*
*/
class gestorBD
{
	// Constantes de Conexión a la BBDD
	/*private $host = "fdb6.biz.nf";
	private $user = "1438721_cms";
	private $pass = "biznfalev";
	private $dbname = "1438721_cms";*/
	
	private $host = "mysql.hostinger.es";
	private $user = "u316672289_admin";
	private $pass = "cagoenla";
	private $dbname = "u316672289_acces";
	
	private $dbh; // El objeto que representa nuestra BBDD
	private $error; // Almacena el posible error que hayamos encontrado

	private $stmt; // Almacena la Query
/**
* CONSTRUCTOR
*/
public function __construct()
{
	
	// Info de la BBDD:
	$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
	
	// Fijamos opciones:
	$options = array(
   		 PDO::ATTR_PERSISTENT => true, // Una conexión persistente a un BBDD es más efectiva. Se puede reutilziar. 
    	 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Para indicarle que queremos gestionar las Excepciones
		 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	);
	
	try {
		// Construimos el objeto PDO de conexión a la BBDD:
		$this->dbh = new PDO($dsn,$this->user,$this->pass, $options);	
		
	}catch (PDOException $e) {
		
		// Gestión de Excepciones:
    	$this->error = $e->getMessage();
	    throw new Exception("GestorBD error en el CONSTRUCT -->".$e->getMessage());
	}

}

// Se encarga de preparar una Consulta SQL a la BBDD
public function query($query){
    $this->stmt = $this->dbh->prepare($query);
}


// Se encarga de guardar los valores dinámicos de la consulta SQL en los "huecos".
//param: es el nombre del hueco
//value: es el valor
//type: es el tipo de dato (entero, booleano, string...)

public function bind($param, $value){
	
     if (is_int($value))
            $type = PDO::PARAM_INT;
     if( is_bool($value))
             $type = PDO::PARAM_BOOL;
     if (is_null($value))
              $type = PDO::PARAM_NULL;     
     if(is_string($value))
              $type = PDO::PARAM_STR;
        
	// "Enlazamos" el valor a la sentencia preparada
    $this->stmt->bindValue($param, $value, $type);
}

// Ejecutamos la sentencia SQL
public function execute(){
	
	try
	{
    	return $this->stmt->execute();
		
	}catch (PDOException $e) {
	  
		 throw new Exception("GestorBD error en el EXECUTE -->".$e->getMessage());
	}
}


/********* TRATAMIENTO DE RESULTADOS ******/

// Recuperamos un array de resultados
public function resultset(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Recuperamos sólo un resultado
public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
}

// Devuelve la cantidad de elementos que han sido insertados, actualziados o borrados...
public function rowCount(){
    return $this->stmt->rowCount();
}

// Devuelve (en String) el último elemento insertado
public function lastInsertId(){
    return $this->dbh->lastInsertId();
}

} // Fin de la Clase gestorBD
?>