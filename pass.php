 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="989988623632-65hh1ttbr3bj5bnmcuv5hgdg2g5gcugm.apps.googleusercontent.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>LOGINAPP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

	<div class="container">

		<div class="col-xs-12 hometext">


<?php

//comenchario

session_start();
$user = $_SESSION["usuario"];
$pass = $_SESSION["contra"];
$passVieja = $_POST["pass"];
$passNueva = $_POST["passNueva"];
$humano = $_POST["humano"];
$robot = $_POST["robot"];


//CONEXION
$ldap_con = ldap_connect("localhost");
$ldap_dn = "cn=$user,dc=daw2,dc=net";
$ldap_password = $pass;
ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);


if(isset($humano) && !isset($robot)){
	if(isset($user) and isset($passNueva) and isset($pass)) {
		
		//SI LA CONTRASEÑA ANTIGUA SE HA INTRODUCIDO CORRECTAMENTE:
		if($pass == $passVieja){
			$ldapbind = ldap_bind($ldap_con, $ldap_dn, $ldap_password);
			
			if($ldapbind) {
				
				if(ldap_mod_replace ($ldap_con, $ldap_dn,
						array('userpassword' => "{MD5}".base64_encode(pack("H*",md5($passNueva)))))) {
							echo "<p>Cambio de contraseña correcto</p>";
							echo "<p><a href='logout.php'>Volver a loguearse</a></p>";
						}else{
							echo "<p>Cambio de contraseña erróneo</p>";
							echo "<p><a href='cambiar_pass.php'>Volver</a></p>";
						}
			}else{
				echo "ERROR, no se ha podido tramitar el cambio de contraseña debido a un fallo de los parámetros de la aplicación..";
				echo "<p><a href='cambiar_pass.php'>Volver</a></p>";
			}
		}else{
			echo "<p>Error. Contraseña actual incorrecta.";
			echo "<p><a href='cambiar_pass.php'>Volver</a></p>";
		}
		
	}
}else if(isset($robot)){
	echo "<p>Error. Si eres un robot, no se te permite el acceso.";
	echo "<p><a href='cambiar_pass.php'>Volver</a></p>";
}else if(!isset($humano)){
	echo "<p>Error. Debes marcar que eres un humano para continuar.";
	echo "<p><a href='cambiar_pass.php'>Volver</a></p>";
}

?>
	
		</div>
	
	</div>

</body>