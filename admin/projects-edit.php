<?php
session_start();

if($_SESSION['username']){
    if(isset($_GET['id']) &&!empty($_GET['id'])) {
        require_once('db-connect.php');
        $id = strip_tags($_GET['id']);
        $sql ='SELECT*FROM `projets` WHERE `idprojets`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query ->execute();
        $result = $query->fetch();
        /* var_dump($result); */
    }else{
        echo 'l\'Url n\'est pas valide';
    }
}else{
    echo 'Vous n\'êtes pas identifiez';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un projet</title>
</head>
<body>

            <form action="projects-edit-form-handler.php" method="post">
        <div>
            <label for="input_title">Titre</label>
            <input type="text" id="input_title" name="project_title" value="<?= $result['projets_title']?>" require>
        </div>
        <div>
            <label for="input_begin">Date de démarrage</label>
            <input type="date" id="input_begin" name="project_begin" value="<?= $result['projets_date_debut']?>" require>
        </div>
        <div>
            <label for="input_end">Date de fin</label>
            <input type="date" id="input_end" name="project_end" value="<?= $result['projets_date_fin']?>" require>
        </div>
        <div>
            <label for="input_context">Contexte</label>
            <textarea name="project_context" id="input_context" cols="30" rows="10" require > <?= $result['projets_context']?></textarea>
        </div>

        <div>
            <label for="input_specs">Spécifications fonctionnelles</label>
            <textarea name="project_specs" id="input_specs" cols="30" rows="10"><?= $result['projets_specs']?></textarea>
        </div>
        <div>
            <label for="input_githublink">Lien GitHub</label>
            <input type="text" id="input_githublink" name="project_githublink" value="<?= $result['projets_lien_github']?>">
        </div>
        <div>
            <label for="input_link">Lien du projet</label>
            <input type="text" id="input_link" name="project_link" value="<?= $result['projets_lien_projet']?>">
        </div>
        <div>
            <input type="hidden" name="idprojets" value="<?=$result['idprojets']?>">
            <input type="submit">
        </div>

    </form>
<br>
<br>
<br>
    <form action="picture-edit-handler.php" method="post" enctype="multipart/form-data">

<div>
    <label for="input_picture">Aperçu</label>
    <input type="file" id="input_picture" name="project_picture">
    <input type="hidden" name="idprojets" value='<?= $result['idprojets'] ?>'>
    <div><input type="submit"></div>
</div>
</form>

<br>
<br>
<br>

    <form action="logo-edit-handler.php" method="post" enctype="multipart/form-data">

<div>
        <label for="input_logo">Logo</label>
        <input type="file" id="input_logo" name="project_logo">      
    <input type="hidden" name="idprojets" value='<?= $result['idprojets'] ?>'>
</div>

<div>
    <input type="submit">
</div>

</form>
<br>

<a href="projects-details.php?id=<?=$result['idprojets']?>"><button>Retour</button></a>
</body>
</html>


