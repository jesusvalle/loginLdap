<?php

?>

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

	
		<!-- TITULO -->
		<h1 id="titulo">CAMBIO DE CONTRASEÑA</h1>
	
		<!-- FORMULARIO -->
		<div class="col-xs-offset-2 col-xs-8 form">
			<form enctype="application/json" action="pass.php" method="post">
				
				<div class="col-xs-offset-4 col-xs-4 styled-select" id="caja">
					
					<div class="col-xs-12 anti-padding">
						<p>Contraseña Antigua</p>
						<input type="password" name="pass" id="pass" placeholder="" tabindex=1>
						<p>Nueva Contraseña</p>
						<input type="password" name="passNueva" id="passNueva" placeholder="" tabindex=1>
						<input type="checkbox" name="humano" id="humano"><p class="check">Soy humano</p>
						<input type="checkbox" name="robot" id="robot"><p class="check">Soy un robot</p>
						<input type="submit" value="Entrar"/>
						
					</div>
					
				</div>
			</form> 
	
		</div>
	
	</body>

<?php



