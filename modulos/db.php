<?php  
$usuario = "root";
$contraseña = "";
<<<<<<< HEAD
const NOMBRE_BASE_DE_DATOS = "id22144283_esquema";
=======
const NOMBRE_BASE_DE_DATOS = "okventa_by_parzibyte";
>>>>>>> 1f2055bc46406114baddd61be3854df0cb982548
try {
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . NOMBRE_BASE_DE_DATOS, $usuario, $contraseña);
    $base_de_datos->query("set names utf8;");
	$base_de_datos->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
	$base_de_datos->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$base_de_datos->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC  );
} catch (PDOException $e) {
	echo json_encode( "Error fatal con la base de datos: " . $e->getMessage() );
}
?>