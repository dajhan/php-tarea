<?php
// si no proviene del formulario, redireccionar
if(!isset($_POST['email'])) {
    header('Location: index.php');
}
	
// verficar campos de formulario
$errores = [];
if(empty($_POST['email'])) {
    $errores[] = "Falta su <strong>email</strong>";
} else {
    $varEmail = $_POST['email'];
}

if(empty($_POST['password'])) {
    $errores[] = "Falta su <strong>password</strong>";
} else {
    $varPassword = $_POST['password'];
}

if(empty($_POST['nombre'])) {
    $errores[] = "Falta su <strong>nombre</strong>";
} else {
    $varNombre = $_POST['nombre'];
}

if(empty($_POST['apellido'])) {
    $errores[] = "Falta su <strong>apellido</strong>";
} else {
    $varApellido = $_POST['apellido'];
}
if(empty($_POST['sexo'])) {
    $errores[] = "Falta su tipo de <span>sexo</span>";
} else {
    $varMaFe = trim( $_POST['sexo']);
}

if(empty($_POST['pais'])) {
    $errores[] = "Falta poner su <strong>pais</strong>";
} else {
    $varPais = $_POST['pais'];
}
if(empty($_POST['terminos'])) {
    $errores[] = "Falta aceptar <strong>terminos</strong>";
} else {
    $varTerminos = $_POST['terminos'];
}

// si hay errores mostrar página de error
// de lo contrario guardar registro en csv y mostrar datos registrados
if(!empty($errores)) {

    include_once("registro_error.php");

} else {

    //escribir archivo
    $fs = fopen("registros.csv","a");//append = a a
    fwrite($fs, $varEmail . ", " . $varPassword .",". $varApellido. "," .$varMaFe."," .$varPais."\n");
    fclose($fs);

    include_once("registro_ok.php");

}