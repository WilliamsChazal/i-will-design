<?php


    if($_POST){
        if(
        isset($_POST['blog_id'])&&!empty($_POST['blog_id'])&&
        isset($_POST['blog_titre'])&&!empty($_POST['blog_titre'])&&
        isset($_POST['blog_auteur'])&&!empty($_POST['blog_auteur'])&&
        isset($_POST['blog_contenu'])&&!empty($_POST['blog_contenu'])
        ){

        require_once("db-connect.php");
        $id=strip_tags($_POST['blog_id']);
        $titre =strip_tags($_POST['blog_titre']);
        $auteur =strip_tags($_POST['blog_auteur']);
        $contenu =strip_tags($_POST['blog_contenu']);
        
        if(isset($_POST['blog_date'])&&!empty($_POST['blog_date'])){
            $publish =strip_tags($_POST['blog_date']);
        }else{
            $publish=null;
        }
    
    
        $sql ="UPDATE `blog` SET 
        `blog_titre`=:blog_titre,
        `blog_auteur`=:blog_auteur,
        `blog_texte`=:blog_texte,
        `blog_date`=:blog_date
        WHERE `blog_id`=:blog_id";
    
        $query = $db ->prepare($sql);
       $query->bindValue(':blog_id', $id, PDO::PARAM_STR);
        $query->bindValue(':blog_titre', $titre, PDO::PARAM_STR);
        $query->bindValue(':blog_auteur', $auteur, PDO::PARAM_STR);
        $query->bindValue(':blog_texte', $contenu, PDO::PARAM_STR);
        $query->bindValue(':blog_date', $publish, PDO::PARAM_STR);
        $query->execute();
        echo 'Sucess';
    
/*         $sql ='SELECT*FROM `blog` WHERE `blog_id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query ->execute();
        $result = $query->fetch();
     */

echo '<a href=" blog-details.php?id='.$id.' "><button>Retour</button></a>';

    }else{

    echo 'Remplissez tous les champs' ;
    echo '<a href=" blog-details.php?id='.$id.' "><button>Retour</button></a>';

} 
    } else {
        echo 'publiez quelque chose !';
        echo '<a href=" blog-details.php?id='.$id.' "><button>Retour</button></a>';
    }