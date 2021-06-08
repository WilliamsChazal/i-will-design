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
<div class="main">
        <div class="main_form">
            <form action="admin/login-form-handler.php" method="post">
                <div>
                        <label for="input_name">Nom d'utilisateur</label>
                        <input type="text" name="username" class="name">
                </div>
                <div>
                <label for="input_password" input="password">Mot de passe</label>
                    <input type="password" name="password">
                </div>
                <div class="btn-box-1">
                    <input type="submit" value="Se connecter" class="button">
                </div>
            </form> 
            <div>
                <a href="admin/register-form.php"><button class="button">S'inscire</button></a>
                </div>
                <div class="btn-box">
            <a href="index.php"><button class="button1">Retour</button></a>
            </div>
            

        
   </div>

</div>  
</body>
</html>