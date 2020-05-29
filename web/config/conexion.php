<?php
  try {
    #Pide las variables para conectarse a la base de datos.
		$db = parse_url(getenv("DATABASE_URL"));
		$db2 = parse_url(getenv("HEROKU_POSTGRESQL_PURPLE_URL"));
	
		$db_impar = new PDO("pgsql:" . sprintf(
				"host=%s;port=%s;user=%s;password=%s;dbname=%s",
				$db["host"],
				$db["port"],
				$db["user"],
				$db["pass"],
				ltrim($db["path"], "/")
			));
		$db_par = new PDO("pgsql:" . sprintf(
				"host=%s;port=%s;user=%s;password=%s;dbname=%s",
				$db2["host"],
				$db2["port"],
				$db2["user"],
				$db2["pass"],
				ltrim($db2["path"], "/")
			));
    # Se crea la instancia de PDO
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>