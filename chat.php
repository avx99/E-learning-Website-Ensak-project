<?php

session_start();

include 'includes/control.php';

// $a = "checked";
// $b = "";
// $c = "";
// $d = "";



// if ($_POST["languge"] == "FILES/javascript.txt")
//     $a = "checked";
// else if ($_POST["languge"] == "FILES/c.txt")
//     $b = "checked";
// else if ($_POST["languge"] == "FILES/java.txt")
//     $c = "checked";
// else if ($_POST["languge"] == "FILES/python.txt")
//     $d = "checked";





$x = "";

if (isset($_POST["languge"]) == false) {
    $pdo = new PDO("mysql:host=localhost;dbname=webprojet", "root", "");
    $query = $pdo->query("SELECT * FROM utilisateur");
    $listes = $query->fetchAll();
    $_POST["languge"] = "FILES/" . $listes[0]['email'] . ".txt";
    $x = "checked";
    $pdo = null;
}


function getFile($a, $b)
{
    $list = scandir("FILES");
    foreach ($list as $l) {
        $l = substr($l, 0, -4);
        if ($l != "." && $l != "..") {
            $split = explode("%", $l);
            // echo $l."<br>";
            if (isset($split[0]) && isset($split[1])) {
                if (($split[0] == $a && $split[1] == $b) || ($split[1] == $a && $split[0] == $b))
                    return "FILES/" . $l . ".txt";
            }
        }
    }
}

function createChatListes()
{
    $pdo = new PDO("mysql:host=localhost;dbname=webprojet", "root", "");
    $query = $pdo->query("SELECT * FROM utilisateur");
    $listes = $query->fetchAll();
    $n = sizeof($listes);
    $i = 0;
    $j = 0;

    while ($i < $n) {
        $j = $i;
        while ($j < $n) {

            $filename = "FILES/" . $listes[$i]["email"] . "%" . $listes[$j]["email"] . ".txt";
            $file = fopen($filename, 'a');
            fclose($file);
            $j++;
        }
        $i++;
    }
    $pdo = null;
}

createChatListes();



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
    else{
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

}




function creatChat($name, $value, $id, $checked, $bold)
{
    if ($bold == false) {
        return <<<HTML
<input type="radio" name="languge" class="formRadioLanguge" value="${value}.txt" id="${id}" ${checked}/>
<label for="${id}" class="formLabelLanguge">${name}</label>
HTML;
    } else {
        return <<<HTML
<input type="radio" name="languge" class="formRadioLanguge" value="${value}.txt" id="${id}" ${checked}/>
<label for="${id}" class="formLabelLanguge"><h3>----${name}----</h3></label>
HTML;
    }
}

function readForum($line)
{
    $split = explode(";", $line);
    if (isset($split[0]) &&    isset($split[1]) &&    isset($split[2])) {
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
        <div class="forum">
            <div class="leftBar">
                <div class="chioceForChat">
                    <form action="">
                        <input type="radio" name="gender" class="formRadio" value="forum" id="fff"  />
                        <label for="fff" class="formLabel"><a class="a-tag" href="http://127.0.0.1/Projet%20Web%20Pr.Saadi/forum.php">Forum</a></label>
                        <input type="radio" name="gender" class="formRadio" value="chat" id="ccc" checked/>
                        <label for="ccc" class="formLabel">Chat</label>
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
                    <?php


                    $dbserver = "localhost";
                    $dbusername = "root";
                    $dbpass = "";
                    $dbname = "webProjet";

                    $conn = mysqli_connect($dbserver, $dbusername, $dbpass, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM utilisateur";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($l = mysqli_fetch_assoc($result)) {
                            if ($l['email'] != $_SESSION['email']) {

                                if ($_POST['languge'] == "FILES/" . $l["email"] . ".txt")
                                    echo creatChat($l["nom"], "FILES/" . $l["email"], $l["email"], "checked", false);
                                else
                                    echo creatChat($l["nom"], "FILES/" . $l["email"], $l["email"], $x, false);
                                $x = "";
                            } else {

                                if ($_POST['languge'] == "FILES/" . $l["email"] . ".txt")
                                    echo creatChat($l["nom"], "FILES/" . $l["email"], $l["email"], "checked", true);
                                else
                                    echo creatChat($l["nom"], "FILES/" . $l["email"], $l["email"], $x, true);
                                $x = "";
                            }
                        }
                    }
                    mysqli_close($conn);


                    ?>
                    <!-- </form> -->
                    <input class="sub" type="submit" value="selectionner" />
            </div>
            <div class="chatField">

                <?php

                if (is_file($_POST["languge"]) == false)
                    fopen($_POST["languge"], "a");



                // echo $_SESSION['user']."<br>";
                // echo getFile(substr($_POST['languge'],6,-4),$_SESSION['email'])."xxxxxxxxxxxxxxx";
                // echo substr($_POST['languge'], 6, -4);
                $getFile = getFile(substr($_POST['languge'], 6, -4), $_SESSION['email']);
                $file = fopen($getFile, "r");
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
                    creatForum($getFile, $_POST["message"],  $_SESSION['email']);
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
                <form action="">
                    <input type=" text" placeholder="Adresse Email" class="email" /><br />
        <input type="text" placeholder="Message..." class="message" /><br />
        <input type="button" name="" id="" value="Envoyer" class="envoyer" />
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