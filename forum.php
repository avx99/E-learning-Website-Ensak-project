<?php

session_start();
// $_SESSION['user'] = "ahmed";


include 'includes/control.php';


$a = "checked";
$b = "";
$c = "";
$d = "";
$e = "";
$f = "";
$g = "";
$h = "";
$i = "";
$j = "";


if (isset($_POST["languge"]) == false)
    $_POST["languge"] = "FILES/javascript.txt";

if ($_POST["languge"] == "FILES/javascript.txt")
    $a = "checked";
else if ($_POST["languge"] == "FILES/c.txt")
    $b = "checked";
else if ($_POST["languge"] == "FILES/java.txt")
    $c = "checked";
else if ($_POST["languge"] == "FILES/python.txt")
    $d = "checked";
else if ($_POST["languge"] == "FILES/angular.txt")
    $e = "checked";
else if ($_POST["languge"] == "FILES/git.txt")
    $f = "checked";
else if ($_POST["languge"] == "FILES/html.txt")
    $g = "checked";
else if ($_POST["languge"] == "FILES/php.txt")
    $h = "checked";
else if ($_POST["languge"] == "FILES/sql.txt")
    $i = "checked";
else if ($_POST["languge"] == "FILES/vuejs.txt")
    $j = "checked";





function creatForum($forumName, $message, $user)
{
    $myFile = fopen($forumName, "a");
    $data = file($forumName);


    if(filesize($forumName) == 0){
        fwrite($myFile, $message);
        fwrite($myFile, ";");
        fwrite($myFile, date("Y/m/d") . " " . date("h:i") . " " . "(par " . $_SESSION['nom'] . ")");
        fwrite($myFile, ";");
        fwrite($myFile, $user);
        fwrite($myFile, "\n");
        fclose($myFile);
        return;
    }


    $line = $data[count($data) - 1];
    $split = explode(";", $line);
    $m = $split[0];
    if ($message == $m)
        return;
    fwrite($myFile, $message);
    fwrite($myFile, ";");
    fwrite($myFile, date("Y/m/d") . " " . date("h:i") . " " . "(par " . $_SESSION['nom'] . ")");
    fwrite($myFile, ";");
    fwrite($myFile, $user);
    fwrite($myFile, "\n");
    fclose($myFile);
}




// function creatChat($name,$value,$id,$checked)
// {
//     return <<<HTML
// <input type="radio" name="languge" class="formRadioLanguge" value="${value}" id="${id}" ${checked}/>
// <label for="${id}" class="formLabelLanguge">${name}</label>
// HTML;
// }

function readForum($line)
{
    $split = explode(";", $line);
    if (isset($split[0]) && isset($split[1]) && isset($split[2])) {
        $message = $split[0];
        $info = $split[1];
        $user = $split[2];
        $user = substr($user, 0, -1);

        if ($_SESSION['email'] == $user)
            $class = "byMe";
        else
            $class = "byOther";

        if ($message != "")
            return <<<HTML
            <div class="${class}">
                <div class="time-${class}">${info}</div>
                <br>${message}
            </div>
        HTML;
    }
}



if (is_file("index.html"))
    $s = "is a file";
