<?php
session_start();


    
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `blog`';
    $query = $db->prepare($_sql);
    $query ->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    /* var_dump($result); */




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
    <a href="blog-form.php"><button>Ajouter un article</button></a><br>

<?php

foreach ($result as $blog) {
 ?>
 <a href="blog-details.php?id=<?=$blog['blog_id']?>"><?=$blog['blog_titre']?></a>
    <?php
}
?><br>
   <a href="index.php"><button>Retour</button></a>

   
</body>
</html>