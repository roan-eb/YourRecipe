<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="../img/fork+kitchen+knife+icon-1320086368163404004.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <script src="../script.js" defer></script>
    <title>YouRecipe</title>
</head>

<body>
    <header class="header">
        <ul>
            <li> <a class="underlineHover" href="../index.php">Home</a> </li>
            <li> <a class="underlineHover" href="../index.php#recepten">Recepten</a> </li>
            <li> <a class="underlineHover" href="gebruiker.php">Mijn Recepten</a> </li>
        </ul>
        <a href="index.php"><i class="fa-solid fa-user"></i></a>
    </header>

    <main class="main">

    <div class="form_inlog-reg">
    	
    	<form class="" 
    	      action="php/index.php" 
    	      method="post">

    		<h4 class="">Inloggen</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		  <div >
		    <label for="gebruiker" >Gebruikersnaam</label>
		    <input autocomplete="off" class="search" type="text" 
		           class=""
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div >
		    <label for="ww" >Wachtwoord</label>
		    <input autocomplete="off"  class="search" type="password" 
		           class=""
		           name="pass">
		  </div>
		  
		  <button class="button" type="submit" class="">Inloggen</button>
		  <a href="registreren.php">Aanmelden</a>

          
		</form>
    </div>

    </main>
    <footer class="footer">
        <div>
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-pinterest-p"></i></a>
        </div>
        <h4 class=""><a href="https://ma-web.nl/">&#169; Media College</a></h4>
    </footer>
</body>

</html>