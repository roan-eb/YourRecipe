<?php 

if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass'])){

    include "../config.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Naam is verplicht";
    	header("Location: ../registreren.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "Gebruikersnaam is verplicht";
    	header("Location: ../registreren.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Wachtwoord is verplicht";
    	header("Location: ../registreren.php?error=$em&$data");
	    exit;
    }else {

    	// hashing het wachtwoord
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO gebruikers(fname, username, password) 
    	        VALUES(?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname, $uname, $pass]);

    	header("Location: ../registreren.php?success=Je account is aangemaakt!");
	    exit;
    }


}else {
	header("Location: ../registreren.php?error=error");
	exit;
}