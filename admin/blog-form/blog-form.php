<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="blog-form-handler.php" method="post">
        <div>
            <label for="input-titre">Titre de l'article</label>
            <input type="text" name='blog-titre' required>
        </div>

        <div>
            <label for="input-auteur">Auteur de l'article</label>
            <input type="text" name='blog-auteur' required>
        </div>

        <div>
            <label for="input-texte">Contenu de l'article</label>
            <textarea type="text" name='blog-contenu' required >Rédiger votre message dans ce champs</textarea>
        </div>

        <div>
            <label for="input-date">Date de publication</label>
            <input type="date" name='blog-date' required>
        </div>

        <div class="button">
        <button type="submit">Poster l'article</button>
        </div>
    </form>

  <a href="index.php">  <button>retour</button></a>
</body>
</html>