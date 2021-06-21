<?php
session_start();

if($_SESSION['username']){
    echo $_SESSION['success'];
    require_once('db-connect.php');
    $_sql = 'SELECT * FROM `projets`';
    $query = $db->prepare($_sql);
    $query ->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    /* var_dump($result); */
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
    <a href="add-form.php"><button>Ajouter un projet</button></a><br>

<?php

foreach ($result as $projet) {
 ?>
 <a href="projects-details.php?id=<?=$projet['idprojets']?>"><?=$projet['projets_title']?></a>
    <?php
}

?><br>
<a href="admin.php"><button>Retour</button></a><br>
   
</body>
</html>