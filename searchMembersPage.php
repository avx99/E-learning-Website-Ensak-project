<?php

session_start();


include 'includes/control.php';

$angular = ['angular', 'Angular', 'ANGULAR', 'Ang', 'ang', 'anglr'];
$git = ['git', 'GIT', 'Git', 'Gt', 'gt'];
$html = ['html', 'HTML', 'Html'];
$javascript = ['javascript', 'java script', 'js', 'Js', 'JS', 'javaScript', 'JavaScript', 'JAVASCRIPT', 'JAVA SCRIPT'];
$sql = ['sql', 'SQL', 'Sql'];
$vueJs = ['vueJs', 'vuejs', 'VUEJS', 'VueJs'];
$php = ['php', 'Php', 'PHP'];



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/footer&menuBar.css" />
  <link rel="stylesheet" href="CSS/search.css" />
  <link rel="stylesheet" href="CSS/searchMembersPage.css" />
  <link rel="stylesheet" href="CSS/footer.css" />
  <link rel="stylesheet" href="CSS/over-footer.css" />
  <title>Search</title>
</head>

<body>
  <?php

  // if (isset($_GET['error'])) {
  //   echo '<script language="javascript">';
  //   echo 'alert("Vous avez tapez un message ou un email vide, essayez a nouveau!")';
  //   echo '</script>';
  //   unset($_GET);
  // }
  ?>
  <header>
    <a href="index.php">
      <div class="logo">
        <img src="images/logo.png" alt="logo" width="50" height="50" />
      </div>
    </a>

    <nav>
      <ul>
        <a href="accueil.php">
          <li><button class="inscription">Accueil</button></li>
        </a>
        <a href="matiere.php">
          <li><button class="inscription">Matiers</button></li>
        </a>
        <a href="forum.php">
          <li><button class="inscription">Forum</button></li>
        </a>
        <a href="profile.php">
          <li><button class="inscription">Mon profil</button></li>
        </a>
        <a href="contact.php">
          <li><button class="inscription">Contact Us</button></li>
        </a>
        <a href="apropos.php">
          <li><button class="inscription">A propos</button></li>
        </a>
        <a href="includes/deconnexion.php">
          <li><button class="connection">deconnexion</button></li>
        </a>
        <a href="#">
          <?php

          if (isset($_SESSION['nom']))
            echo "<li><button class=\"connection\">" . $_SESSION['nom'] . "</button></li>";


          ?>
        </a>
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
    </nav>
  </header>


  <div class="searchResult">
    Voila vos resultats de recherche du mot (<?= $_POST['result'] ?>) :
    <?php

    // $list = scandir("JSON");
    // foreach ($list as $l) {
    //   if ($l != "." && $l != "..") {
    //     echo substr($l, 0, -11) . "<br>";
    //   }
    // }
    $href = '';
    if (in_array($_POST['result'], $angular))
      $href = "?course=angular";
    elseif (in_array($_POST['result'], $git))
      $href = "?course=git";
    elseif (in_array($_POST['result'], $html))
      $href = "?course=html";
    elseif (in_array($_POST['result'], $sql))
      $href = "?course=sql";
    elseif (in_array($_POST['result'], $vueJs))
      $href = "?course=vueJs";
    elseif (in_array($_POST['result'], $javascript))
      $href = "?course=javascript";
    elseif (in_array($_POST['result'], $php))
      $href = "?course=php";
    else
      $href = '';



    if (empty($href)) {
      echo "<br>Aucun resultat<br>";
    } else {
      $href = "http://127.0.0.1/Projet%20Web%20Pr.Saadi/matiere.php" . $href;
      echo "<a href=" . $href . ">Lien vers votre recherche</a>";
    }

    ?>
  </div>




  <div class="footer">
    <div class="content-footer">
      <div class="content-sociale">
        <p href="#" style="
              font-size: 20px;
              font-weight: 300;
              font-family: Georgia, 'Times New Roman', Times, serif;
            ">
          Contacts :
        </p>
        <br />
        <p>Tel : +212-461-184-986</p>
        <p>Email: ensa@khouribga.com</p>
        <div class="social-img">
          <p href="#" style="
                font-size: 20px;
                font-weight: 300;
                font-family: Georgia, 'Times New Roman', Times, serif;
              ">
            Abonnez nous sur:
          </p>
          <br />
          <img src="images/facebook (1).png" alt="" />
          <img src="images/ii.png" alt="" />
          <img src="images/tt.png" alt="" />
          <img src="images/ll.png" alt="" />
        </div>
      </div>
      <div class="content-about">
        <a href="#" style="
              font-size: 20px;
              font-weight: 300;
              font-family: Georgia, 'Times New Roman', Times, serif;
              color: aliceblue;
            ">Apropos</a>
        <div class="about-show">
          <p>
            Comme vous le savez de nos jours, nous voyons une <br />
            transition énorme de l'utilisation des produits numériques <br />
            de plus en plus dans notre vie.
          </p>
        </div>
        <a href="apropos.php"><button class="voir-plus">Voir plus >></button></a>
      </div>
      <div class="content-contact">
        <p href="#" style="
              font-size: 20px;
              font-weight: 300;
              font-family: Georgia, 'Times New Roman', Times, serif;
            ">
          Contactez-nous
        </p>
        <!-- <form action="">
          <input type=" text" name="sentEmail" placeholder="Adresse Email" class="email" /><br />
          <input type="text" name="sentMessage" placeholder="Message..." class="message" /><br />
          <button class="envoyer">Envoyer</button>
        </form> -->
      </div>
    </div>
    <div class="bottom">
      &copy; ENSAKH.com | Designed by IID
    </div>
  </div>
</body>

</html>