<?php 
session_start();

if(isset($_POST['uname']) && 
   isset($_POST['pass'])){

    include "../config.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
    	$em = "Gebruikersnaam is verplicht";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Wachtwoord is verplicht";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM gebruikers WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          if($username === $uname){
             if(password_verify($pass, $password)){
                 $_SESSION['id'] = $id;
                 $_SESSION['fname'] = $fname;

                 header("Location: ../gebruiker.php");
                 exit;
             }else {
               $em = "Verkeede gebruikersnaam of wachtwoord";
               header("Location: ../index.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Verkeede gebruikersnaam of wachtwoord";
            header("Location: ../index.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Verkeede gebruikersnaam of wachtwoord";
         header("Location: ../index.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}