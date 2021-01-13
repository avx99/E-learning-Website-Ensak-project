<?php
session_start();

$list = ['html','git','sql','vueJs','php','javascript','angular'];


include 'includes/control.php';
if(!isset($_GET['id']) || !in_array($_GET['id'],$list))
    die("Page introvalbe");

$name = $_SESSION['nom'];
$email = $_SESSION['email'];
$sexe = $_SESSION['sexe'];



function readCommentsFile($line)
{
  $split = explode(";", $line);
  if (isset($split[0]) && isset($split[1]) && isset($split[2]) && isset($split[3])) {
    $message = $split[0];
    $name = $split[1];
    $sexe = $split[2];
    $date = $split[3];

    $src = "images/male.png";

    if ($sexe == "femme")
      $src = "images/female.png";


    if (!empty($name)) {
      return <<<HTML
      <div class="commentaire">
        <div>
          <img src="${src}" alt="" />
        </div>
        <div>
          <div class="userName">
            ${name}
            <div class="date">${date}</div>
          </div>
          ${message}
        </div>
      </div>
    HTML;
    }
  }
}


function addComment($comment)
{
  global $email;
  global $name;
  global $sexe;

  $file = fopen("FILES/".$_GET['id']."Comment.txt", "a");
  $data = file("FILES/".$_GET['id']."Comment.txt");

  if(filesize("FILES/".$_GET['id']."Comment.txt") == 0){
    if(!empty($comment))
    {
      fwrite($file, $comment);
      fwrite($file, ";");
      fwrite($file, $name);
      fwrite($file, ";");
      fwrite($file, $sexe);
      fwrite($file, ";");
      fwrite($file, date("Y/m/d") . " " . date("h:i"));
      fwrite($file, ";");
      fwrite($file, $email);
      fwrite($file, "\n");
      fclose($file);
    }
    return;
  }
  else{
    $line = $data[count($data) - 1];
    $split = explode(";", $line);
    if(isset($split[0]) && isset($split[1]) && isset($split[2])){
        if (($split[0] == $comment && $split[1] == $name && $split[2] == $sexe) || empty($comment)){
          return;
        }
        
      fwrite($file, $comment);
      fwrite($file, ";");
      fwrite($file, $name);
      fwrite($file, ";");
      fwrite($file, $sexe);
      fwrite($file, ";");
      fwrite($file, date("Y/m/d") . " " . date("h:i"));
      fwrite($file, ";");
      fwrite($file, $email);
      fwrite($file, "\n");
      fclose($file);
      unset($_POST['message']);
    }
  }

}

?>





<!DOCTYPE php>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/courses.css" />
  <link rel="stylesheet" href="CSS/search.css" />
  <link rel="stylesheet" href="CSS/footer&menuBar.css" />
  <link rel="stylesheet" href="CSS/footer.css" />
  <link rel="stylesheet" href="CSS/over-footer.css" />
  <title>Courses</title>
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

  <div class="container">
    <div class="currentVideo" id="currentVideo">
    </div>
    <div class="coursesList">
    </div>
  </div>

  <hr />
  <br /><br /><br /><br />

  <h2>Description du cour :</h2>

  <div class="description">
    <?php
    
    
    $filename = "FILES/desc".$_GET['id'].".txt";
    $file = fopen($filename,"r");

    while(! feof($file)){
      echo fgets($file);
    }

    fclose($file);
    
    
    ?>
  </div>
  <br /><br />
  <hr />
  <br /><br />

  <h2>Commentaire du cour :</h2>
  <br />
  <div>



    <form method="post" action="">
      <input class="messageField" type="text" name="message" id="message" placeholder="Taper un message ... " />
      <input class="submit" name="sit" type="submit" value="Envoyer" />
      <?php
      if (!isset($_POST['message']))
        $_POST['message'] = "";


      addComment($_POST['message']);
      ?>
    </form>



    <br /><br />
  </div>















  <div class="commentaires">
    <div class="commentaire">
      <div>
        <img src="images/male.png" alt="" />
      </div>
      <div>
        <div class="userName">
          Mohamed Alami
          <div class="date">12/03/2020</div>
        </div>
        <?= filesize("FILES/".$_GET['id']."Comment.txt") ?>
      </div>
    </div>

    <div class="commentaire">
      <div>
        <img src="images/female.png" alt="" />
      </div>
      <div>
        <div class="userName">
          Mina idrissi
          <div class="date">01/10/2019</div>
        </div>
        Très très bonne video. Grafikart toujours au top. Dis, ce serait possible de faire une video sur ReactPHP. Ce serait bien la premiere video en français sur le sujet que je trouverai.
      </div>
    </div>

    <div class="commentaire">
      <div>
        <img src="images/male.png" alt="" />
      </div>
      <div>
        <div class="userName">
          achraf benhafide
          <div class="date">07/01/2020</div>
        </div>
        bravo et milles merci, svp, essayer de nous faire une video expliquant les grandes lignes de développement des applications qui seront tournés et exécutées en locale après leur programmation , elles ont pas besoin du réseau, c'est à dire programmer en local pour une application qui sera utiliser en local toujours, en utilisant le mysql workbench et le phpmyadmin merci encore une foi.
      </div>
    </div>


    <?php

    $coursfile = "FILES/".$_GET['id']."Comment.txt";
    $file = fopen($coursfile, "r");
    while (!feof($file)) {
      echo readCommentsFile(fgets($file));
    }



    ?>


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
            de plus en plus dans notre vie..
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
  <script src="JS/jQuery.js"></script>
  <script src="JS/courses.js"></script>
</body>

</html>