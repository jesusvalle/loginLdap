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


<?php 

//SESIÓN
session_start();
$_SESSION["usuario"] = $user;
$_SESSION["contra"] = $pass;

//Buscamos la información del usuario logueado en LDAP
$filter = "(cn=$user)";
$result = ldap_search($ldap_con,"dc=daw2,dc=net",$filter) or exit("Unable to search");
$entries = ldap_get_entries($ldap_con, $result);

//Guardamos los datos en variables PHP.
foreach ($entries as $row) {
	$nombre =  $row['cn'][0];
	$apellido = $row['sn'][0];
	$uidnumber = $row['uidnumber'][0];
	$uid = $row['uid'][0];
	$loginShell = $row['loginshell'][0];
	$homeD = $row['homedirectory'][0];
	$passHash = $row['userpassword'][0];
	$gidNumber = $row['gidnumber'][0];
	
}


?>

<body>
	<div class="container">
		<h1 id="home">Bienvenido a tu home, <?php echo "$nombre $apellido"; ?></h1>
		<div class="col-xs-12 hometext">
			<?php echo "<p>Tu uidnumber es: $uidnumber, tu uid es: $uid y tu gidNumber es: $gidNumber.</p><p>Tu loginShell es: $loginShell, tu home directory es: $homeD, y tu password Hash es: $passHash</p>"?>
			<p><a href="cambiar_pass.php?user=usuario&pass=contra">Cambiar contraseña.</a></p>
			<p><a href="logout.php">Cerrar sesión</a></p>
		</div>
	</div>
</body>