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
	$phone = $_POST['phone'];
	$lang = $_POST['lang'];
    $typeDocument = $_POST['doctype'];
    $message = $_POST['message'];
    $query = "SELECT * FROM prospects WHERE semail='".$email."' OR sidentif='".$document."'";
    $langString = "";
    if($lang == "en"){
    	$langString = "&lang=en";
    }
    if($result = $conn->query($query)){
        if ($result->fetchColumn() > 0) {
            header("location:index.php?cnf=exists".$langString);
            exit();
        }
    }
        $sql = "INSERT INTO prospects (sname,slast,nassigned,nstatus,dcontact,sphone,semail,saddress,scity,sstate,scountry,ngender,sidentif,nidentype,smessage) VALUES (:sname,:slast,:nassigned,:nstatus,:dcontact,:sphone,:semail,:saddress,:scity,:sstate,:scountry,:ngender,:sidentif,:nidentype,:smessage)";
        $q = $conn->prepare($sql);
        if($q->execute(array(':sname'=>$name,
                          ':slast'=>$lastName,
                          ':nassigned'=>0,
                          ':nstatus'=>10,
                          ':dcontact'=>$date,
                          ':sphone'=>$phone,
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
                header("location:index.php?cnf=true".$langString);
        }else{
                header("location:index.php?cnf=false".$langString);
        }

?>
