<?php
session_start();


    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `blog` WHERE `blog_id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query ->execute();
        $result = $query->fetch();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?=$result['blog_titre']?> <br>
<?=$result['blog_auteur']?> <br>
<?=$result['blog_texte']?> <br>
<?=$result['blog_date']?> <br>

<a href="blog-edit.php?id=<?=$result['blog_id']?>">Modifier l'Article <?=$result['blog_titre']?></a><br>
<a href="blog-delete.php?id=<?=$result['blog_id']?>">Supprimer <?=$result['blog_titre']?></a><br>
<a href="index.php"><button>Retour</button></a>

</body>
</html>