<?php

//Capturamos el usuario y la contraseña provinente del formulario
$user = $_POST['nombre'];
$pass = $_POST['pass'];

//Parametros LDAP
$ldap_dn = "cn=$user,dc=daw2,dc=net";
$ldap_password = $pass;

$ldap_con = ldap_connect("localhost");
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

//SI la conexión se realiza correctamente
if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {
	
	session_start();
	$_SESSION["usuario"] = $user;
	$_SESSION["contra"] = $pass;
	
	include 'home.php';


} else {
	$errorPass = "<p>Usuario o contraseña incorrecta.</p>";
	include 'index.php';
}