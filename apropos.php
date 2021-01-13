<?php
session_start();
include 'includes/control.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/apropos.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <title>A propos</title>
</head>
<body>
<?php

if (isset($_GET['error'])) {
    echo '<script language="javascript">';
    echo 'alert("Vous avez tapez un message ou un email vide, essayez a nouveau!")';
    echo '</script>';
    unset($_GET);
}
?>

    <div class="headerr">
        
        <a href="index.php"><div class="logo">
          <img src="images/logo.png" alt="logo" width="50" height="50" />
        </div></a>
  
        <div class="navv">
          <ul class="ull">
            <a href="accueil.php"><li class="lii"><button class="inscription">Accueil</button></li></a>
            <a href="matiere.php"><li class="lii"><button class="inscription">Matiers</button></li></a>
            <a href="forum.php"><li class="lii"><button class="inscription">Forum</button></li></a>
            <a href="profile.php"><li class="lii"><button class="inscription">Mon profil</button></li></a>
            <a href="contact.php"><li class="lii"><button class="inscription">Contact Us</button></li></a>
            <a href="apropos.php"><div class="lii"><button class="inscription">A propos</button></div></a>
            <a href="includes/deconnexion.php"><li class="lii"><button class="connection">deconnexion</button></li></a>
            <?php
          
          if(isset($_SESSION['nom']))
            echo "<a><li class=\"lii\"><button class=\"connection\">".$_SESSION['nom']."</button></li></a>";

          
          ?>
                <form action="searchMembersPage.php" method="POST">
                    <li>
                        <div class="buscar-caja">
                            <input type="text" name="result" class="buscar-txt" placeholder="search..." />
                            <button type="submit" name="search" value="blabla" href="searchMembersPage.php" class="buscar-btn">
                                <img src="images/search.png" alt="search" width="20" height="20" />
                            </button>
                        </div>
                    </li>
                </form>
          </ul>
        </div>
      </div>

    <main>
        <div class="container">
            <h1>Apropos</h1>
            <p>
                Comme vous le savez de nos jours, nous voyons une transition énorme de l'utilisation des produits numériques de plus en plus dans notre vie. <br>
                On peut donc dire que notre entreprise a voulu accompagner ce changement.
                Notre site Web contient des cours sur le langage de programmation ainsi que des vidéos pour le rendre très clair et compréhensible. <br>
                Notre site Web propose les dernières technologies et des cours sur des choses entières liées à l'informatique et à l'apprentissage numérique
                Notre objectif en faisant ce site Web est d'offrir tous les équipements nécessaires pour étudier en ligne à domicile sans aucune distraction,
                Notre site Web offre la possibilité de se connecter avec d'autres étudiants en utilisant notre page de forum. <br>

                Ce site contient: <br>
                - listes de langage de programmation. <br>
                - listes des derniers cours. <br>
                - listes de documents et livres <br>
                - vidéos liées aux cours <br>
            </p>
        </div>
    </main>


    <div class="center">

    </div>

    <div class="footer">
        <div class="content-footer">
            <div class="content-sociale">
                <p href="#"class="java" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
                'Times New Roman', Times, serif;">Contacts :</p> <br>
                <p>Tel : +212-461-184-986</p>
                <p>Email: ensa@khouribga.com</p>
                <div class="social-img">
                    <p href="#"class="java" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
                    'Times New Roman', Times, serif;">Abonnez nous sur:</p> <br>
            <img src="images/facebook (1).png" alt="" />
            <img src="images/ii.png" alt="" />
            <img src="images/tt.png" alt="" />
            <img src="images/ll.png" alt="" />
                </div>

            </div>
            <div class="content-about">
                <a href="#"class="java" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
                'Times New Roman', Times, serif; color: aliceblue;">Apropos</a>
                <div class="about-show">
                    <p>  Comme vous le savez de nos jours, nous voyons une <br>
                        transition énorme de l'utilisation des produits numériques <br>
                         de plus en plus dans notre vie. <br><br><br>
                    </p>
                </div>
                <a href="apropos.php"><button class="voir-plus">Voir plus >></button></a>
            </div>
            <div class="content-contact">
                <p href="#"class="java" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
                'Times New Roman', Times, serif;">Contactez-nous</p>
        <form action=" includes/sentMessage.php" method="post">
            <input type=" text" name="sentEmail" placeholder="Adresse Email" class="email" /><br />
            <input type="text" name="sentMessage" placeholder="Message..." class="message" /><br />
            <button type="submit" name="sentMsg" value=<?= basename($_SERVER['PHP_SELF']); ?> class="envoyer">Envoyer</button>
            </form>
            </div>
        </div>
        <div class="bottom">
            &copy; ENSAKH.com | Designed by IID
        </div>
    </div>
</body>
</html>