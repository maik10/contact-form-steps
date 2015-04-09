<?php 
	error_reporting(E_ALL);
	include_once("clases/DB.php");
	$gdb = new DB();
	$conn= $gdb->getConnection();
	$date = date('Y-m-d');
	$name = $_POST['name']." ".$_POST['sname'];
	$lastName = $_POST['lname']." ".$_POST['slname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['department'];
	$country = $_POST['country'];
	$gender = $_POST['gender'];
	$document = $_POST['document'];
	$typeDocument = $_POST['doctype'];
	$message = $_POST['message'];
	$query = "SELECT * FROM prospects WHERE semail='".$email."' OR sidentif='".$document."'";
	if($result = $conn->query($query)){
		 if ($result->fetchColumn() > 0) {
		 	header("location:/form/index.php?cnf=exists");
		 	exit();
		 }
	}
	$sql = "INSERT INTO prospects (sname,slast,dcontact,semail,saddress,scity,sstate,scountry,ngender,sidentif,nidentype,smessage) VALUES (:sname,:slast,:dcontact,:semail,:saddress,:scity,:sstate,:scountry,:ngender,:sidentif,:nidentype,:smessage)";
	$q = $conn->prepare($sql);
	if($q->execute(array(':sname'=>$name,
                  	  ':slast'=>$lastName,
                  	  ':dcontact'=>$date,
                  	  ':semail'=>$email,
                  	  ':saddress'=>$address,
                  	  ':scity'=>$city,
                  	  ':sstate'=>$state,
                  	  ':scountry'=>$country,
                  	  ':ngender'=>$gender,
                  	  ':sidentif'=>$document,
                  	  ':nidentype'=>$typeDocument,
                  	  ':smessage'=>$message
                  	  ))
		){
		header("location:/form/index.php?cnf=true");
	}else{
		header("location:/form/index.php?cnf=false");
	}

?>