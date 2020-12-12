<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Usss</title>
  <link rel="stylesheet" href="CSS/contact.css" />
  <link rel="stylesheet" href="CSS/footer&menuBar.css" />
  <link rel="stylesheet" href="CSS/search.css" />
  <link rel="stylesheet" href="CSS/footer.css" />
  <link rel="stylesheet" href="CSS/over-footer.css" />
</head>

<body>
  <?php
  session_start();
  include 'includes/control.php';

  if (isset($_GET['error'])) {
    echo '<script language="javascript">';
    echo 'alert("Vous avez tapez un message ou un email vide, essayez a nouveau!")';
    echo '</script>';
    unset($_GET);
  }



  if (isset($_GET['error'])) {
    echo '<script language="javascript">';
    echo 'alert("Vous avez tapez un message ou un email vide, essayez a nouveau!")';
    echo '</script>';
    unset($_GET);
  }



  if (isset($_GET['vid'])) {
    echo '<script language="javascript">';
    echo 'alert("Vous avez tapez un message, un email ou un nom vide, essayez a nouveau!")';
    echo '</script>';
    unset($_GET);
  }
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

  <div class="img-container">
    <img src="images/contactUS.jpg" width="100%" height="500" alt="contact Us" />
    <div class="text">
      <pre>Vous avez des idees,propositions ou des reclamations<br>      n'hesitez pas de nous contacter</pre>
    </div>
  </div>

  <div class="contact">
    <div class="form">
      <form method="post" action="includes/Cont.php">
        <div class="form-control">
          <label for="email">Email</label>
          <input type="text" name="emailCon" id="email" placeholder="Entrer l'email" />
        </div>
        <div class="form-control">
          <label for="email">Nom et Prenom</label>
          <input type="text" name="nameCon" id="email" placeholder="Entrer votre nom et prenom" />
        </div>
        <div class="form-control">
          <label for="message">Message</label>
          <input type="message" name="messageCon" id="message" placeholder="Entrer le message" />
        </div>
        <button name="sb" type="submit">Valider</button>
      </form>
    </div>
    <div>
      <h2>Contact Us:</h2><br><br>
      <p>
        Envoyez vos messsages dans notre<br>emails :<br><br>
        <a class="links" href="#">abz1999abz@gmail.com</a><br><br>
        <a class="links" href="#">ensa@khouribga.com</a><br><br>
      </p><br>
      <h3>Ensa Khouribga</h3>
      <p>École Nationale des Sciences Appliquées,<br>Bd Béni Amir, BP 77, Khouribga - Maroc</p>
    </div>
  </div>

  <div class="footer">
    <div class="content-footer">
      <div class="content-sociale">
        <p href="#" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
              'Times New Roman', Times, serif;">Contacts :</p> <br>
        <p>Tel : +212-461-184-986</p>
        <p>Email: ensa@khouribga.com</p>
        <div class="social-img">
          <p href="#" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
                  'Times New Roman', Times, serif;">Abonnez nous sur:</p> <br>
          <img src="images/facebook (1).png" alt="" />
          <img src="images/ii.png" alt="" />
          <img src="images/tt.png" alt="" />
          <img src="images/ll.png" alt="" />
        </div>

      </div>
      <div class="content-about">
        <a href="#" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
              'Times New Roman', Times, serif; color: aliceblue;">Apropos</a>
        <div class="about-show">
          <p> Comme vous le savez de nos jours, nous voyons une <br>
            transition énorme de l'utilisation des produits numériques <br>
            de plus en plus dans notre vie.
          </p>
        </div>
        <a href="apropos.php"><button class="voir-plus">Voir plus >></button></a>
      </div>
      <div class="content-contact">
        <p href="#" style="font-size: 20px; font-weight: 300; font-family: Georgia, 
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