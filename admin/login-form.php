<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="login-form-handler.php" method="post">
       <div>
            <label for="input_name">Nom d'utilisateur</label>
            <input type="text" name="username">
       </div>
       <div>
       <label for="input_password" input="password">Mot de passe</label>
        <input type="password" name="password">
       </div>
       <div>
           <input type="submit" value="Se connecter">
           
       </div>
   </form> 
   <a href="index.php"><button>Retour</button></a>
</body>
</html>