<?php if(isset($_REQUEST['cnf'])){
	if(($_REQUEST['cnf']=="true"))
		$message ="Su solicitud se ha generado con éxito.";
	if($_REQUEST['cnf']=="exists")
		$message="Ya existe un registro.";
	if($_REQUEST['cnf']=="false")
		$message="Problemas al generar la solicitud.";
}?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/garlic.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>
	<?php if(isset($message)){?>
			<script type="text/javascript">
				alert("<?=$message?>");
			</script>
	<?php }?>
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body class="fuelux">

<form id="msform" data-persist="garlic" action="save.php" method="post">

	<ul id="progressbar">
		<li class="active">Datos personales</li>
		<li>Otros datos</li>
	</ul>

	<fieldset>
		<h2 class="fs-title">Datos Personales</h2>
		<h3 class="fs-subtitle">Primer Paso</h3>
		<input type="text" name="document" id="document" class="validateField" placeholder="Documento">
		<select name="doctype" id="doctype" class="validateField">
			<option value="">Tipo de Documento</option>
			<option value="1">Tarjeta de Identidad</option>
			<option value="2">Cédula de Ciudadanía</option>
			<option value="3">Cédula de Extranjeria</option>
			<option value="4">Pasaporte</option>
		</select>
		<input type="text" name="name" id="name" class="validateField" placeholder="Primer nombre" />
		<input type="text" name="sname" placeholder="Segundo nombre" />
		<input type="text" name="lname" class="validateField" id="lname" placeholder="Primer apellido" />
		<input type="text" name="slname" placeholder="Segundo apellido" />
		<input type="email" name="email" class="validateField" id="email" placeholder="Correo" data-parsley-trigger="change"/>
		<input type="button" name="Siguiente" class="next  btn action-button" value="Siguiente"/>
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Información Adicional</h2>
		<h3 class="fs-subtitle">Segundo paso</h3>
		<select name="gender" id="gender" class="validateSubmitField">
			<option value="">Género</option>
			<option value="1">Masculino</option>
			<option value="2">Femenino</option>
		</select>
		<input type="text" name="address" id="address" class="validateSubmitField" placeholder="Dirección" />
		<input type="text" name="city" id="city" class="validateSubmitField" placeholder="Ciudad" />
		<input type="text" name="department" class="validateSubmitField" id="department" placeholder="Departamento" />
		<input type="text" name="country" class="validateSubmitField" id="country" placeholder="País" />
		<textarea name="message" class="validateSubmitField" placeholder="Escriba su mensaje aqui" id="message"></textarea>
		<input type="button" name="Anterior" class="previous action-button" value="Anterior" />
		<input type="submit" name="submit" class="submit action-button" value="Enviar" />
	</fieldset>
</form>
<script type="text/javascript" src="js/steps.js"></script>
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
</body>
</html>