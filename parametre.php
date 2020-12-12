<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="CSS/Login&Inscription.css" />
    <title>Form Validator</title>
    <?php

    include 'includes/mod.php';
    if (!isset($_SESSION['email']))
        die("Page inaccessible");

    ?>
</head>

<body>
    <div class="container">
        <div>

            <form id="form" class="form" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
                <h2>Modifiez vos donnes : </h2>
                <div class="form-control">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" placeholder="Entrer votre nom" name="name" value="<?= $name; ?>" />
                    <small>Error message</small>
                    <span><?= "<div style='color:red'; 'margin-top:10px';> $error_name </div>" ?></span>
                </div>
                <div class="form-control">
                    <label for="sexe">Sexe</label>
                    <select name="sexe" id="sexe">
                        <optgroup>
                            <option value="homme">homme</option>
                            <option value="femme">femme</option>
                        </optgroup>
                    </select>
                    <small>Error message</small>
                    <span><?= "<div style='color:red'; 'margin-top:10px';> $error_sexe </div>" ?></span>
                </div>
                <div class="form-control">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Entrer le password" name="pass" value="<?= $pass; ?>" />
                    <small>Error message</small>
                    <span><?= "<div style='color:red'; 'margin-top:10px';> $error_pass </div>" ?></span>
                </div>
                <div class="form-control">
                    <label for="password2">Confirmer le Password</label>
                    <input type="password" id="password2" placeholder="Entrer le password a nouveau" name="confirmpass" value="<?= $confirm; ?>" />
                    <small>Error message</small>
                    <span><?= "<div style='color:red'; 'margin-top:10px';> $error_confirm </div>" ?></span>
                </div>
                <button type="submit" name="submit">Valider</button>
            </form>
        </div>
        <div>
            <img src="images/edit.png" alt="sing in" width="590" height="550">
        </div>
    </div>
</body>

</html>