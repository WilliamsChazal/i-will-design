<?php
session_start();


    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `blog` WHERE `blog_id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query ->execute();
        $result = $query->fetch();
        /* var_dump($result); */
    }else{
        echo 'l\'Url n\'est pas valide';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Article</title>
</head>
<body>

<form action="blog-edit-handler.php" method="post">
        <div>
            <label for="input-titre">Titre de l'article</label>
            <input type="text" name='blog_titre'   value="<?=$result['blog_titre']?>">
        </div>

        <div>
            <label for="input-auteur">Auteur de l'article</label>
            <input type="text" name='blog_auteur'  value="<?=$result['blog_auteur']?>">
        </div>

        <div>
            <label for="input-texte">Contenu de l'article</label>
            <textarea type="text" name='blog_contenu'  value="<?=$result['blog_contenu']?>" >Rédiger votre message dans ce champs</textarea>
        </div>

        <div>
            <label for="input-date">Date de publication</label>
            <input type="date" name='blog_date'  value="<?=$result['blog_date']?>">
        </div>

        <div class="button">
            <input type="hidden" value="<?=$result['blog_id']?>" name="blog_id">
        <button type="submit">Mettre à jour l'article</button>
        </div>
</form>
        <a href="blog-details.php?id=<?=$result['blog_id']?>"><button>Retour</button></a>
</body>
</html>


