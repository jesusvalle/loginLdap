<?php
//
//Iniciamos la sesión
session_start();

//Cerramos la conexión Ldap
ldap_close($ldap_con);

// Destruimos las variables de sesión
session_unset();

// Destruimos la sesión
session_destroy(); 

//Llamamos al archivo index.php
include 'index.php';