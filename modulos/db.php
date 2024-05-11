<?php  
$usuario = "if0_36529662";
$contraseña = "itlwHTchnLmOAej";
const NOMBRE_BASE_DE_DATOS = "if0_36529662_okventa_by_parzibyte";
try {
    $base_de_datos = new PDO('mysql:host=sql307.infinityfree.com;dbname=' . NOMBRE_BASE_DE_DATOS, $usuario, $contraseña);
    $base_de_datos->query("set names utf8;");
	$base_de_datos->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
	$base_de_datos->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$base_de_datos->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC  );
} catch (PDOException $e) {
	echo json_encode( "Error fatal con la base de datos: " . $e->getMessage() );
}
?>