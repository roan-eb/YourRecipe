<?php

session_start();

$_SESSION['rol'] = 1;

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    $_SESSION['rol'] = 1;
}else{
    $_SESSION['rol'] = 0;
}



require 'functions.php';


if (isset($_POST['submit'])) {
    if ($_SESSION['rol'] == 1){
        $naam = $_SESSION['fname'];
        $text = $_POST["text"];
        $foto = "https://static.vecteezy.com/system/resources/thumbnails/002/534/006/small/social-media-chatting-online-blank-profile-picture-head-and-body-icon-people-standing-icon-grey-background-free-vector.jpg";
        
        
        
        $conn = dbConnect();
        
        
        $sql = "INSERT INTO reacties (naam,reactie,foto )
                VALUES (:naam, :reactie, :foto );";
        
        $statement = $conn->prepare($sql);
        $params = [
            'naam' => $naam,
            'reactie' => $text,
            'foto' => $foto,
        ];
        
        $statement -> execute($params);
    }
    else {
        header("Location: inlog/index.php?error=Je moet eerst inloggen om een reactie te plaatsen!");
        exit;
    }
}




$conn = dbConnect();


//$result = $conn->query("SELECT * FROM `reacties`");

if (!isset($_GET['id'])) {
    echo ("de id is niet gezet");
    exit;
}

$id = $_GET['id'];

$check_int = filter_var($id, FILTER_VALIDATE_INT);
if ($check_int === false) {
    echo ("dit is geen getal");
    exit;
}

$statement2 = $conn->prepare("SELECT * FROM `recepeten` WHERE id= ?");
$params2 = [$id];

$statement2 -> execute($params2);
 
$place = $statement2->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/fork+kitchen+knife+icon-1320086368163404004.png">

    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
    <title>YouRecipe</title>
</head>

<body>
    <header class="header">
        <ul>
            <li> <a class="underlineHover" href="index.php">Home</a> </li>
            <li> <a class="underlineHover" href="index.php#recepten">Recepten</a> </li>
            <li> <a class="underlineHover" href="inlog/gebruiker.php">Mijn Recepten</a> </li>
        </ul>
        <a href="inlog/gebruiker.php"><i class="fa-solid fa-user"></i></a>
    </header>
    <main class="main">
        <article class="recept">
            <img src="<?php echo "img/" . $place["foto"]?>" alt="">
            <div>
                <div class="omschrijving">
                    <h2><?php echo $place["naam"];?></h2>
                    <p>
                        <?php echo $place["recept"]?>
                    </p>

                </div>
                <div class="recept-info">
                    <p>Bereidingstijd: <?php echo $place['bereidingstijd']?> min</p>
                    <p>Voor <?php echo $place['personen']?> personen</p>
                    <p><?php echo $place['soort']?></p>
                    <div>
                        <h5>Benodigheden</h5>
                        <p><?php echo $place["benodigheden"]?></p>
                    </div>
                </div>
            </div>

        </article>

        <!--<section class="recensies">
            <h2>Reacties</h2>
            <div>
                <?php //foreach ($result as $product) : ?>
                    <article>
                        <img src="<?php //echo $product['foto']; ?>" alt="">
                        <div>
                            <h3><?php //echo $product['naam']; ?></h3>
                            <p><?php //echo $product['reactie']; ?></p>
                        </div>
                    </article>
                <?php // endforeach; ?>
            </div>
            <form class="review_form" method="POST" enctype="multipart/form-data">
                <label for="review"  >Geef je reactie
                    <textarea id="review" name="text" class="reactieschrijven"></textarea>
                </label>
                <button name="submit" class="button"><span>Stuur</span></button>
            </form>


        </section>-->
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