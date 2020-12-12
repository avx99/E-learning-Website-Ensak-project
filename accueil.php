<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/footer&menuBar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/accueil.css">
    <?php include 'includes/control.php';?>

    <title>Accueil</title>
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
        <a href="accueil.php"><div class="logo">
          <img src="images/logo.png" alt="logo" width="50" height="50" />
        </div></a>
  
        <nav>
          <ul class="listt">
            <a href="accueil.php"><li><button class="inscription">Accueil</button></li></a>
            <a href="matiere.php"><li><button class="inscription">Matiers</button></li></a>
            <a href="forum.php"><li><button class="inscription">Forum</button></li></a>
            <a href="profile.php"><li><button class="inscription">Mon profil</button></li></a>
            <a href="contact.php"><li><button class="inscription">Contact Us</button></li></a>
            <a href="apropos.php"><li><button class="inscription">A propos</button></li></a>
            <a href="includes/deconnexion.php"><li><button class="connection">Deconnexion</button></li></a>
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
        </nav>
      </header>

      <div class="corpp">
      <?php include 'includes/information.php';?>
        <h1>Bienvenue <?= $name; ?> a notre site web</h1>
        <h2>IID Digital Learning</h2>
        <h3><a href="matiere.php"><button>Explorer nos Cours</button></a></h3>
      </div>
      <style>
        .corpp{
          text-align:center;
          margin-top:130px;
          margin-bottom:200px;
          border:0px solid black;
          width:1100px;
          position:absolute;
          left:8%;
          padding:20px;
          border-radius:20px;
          background-color:#1B98E0;
          box-shadow: 2px 1px 2px;

        }
        .corpp h1{
          font-size:60px;
          margin:30px 0px;
          color:#fff;
        }
        .corpp h2{
          font-size:40px;
          margin:30px 0px
        }

        .corpp h3 a button{
          height:40px;
          width:150px;
          border-radius:5px;
          text-align:center;
          color:#fff;
          background-color: #13283D;
          transition:0.4s;
          font-size:15px;
          
        }
        .corpp h3 a button:hover{
          background-color: #E8F1F2;
          color:#006494;
        }
      </style>
      
      <div class="center">
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
                    <p>  Comme vous le savez de nos jours, nous voyons une <br>
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
</php>