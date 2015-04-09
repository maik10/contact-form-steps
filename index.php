<?php 
include_once('lang/es.lang.php');
$lang = new langES();
if(isset($_REQUEST['lang'])){
	if($_REQUEST['lang']=='en'){
		include_once('lang/en.lang.php');
		$lang = new langEN();
	}
}
if(isset($_REQUEST['cnf'])){
	if(($_REQUEST['cnf']=="true"))
		$message =$lang->values['messageTrue'];
	if($_REQUEST['cnf']=="exists")
		$message=$lang->values['messageExists'];
	if($_REQUEST['cnf']=="false")
		$message=$lang->values['messageFalse'];
}?>
<!DOCTYPE html>
<html lang="<?=$lang->values['lang']?>">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/garlic.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body class="fuelux">

<form id="msform" data-persist="garlic" action="save.php" method="post">

	<ul id="progressbar">
		<li class="active"><?=$lang->values['firstTitle']?></li>
		<li><?=$lang->values['secondTitle']?></li>
	</ul>

	<fieldset>
		<h2 class="fs-title"><?=$lang->values['firstTitle']?></h2>
		<h3 class="fs-subtitle"><?=$lang->values['secondTitle']?></h3>
		<input type="text" name="document" id="document" class="validateField" placeholder="<?=$lang->values['document']?>">
		<select name="doctype" id="doctype" class="validateField">
			<option value=""> <?=$lang->values['doctype']?></option>
			<option value="1"><?=$lang->values['doctypeO1']?></option>
			<option value="2"><?=$lang->values['doctypeO2']?></option>
			<option value="3"><?=$lang->values['doctypeO3']?></option>
			<option value="4"><?=$lang->values['doctypeO4']?></option>
		</select>
		<input type="text" name="name" id="name" class="validateField" placeholder="<?=$lang->values['name']?>" />
		<input type="text" name="sname" placeholder="<?=$lang->values['sname']?>" />
		<input type="text" name="lname" class="validateField" id="lname" placeholder="<?=$lang->values['lname']?>" />
		<input type="text" name="slname" placeholder="<?=$lang->values['slname']?>" />
		<input type="email" name="email" class="validateField" id="email" placeholder="<?=$lang->values['email']?>" data-parsley-trigger="change"/>
		<input type="button" name="<?=$lang->values['next']?>" class="next  btn action-button" value="<?=$lang->values['next']?>"/>
	</fieldset>
	<fieldset>
		<h2 class="fs-title"><?=$lang->values['secondTitle']?></h2>
		<h3 class="fs-subtitle"><?=$lang->values['secondStep']?></h3>
		<select name="gender" id="gender" class="validateSubmitField">
			<option value=""> <?=$lang->values['gender']?></option>
			<option value="1"><?=$lang->values['genderO1']?></option>
			<option value="2"><?=$lang->values['genderO2']?></option>
		</select>
		<input type="text" name="address" id="address" class="validateSubmitField" placeholder="<?=$lang->values['address']?>" />
		<input type="text" name="city" id="city" class="validateSubmitField" placeholder="<?=$lang->values['city']?>" />
		<input type="text" name="department" class="validateSubmitField" id="department" placeholder="<?=$lang->values['department']?>" />
		<input type="text" name="country" class="validateSubmitField" id="country" placeholder="<?=$lang->values['country']?>" />
		<input type="hidden" name="lang" value="<?=$lang->values['lang']?>">
		<input type="text" name="phone" class="validateSubmitField" id="phone" placeholder="<?=$lang->values['phone']?>" />
		<textarea name="message" class="validateSubmitField" placeholder="<?=$lang->values['message']?>" id="message"></textarea>
		<input type="button" name="<?=$lang->values['previous']?>" class="previous action-button" value="<?=$lang->values['previous']?>" />
		<input type="submit" name="submit" class="submit action-button" value="<?=$lang->values['submit']?>" />
	</fieldset>
</form>
<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p class="message-popup"><?=$message?></p>
		<ul class="cd-buttons">
			<li class="setLocation"><a href="#0" ><?=$lang->values['accept']?></a></li>
		</ul>
		<a href="#0" class="cd-popup-close img-replace">Close</a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->
<script type="text/javascript" src="js/steps.js"></script>
<?php if(isset($message)){?>
			<script type="text/javascript">
			$(document).ready(function(){
					$('.cd-popup').addClass('is-visible');
				})
			</script>
	<?php }?>
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
</body>
</html>