else
    $s = "is not a file";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/ForumStyle.css" />
    <link rel="stylesheet" href="CSS/search.css" />
    <link rel="stylesheet" href="CSS/footer&menuBar.css" />
    <link rel="stylesheet" href="CSS/footer.css" />
    <link rel="stylesheet" href="CSS/over-footer.css" />
    <title>Forum</title>
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
                            <button class="buscar-btn" href="searchMembersPage.php" type="submit" name="search" value="blabla">
                                <img src="images/search.png" alt="search" width="20" height="20" />
                            </button>
                        </div>
                    </li>
                </form>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="forum">
            <div class="leftBar">
                <div class="chioceForChat">
                    <form action="">
                        <input type="radio" name="gender" class="formRadio" value="forum" id="fff" checked />
                        <label for="fff" class="formLabel">Forum</label>
                        <input type="radio" name="gender" class="formRadio" value="chat" id="ccc" />
                        <label for="ccc" class="formLabel"><a class="a-tag" href="http://127.0.0.1/Projet%20Web%20Pr.Saadi/chat.php">Chat</a></label>
                    </form>
                </div>
            </div>
            <div class="chatField">
                <div class="selectedChat">
                    <h2><?= substr($_POST['languge'], 6, -4) ?></h2>
                </div>
            </div>
        </div>
        <hr />
        <div class="forum long">
            <div class="leftBar">
                <form method="post">
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/javascript.txt" id="j" <?= $a ?> />
                    <label for="j" class="formLabelLanguge">javascript</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/c.txt" id="c" <?= $b ?> />
                    <label for="c" class="formLabelLanguge">C programming</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/java.txt" id="jv" <?= $c ?> />
                    <label for="jv" class="formLabelLanguge">Java</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/python.txt" id="p" <?= $d ?> />
                    <label for="p" class="formLabelLanguge">Python</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/angular.txt" id="a" <?= $e ?> />
                    <label for="a" class="formLabelLanguge">Angular</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/git.txt" id="g" <?= $f ?> />
                    <label for="g" class="formLabelLanguge">Git</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/html.txt" id="ht" <?= $g ?> />
                    <label for="ht" class="formLabelLanguge">HTML</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/php.txt" id="ph" <?= $h ?> />
                    <label for="ph" class="formLabelLanguge">PHP</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/sql.txt" id="sq" <?= $i ?> />
                    <label for="sq" class="formLabelLanguge">SQL</label>
                    <input type="radio" name="languge" class="formRadioLanguge" value="FILES/vuejs.txt" id="v" <?= $j ?> />
                    <label for="v" class="formLabelLanguge">VueJs</label>
                    <input class="sub" type="submit" value="selectionner" />

                    <!-- </form> -->

            </div>
            <div class="chatField">
               
                <?php

                if (is_file($_POST["languge"]) == false)
                    fopen($_POST["languge"], "a");

                $file = fopen($_POST["languge"], "r");
                while (!feof($file)) {
                    echo readForum(fgets($file));
                }

                fclose($file);

                ?>





























                <!-- <form method="post" action="addMessage.php"> -->
                <!-- <div> -->
                <input class="messageField" type="text" name="message" id="message" placeholder="Taper un message ... " />
                <input class="submit" name="sub" value="Envoyer" type="submit" />
                <!-- </div> -->
                <?php

                if (isset($_POST['message']) && $_POST["message"] != "") {
                    creatForum($_POST["languge"], $_POST["message"], $_SESSION['email']);
                }

                ?>
                </form>

            </div>
        </div>
    </div>

    <div class="footer">
        <div class="content-footer">
            <div class="content-sociale">
                <p href="#" style="
              font-size: 20px;
              font-weight: 300;
              font-family: Georgia, " Times New Roman" , Times, serif; ">
                    Contacts :
                </p>
                <br />
                <p>Tel : +212-461-184-986</p>
                <p>Email: ensa@khouribga.com</p>
                <div class=" social-img">
                    <p href="#" style="
                font-size: 20px;
                font-weight: 300;
                font-family: Georgia, " Times New Roman" , Times, serif; ">
                        Abonnez nous sur:
                    </p>
                    <br />
                    <img src=" images/facebook (1).png" alt="" />
                    <img src="images/ii.png" alt="" />
                    <img src="images/tt.png" alt="" />
                    <img src="images/ll.png" alt="" />
            </div>
        </div>
        <div class="content-about">
            <a href="#" style="
              font-size: 20px;
              font-weight: 300;
              font-family: Georgia, " Times New Roman" , Times, serif; color: aliceblue; ">Apropos</a>
                <div class=" about-show">
                <p>
                    Comme vous le savez de nos jours, nous voyons une <br />
                    transition énorme de l"
                    utilisation des produits numériques <br />
                    de plus en plus dans notre vie..
                </p>
        </div>
        <a href="apropos.php"><button class="voir-plus">Voir plus >></button></a>
    </div>
    <div class="content-contact">
        <p href="#" style="
              font-size: 20px;
              font-weight: 300;
              font-family: Georgia, " Times New Roman" , Times, serif; ">
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

    <!-- <script src="JS/jQuery.js"></script> -->
    <script src="JS/profil.js"></script>
</body>

</html>