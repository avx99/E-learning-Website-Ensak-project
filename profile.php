<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/footer&menuBar.css">
  <link rel="stylesheet" href="CSS/search.css" />
  <link rel="stylesheet" href="CSS/footer.css">
  <link rel="stylesheet" href="CSS/profile.css">
  <?php
  session_start();
  include 'includes/control.php';

  ?>
  <title>Profile</title>
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
  <header>
    <a href="accueil.php">
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



      </ul>
    </nav>
  </header>

  <div class="main">
    <div class="tete">
      <img src="images/logo.png" alt="">
      <h2>Profile</h2>
    </div>
    <div class="corp">
      <ul>
        <li><?= $_SESSION['nom'] ?></li><br>
        <li><?= $_SESSION['email'] ?></li><br>
        <li>ENSA KHOURIBGA</li><br>
        <li>Casablanca</li><br>
      </ul>
    </div>
    <div class="fin">
      <a href="parametre.php">Parametres</a>
      <a href="includes/deleteAccount.php">Supprimer mon compte</a>
    </div>

  </div>




  <div class="center">
    <style>
      .center {
        height: 100%;
      }
    </style>
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
  <style>
    .footer {
      position: absolute;
      top: 1000px;
    }
  </style>
</body>

</html>