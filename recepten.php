<?php
session_start();


require 'functions.php';

$conn = dbConnect();

$receptenfalse = $conn->query("SELECT * FROM `recepeten`");


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
            <li> <a class="underlineHover" href="#recepten">Recepten</a></li>
            <li> <a class="underlineHover" href="inlog/gebruiker.php">Mijn Recepten</a> </li>
        </ul>
        <a href="inlog/gebruiker.php"><i class="fa-solid fa-user"></i></a>
    </header>
    <main class="main">
        <h1>
            Recepten
        </h1>
        <div class="divider">
            <div class="filter">
                <label for="search">Search</label>
                <input class="search" type="text" name="search" id="search">
                <h5>Veel Gebruikt</h5>
                <div class="checkbox-sec">
                    <label class="checkbox">snel
                        <input id="snel" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">vega
                        <input id="vega" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">gezond
                        <input id="gezond" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">budget
                        <input id="budget" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">slank
                        <input id="slank" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <h5>Menugang</h5>
                <div class="checkbox-sec">
                    <label class="checkbox">hoofdgerecht
                        <input id="hoofdgerecht" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">voorgerecht
                        <input id="voorgerecht" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">bijgerecht
                        <input id="bijgerecht" type="checkbox">
                        <span class="checkmark"></span>
                        </labeliv>
                </div>
                <h5>Recepten met</h5>
                <div class="checkbox-sec">
                    <label class="checkbox">vlees
                        <input id="vlees" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">gevogelte
                        <input id="gevogelte" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox">vis
                        <input id="vis" type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="recepten">
                <?php foreach ($receptenfalse as $recept) : ?>
                    <article class="main--art">
                        <img src="<?php echo "img/" . $recept["foto"] ?>" alt="">
                        <div class="info">
                            <h3><?php echo $recept["naam"] ?></h3>
                            <p class="ondertitel"><?php echo $recept["naammaker"] ?></p>
                            <p class="text">
                                <?php echo $recept["kleininfo"] ?>
                            </p>
                        </div>
                        <div class="links">
                            <a class="button" href="recept.php?id=<?php echo $recept["id"]?>">Kook nu!</a>
                            <a class="underlineHover" href="">Zet in mijn recepten.</a>
                        </div>
                    </article>
                <?php endforeach ?>
            </div>

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