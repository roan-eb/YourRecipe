<?php


session_start();


if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {


    require '../functions.php';

    $conn = dbConnect();

    $id = $_SESSION['id'];

    $receptenfalse = $conn->query("SELECT * FROM `recepeten` WHERE gebruikerid= $id");


?>

    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="index.php"><a href="uitloggen.php" class="">
                    Uitloggen
                </a></i></a>
        </header>

        <main class="main">

            <div class="profile_head">
                <div>
                    <h2 class="profile_h2">Welkom <?= $_SESSION['fname'] ?> </h2>
                    <a href="receptmaker.php" class="button">Maak recept</a>
                </div>
                <figure class="profile_fig"><img src="../img/image.jfif" alt=""></figure>

            </div>
            <div class="artsprof">
                <?php foreach ($receptenfalse as $recept) : ?>
                    <article class="artprof">
                        <div class="artprof-inner">
                            <div class="artprof-front">
                                <h3><?php echo $recept['naam'] ?></h3>
                                <img src="<?php echo "../img/" . $recept['foto'] ?>" alt="<?php echo $recept['naam'] ?>">
                            </div>
                            <div class="artprof-back">
                                <p>
                                    <?php echo $recept['kleininfo'] ?>

                                </p>
                                <a class="button" href="../recept.php?id=<?php echo $recept['id'] ?>">Kook nu!</a>
                                <a href="recepteditor.php?id=<?php echo $recept['id'] ?>">verander recept</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach ?>
            </div>

    </body>

<?php } else {
    header("Location: index.php");
    exit;
} ?>
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