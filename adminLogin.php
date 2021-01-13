<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="includes/adminVerification.php">
        <fieldset>
            <p>
                <label for="input_xname">username : </label>
                <input id="input_xname" type="text" name="username" placeholder="Username"></input>
            </p>
            <p>
                <label for="input_adress">Password :</label>
                <input id="input_adress" type="password" name="password" placeholder="Password"></input>
            </p>
        </fieldset>
        <button type="submit">Valider</button>
    </form>

</body>

</html>