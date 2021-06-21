<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Accueil</title>
</head>
<body>
<div class="container_form">
    <form action="login-form-handler.php" method="post" >
        <div class="container_username">
           <span> <label for="input_name">Nom d'utilisateur</label></span>
            <span class="container_username--input"><input type="text" name="username"></span>
        </div> 

        <div class="container_password">
            <span><label for="input_password" input="password">Mot de passe</label></span>
             <span class="container_password--input"><input type="password" name="password"></span>
        </div>

        <div class="container_form--bouton">
          <a href=""> <input type="submit" value="Se connecter" class="container_form--bouton--submit"></a>
          <button><a href="register-form.php">S'inscrire</a></button>
       </div>

       <button> <a href="end-session.php">Déconnexion</button></a>
    </form>
</body>
</html>




