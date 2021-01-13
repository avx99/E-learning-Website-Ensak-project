<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    die("page inaccesible");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/apropos.css"> -->
    <!-- <link rel="stylesheet" href="CSS/footer.css"> -->
    <title>Administration</title>
    <style>
        th,
        td {
            padding: 15px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        input,
        select {
            height: 30px;
        }
    </style>
</head>

<body>



    <main>
        <div class="container">
            <h1>Les membres : </h1>
            <h3>Liste des utilisateurs : </h3>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sexe</th>
                </tr>
                <?php

                session_start();

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
                        echo "<tr><td>" . $l["id_user"] . " </td><td>" . $l["nom"] . " </td><td> " . $l["email"] . "</td><td> " . $l["sexe"] . "</td><tr>";
                    }
                }
                mysqli_close($conn);


                ?>
            </table>
            <div></div>
            <h3>Ajouter un utilisateur : </h3>
            <form method="POST" action="adminDB.php">
                <fieldset>
                    <p>
                        <label for="input_fname">Nom d'utilisateur : </label>
                        <input id="input_fname" type="text" name="nomAdd" placeholder="Nom d'utilisateur"></input>
                    </p>
                    <p>
                        <label for="input_lname">Email : </label>
                        <input id="input_lname" type="text" name="emailAdd" placeholder="Email"></input>
                    </p>
                    <p>
                        <label for="input_xname">Sexe : </label>
                        <input id="input_xname" type="text" name="sexeAdd" placeholder="Sexe"></input>
                    </p>
                    <p>
                        <label for="input_adress">Password :</label>
                        <input id="input_adress" type="password" name="password1Add" placeholder="Password"></input>
                    </p>
                    <p>
                        <label for="input_email">Confirmer le password : </label>
                        <input id="input_email" type="password" name="password2Add" placeholder="password"></input>
                    </p>
                </fieldset>
                <button type="submit">Valider</button>
            </form>

            <h3>Modifier un utilisateur : </h3>
            <form method="POST" action="adminDB.php">
                <fieldset>
                    <p>
                        <label for="input_fname">Nom d'utilisateur : </label>
                        <input id="input_fname" type="text" name="nomMod" placeholder="Nom d'utilisateur"></input>
                    </p>
                    <p>
                        <label for="input_lname">Email : </label>
                        <input id="input_lname" type="text" name="emailMod" placeholder="Email"></input>
                    </p>
                    <p>
                        <label for="input_xname">Sexe : </label>
                        <input id="input_xname" type="text" name="sexeMod" placeholder="Sexe"></input>
                    </p>
                    <p>
                        <label for="input_adress">Password :</label>
                        <input id="input_adress" type="password" name="password1Mod" placeholder="Password"></input>
                    </p>
                    <p>
                        <label for="input_email">Confirmer le password : </label>
                        <input id="input_email" type="password" name="password2Mod" placeholder="password"></input>
                    </p>
                </fieldset>
                <button type="submit">Valider</button>
            </form>
            <h3>Supprimer un utilisateur : </h3>
            <form method="POST" action="adminDB.php">
                <fieldset>
                    <p>
                        <label for="input_lname">Email : </label>
                        <input id="input_lname" type="text" name="emailDel" placeholder="Email"></input>
                    </p>
                </fieldset>
                <button type="submit">Valider</button>
            </form>
            <h1>Les forumes/chats : </h1>

            <form method="POST" action="txtDelete.php">
                <fieldset>
                    <label>Supprimer le contenu d'un forum/chat : </label>

                    <select name="fichier">
                        <optgroup>
                            <?php

                            $list = scandir("../FILES");
                            foreach ($list as $l) {
                                if ($l != "." && $l != "..") {
                                    echo "<option>" . substr($l, 0, -4) . "</option>";
                                }
                            }

                            ?>
                        </optgroup>
                    </select>
                </fieldset>
                <button type="submit">Valider</button>
            </form>
            <h1>Vos messages : </h1>
            <h3>Messages de footer : </h3>
            <table>
                <tr>
                    <th>Message</th>
                    <th>Email</th>
                </tr>
                <?php


                $file = fopen("../FILES/Messages.txt", "r");
                while (!feof($file)) {
                    $split = explode(";", fgets($file));

                    if (isset($split[0]) && isset($split[1])) {
                        echo "<tr>";
                        echo "<td>" . $split[0] . "</td>";
                        echo "<td>" . $split[1] . "</td>";
                        echo "</tr>";
                    }
                }


                fclose($file);

                ?>
            </table>

            <h3>Messages de la page "Contact Us" : </h3>

            <table>
                <tr>
                    <th>Message</th>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
                <?php



                $file = fopen("../FILES/MessagesCon.txt", "r");
                while (!feof($file)) {
                    $split = explode(";", fgets($file));

                    if (isset($split[0]) && isset($split[1]) && isset($split[2])) {
                        echo "<tr>";
                        echo "<td>" . $split[0] . "</td>";
                        echo "<td>" . $split[1] . "</td>";
                        echo "<td>" . $split[2] . "</td>";
                        echo "</tr>";
                    }
                }


                fclose($file);

                ?>

            </table>
        </div>
    </main>

    <!-- 
    <div class="center">

    </div>

    <div class="footer">
        <div class="bottom">
            &copy; ENSAKH.com | Designed by IID
        </div>
    </div> -->
</body>

</html>