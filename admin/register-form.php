<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-office Portefolio</title>
</head>
<body>
    <form action="register-form-handler.php" method="post">
        <div class="">
            <label for="input-username"> Nom d'utilisateur : </label>
            <input type="text" name="username" id="input-username">
        </div>
        <div class="">
            <label for="input-email"> Votre email : </label>
            <input type="email" name="email" id="input-email">
        </div>
        <div class="">
            <label for="input-password"> Mot de passe : </label>
            <input type="password" name="password" id="input-password">
        </div>
        <div class="">
            <label for="input-confirmation"> Confirmer le Mot de passe : </label>
            <input type="password" name="confirmation" id="input-confirmation">
            <span id="error"></span>
        </div>
        <div class="">
           <input type="submit" value="Envoyer" id="submit"> 
        </div>
    </form>
    <a href="index.php"><button>Retour</button></a>
    <script src="main.js"></script>
</body>
</html>