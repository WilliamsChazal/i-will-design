<?php
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('../../admin/db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `projets` WHERE `idprojets`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query ->execute();
        $result = $query->fetch();
        /* var_dump($result); */
    }else{
        echo'id manquante';
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
    <div class="portfolio_projects--cards--titre"><h3><?=$result['projets_title']?></h3></div>
        <div class="portfolio_projects--cards--image"><img src="assets/images/<?=$result['projets_imagee']?>" alt=""></div>
        <div class="portfolio_projects--cards--texte"><?=$result['projets_context']?>
    </div>





</body>
</html>