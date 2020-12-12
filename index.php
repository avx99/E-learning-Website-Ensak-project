<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="stylesheet" href="CSS/footer.css" />
  <link rel="stylesheet" href="CSS/over-footer.css" />
  <title>Welcom</title>
</head>

<body>
  <?php

  if (isset($_GET['error'])) {
    echo '<script language="javascript">';
    echo 'alert("Vous avez tapez un message ou un email vide, essayez a nouveau!")';
    echo '</script>';
  }
  ?>
  <header>
    <a href="#">
      <div class="logo">
        <img src="images/logo.png" alt="logo" width="50" height="50" /></div>
    </a>

    <nav>
      <ul>
        <a href="inscription.php">
          <li><button class="inscription" type="submit" name="ins">s'incrire</button></li>
        </a>
        <a href="login.php">
          <li><button class="connection" type="submit" name="log">connexion</button></li>
        </a>
      </ul>
    </nav>
  </header>

  <div class="intro" id="images">
    <img src="images/1.jpg" alt="logo" hight="900px" class="slidshow-img" />
    <img src="images/2.jpg" alt="logo" height="900px" class="slidshow-img" />
    <img src="images/3.jpg" alt="logo" height="900px" class="slidshow-img" />
  </div>

  <div class="intro title blue-background">
    <p>
      <b>Apprenez de nouvelles choses </b> <br />Améliorez-vous et
      <b>apprenez</b> de nouvelles choses grâce à <br />nos tutoriels vidéos
      gratuits
    </p>
  </div>

  <div class="description">
    <div class="desc-white">
      <div>
        <img class="desc-img" src="images/free.png" alt="logo" height="350" />
      </div>
      <div class="desc-text">
        <h3 class="desc-title">Totalement gratuit !</h3>
        <ul class="desc-ul">
          <li>Pas de frais d'inscription</li>
          <li>Des cours gratuit</li>
          <li>Pas besoin d'avoir une carte banquaire</li>
        </ul>
      </div>
    </div>
    <div class="desc-blue">
      <div class="desc-text">
        <h3 class="desc-title">Toujours disponible pour vous !</h3>
        <ul class="desc-ul">
          <li>
            Vous pouvez accedez a notre site a chaque moment vous voulez
          </li>
          <li>24/24 h</li>
          <li>7/7 jour</li>
        </ul>
      </div>
      <div><img class="desc-img" src="images/time.png" alt="logo" /></div>
    </div>
    <div class="desc-white">
      <div><img class="desc-img" src="images/world.png" alt="logo" /></div>
      <div class="desc-text">
        <h3 class="desc-title">Quelque soit votre pays !</h3>
        <ul class="desc-ul">
          <li>Vous pouvez acceder au site quleque soit votre pays</li>
          <li>quleque soit votre milieu</li>
          <li>et quleque soit votre emplacement</li>
        </ul>
      </div>
    </div>
    <div class="desc-blue">
      <div class="desc-text">
        <h3 class="desc-title">Avoir des connaissance !</h3>
        <ul class="desc-ul">
          <li>Avec nos forums vous peuvez avoir des nouvelles relations</li>
          <li>Avoir des idees</li>
          <li>Vous pouvez meme accroucher un emploi</li>
        </ul>
      </div>
      <div><img class="desc-img" src="images/chat.png" alt="logo" /></div>
    </div>
  </div>

  <div class="center">
    <a href="inscription.php"><button class="get-started">GET STARTED</button></a>
  </div>
  <!-- 
    <footer>
      <div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere
        molestias, accusamus sequi quaerat repellendus amet quidem placeat
        excepturi reiciendis in tempora temporibus nisi dolores laboriosam.
        Molestias facilis ex iste soluta?
      </div>
      <div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae
        consequuntur natus excepturi accusantium, a nostrum, maiores id odit
        aut, earum minima asperiores quod ipsa. Fugit, illum soluta? Possimus,
        doloremque neque.
      </div>
      <div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, eum!
        Dolorem cumque nulla aliquid ipsum maiores perferendis illo enim totam,
        animi quo distinctio nobis veritatis modi quia labore nesciunt natus.
      </div>
    </footer> -->

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
        <a href="inscription.php"><button class="voir-plus">Voir plus >></button></a>
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

  <script src="JS/script.js"></script>
</body>

</html>