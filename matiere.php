<?php

session_start();
include 'includes/control.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/matiere.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <!-- <link rel="stylesheet" href="CSS/footer&menuBar.css"> -->
    <link rel="stylesheet" href="CSS/over-footer.css">
    <link rel="stylesheet" href="CSS/search.css">
    <?php include 'includes/matiereArticles.php'?>
    <?php include 'includes/control.php'?>
    
    <title>Matiere</title>
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
        <a href="accueil.php"><div class="logo">
            <img src="images/logo.png" alt="logo" width="50" height="50" />
          </div></a>
    
          <div class="navv">
            <ul class="ull">
              <a href="accueil.php"><li class="lii"><button class="inscription">Accueil</button></li></a>
              <a href="matiere.php"><li class="lii"><button class="inscription">Matiers</button></li></a>
              <a href="forum.php"><li class="lii"><button class="inscription">Forum</button></li></a>
              <a href="profile.php"><li class="lii"><button class="inscription">Mon profil</button></li></a>
              <a href="contact.php"><li class="lii"><button class="inscription">Contact Us</button></li></a>
              <a href="apropos.php"><li class="lii"><button class="inscription">A propos</button></li></a>
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

    <!--CONTAINER-->
    <div class="container">
        <!--LEFT-->
        <div class="container-matiere">
            <h2 class="matiere"><a href="?id=">Matieres</a></h2>
            <ul>
                <li><a href="?id=java" id="java" name="java">Java</a>
                </li>
                <li><a href="?id=python" id="python" name="python">Python</a>
                </li>
                <li><a href="?id=c" id="c" name="c">Langage C</a>
                </li>
                <li><a href="?id=php" id="php" name="php">PHP</a>
                </li>
                <li><a href="?id=javascript" id="js" name="js">Javascript</a>
                </li>
                <li><a href="?id=html" id="html&css" name="html&css">HTML & CSS</a>
                </li>
                <li><a href="?id=angular" id="angualr" name="angular">Angular</a>
                </li>
                <li><a href="?id=vuejs" id="vuejs" name="vuejs">VueJs</a>
                </li>
                <li><a href="?id=sql" id="sql" name="sql">SQL</a>
                </li>
                <li><a href="?id=git" id="git" name="git">Git Course</a>
                </li>
            </ul>
        </div>
        <!--END-LEFT-->


        <!--RiGHT-->
        <div class="container-right">
            <div class="under-slider">
                <!--ARTICLE-->
                <div class="content-article">
                    <ul>
                        <li><a href="">Article</a></li>
                        <li><a href="videocours.php">Support videos</a></li>
                    </ul>
                    <article class="article-contenu">
                        <?php 
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    if($id == 'java'){
                                        
                                        echo $java;
                                        
                                    }
                                    if($id==''){
                                        $idd = $id;
                                        echo $gen;
                                    }
                                    if($id == 'python'){
                                        $idd = $id;
                                        echo $python;
                                    }
                                    if($id == 'c'){
                                        $idd = $id;
                                        echo $c;
                                    }if($id == 'php'){
                                        $idd = $id;
                                        echo $php;
                                    }
                                    if($id == 'html'){
                                        $idd = $id;
                                        echo $hc;
                                    }
                                    if($id == 'vuejs'){
                                        $idd = $id;
                                        echo $vuejs;
                                    }
                                    if($id == 'angular'){
                                        $idd = $id;
                                        echo $angular;
                                    }if($id == 'javascript'){
                                        $idd = $id;
                                        echo $js;
                                    }
                                    if($id == 'sql'){
                                        $idd = $id;
                                        echo $sql;
                                    }
                                    if($id == 'git'){
                                        $idd = $id;
                                        echo $git;
                                    }
                                    
                                }else{
                                    echo $gen; 
                                   
                                }
                                
                            ?>   
                        
                    </article>
                </div>
                <!--END-ARTICLE-->
                <div class="content-sujet">
                    <h2>Sujets</h2>
                    <ul>
                        <li><a href="https://www.lemondeinformatique.fr/">Nouveautes</a></li>
                        <li><a href="https://openclassrooms.com/">Programmation</a></li>
                        <li><a href="https://www.technewsworld.com/">Technologies</a></li>
                        <li><a href="https://leetcode.com/">Coding</a></li>
                        <li><a href="https://www.hackerrank.com/">Competitions</a></li>
                        <li><a href="https://diplomeo.com/etablissements-ecoles_d_ingenieurs_informatique">Ecoles</a></li>
                        <li><a href="https://www.coursera.org/">Coursers</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--END-RiGHT-->
    </div>
    <!--END-CONTAINER-->

    <!--OVER-FOOTER-->
    <div class="over-footer">
        <!--COMMENTAIRE-->
        <!--<div class="commentaire">
            <form action="">
                <textarea name="" id="" cols="30" rows="5" placeholder="Commentaire..."></textarea>
                <br><input type="button" name="" id="" value="Commenter">
            </form>
        </div>-->
        <!--END-COMMENTAIRE-->
        <!--RELATED-CONTENTS-->
        <!--<div class="related-contents">
            <div class="related">
                <img src="img3.jpg" alt="" class="imgg">
                <h3>La programmation Aujord'hui</h3>
            </div>
            <div class="related">
                <img src="img3.jpg" alt="" class="imgg">
                <h3>La programmation Aujord'hui</h3>
            </div>
            <div class="related">
                <img src="img3.jpg" alt="" class="imgg">
                <h3>La programmation Aujord'hui</h3>
            </div>
        </div>-->
        <!--END-RELATED-CONTENTS-->
    </div>
    <!--END-OVER-FOOTER-->
    <!--<header>
        <img src="" alt="logo">
        <p>Logo</p>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li class="matiere"><a href="#">Matieres</a>
                    <ul >
                        <li><a href="#">Java</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">PHP/a></li>
                        <li><a href="#">php &amp; CSS</a></li>
                    </ul>
                </li>
                <li><a href="#">Forums</a></li>
            </ul>
        </nav>
        <form action="">
            <input type="text" name="" id="">
            <input type="button" name="Chercher" id="" value="Chercher">
        </form>
        <img src="" alt="Profil">
        <p>Profil</p>
    </header>
   

    <header>
        <div class="logo">
          <img src="1.png" alt="logo" width="50" height="50" />
        </div>
  
        <nav>
          <ul>
            <li><button class="inscription">Acceuil</button></li>
            <li><button class="inscription">Matiers</button></li>
            <li><button class="inscription">Forum</button></li>
            <li>
              <div class="buscar-caja">
                <input
                  type="text"
                  name=""
                  class="buscar-txt"
                  placeholder="search..."
                />
                <a class="buscar-btn">
                  <img src="search.png" alt="search" width="20" height="20" />
                </a>
              </div>
            </li>
          </ul>
        </nav>
      </header>
       -->

    

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
                         de plus en plus dans notre vie. <br><br><br>       
                    </p>
                </div>
                <a href="apropos.php
                "><button class="voir-plus">Voir plus >></button></a>
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