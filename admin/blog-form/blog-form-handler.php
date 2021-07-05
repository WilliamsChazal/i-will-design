<?php

    if($_POST){
        if(isset($_POST['blog-titre'])&&!empty($_POST['blog-titre'])&&
        isset($_POST['blog-auteur'])&&!empty($_POST['blog-auteur'])&&
        isset($_POST['blog-contenu'])&&!empty($_POST['blog-contenu'])&&
        isset($_POST['blog-date'])&&!empty($_POST['blog-date'])
    ){
    
    require_once("db-connect.php");
    $titre =strip_tags($_POST['blog-titre']);
    $auteur =strip_tags($_POST['blog-auteur']);
    $contenu =strip_tags($_POST['blog-contenu']);
    $publish =strip_tags($_POST['blog-date']);


    $sql ="INSERT INTO blog (blog_titre, blog_auteur, blog_texte,blog_date) VALUES(:blog_titre,:blog_auteur,
    :blog_texte,:blog_date)";
    $query = $db ->prepare($sql);
    $query->bindValue(':blog_titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':blog_auteur', $auteur, PDO::PARAM_STR);
    $query->bindValue(':blog_texte', $contenu, PDO::PARAM_STR);
    $query->bindValue(':blog_date', $publish, PDO::PARAM_STR);

    $query->execute();
    echo 'Sucess';
    echo'<br><a href=index.php> Retour </a>';


}else{
    echo 'Remplissez tous les champs';echo '<br><a href=home.php> Retour </a>';} 
} 
   

?>