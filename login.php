<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="CSS/Login&Inscription.css">
    <title>Form Validator</title>
    <?php include 'includes/login1.php';?>
  </head>
  <body>
    <div class="container">
      <div>
        <form id="form" class="form" action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
          <h2>Inscrivez vous</h2>
          <div class="form-control">
            <label for="email">Email</label>
            <input type="text" id="email" placeholder="Entrer l'email" name="email" value="<?= $email;?>"/>
            <small>Error message</small>
            <span><?= "<div style='color:red'; 'margin-top:10px';> $email_error </div>"?></span>
          </div>
          <div class="form-control">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              placeholder="Entrer le password"
              name="pass"
              value="<?= $pass;?>"
            />
            <small>Error message</small>
            <span><?= "<div style='color:red'; 'margin-top:10px';> $pass_error </div>"?></span>
          </div>
          <button type="submit"  name="submit">Valider</button>
        </form>
      </div>
      <div>
        <img
          src="images/undraw_Login_v483.png"
          alt="sing in"
          width="590"
          height="400"
        />
      </div>
    </div>
    
  </body>
  
</html>


