<?php
session_start();
if($_SESSION['username']){
    if($_POST){
        if(isset($_POST['project_title'])&&!empty($_POST['project_title'])&&
        isset($_POST['project_begin'])&&!empty($_POST['project_begin'])&&
        isset($_POST['project_end'])&&!empty($_POST['project_end'])&&
        isset($_POST['project_context'])&&!empty($_POST['project_context'])&&
        isset($_POST['project_specs'])&&!empty($_POST['project_specs'])&&
        isset($_POST['project_githublink'])&&!empty($_POST['project_githublink'])&&
        isset($_POST['project_link'])&&!empty($_POST['project_link'])
/*         isset($_POST['project_image'])&&!empty($_POST['project_image']) */
    ){
    
    require_once("db-connect.php");
    $title =strip_tags($_POST['project_title']);
    $begin =strip_tags($_POST['project_begin']);
    $end =strip_tags($_POST['project_end']);
    $context =strip_tags($_POST['project_context']);
    $specs =strip_tags($_POST['project_specs']);
    $githublink =strip_tags($_POST['project_githublink']);
    $projetlink =strip_tags($_POST['project_link']);
  /*   $projetimg =strip_tags($_POST['project_image']); */

        if(isset($_FILES['project_image'])&&!empty($_FILES['project_image'])){
            $nomOrigine = $_FILES['project_image']['name'];
            $elementsChemin = pathinfo($nomOrigine);
            var_dump( $elementsChemin);
        
       

    $sql ="INSERT INTO projets (projets_title,projets_date_debut,projets_date_fin,projets_context,projets_specs, projets_lien_github,projets_lien_projet) VALUES(:projets_title,:projets_date_debut,:projets_date_fin,:projets_context,:projets_specs,:projets_lien_github,:projets_lien_projet)";
    $query = $db ->prepare($sql);
    $query->bindValue(':projets_title', $title, PDO::PARAM_STR);
    $query->bindValue(':projets_date_debut', $begin, PDO::PARAM_STR);
    $query->bindValue(':projets_date_fin', $end, PDO::PARAM_STR);
    $query->bindValue(':projets_context', $context, PDO::PARAM_STR);
    $query->bindValue(':projets_specs', $specs, PDO::PARAM_STR);
    $query->bindValue(':projets_lien_github', $githublink, PDO::PARAM_STR);
    $query->bindValue(':projets_lien_projet', $projetlink, PDO::PARAM_STR);
    /* $query->bindValue(':projets_image', $projetimg, PDO::PARAM_STR); */
    $query->execute();
    echo 'Sucess';
    echo'<br><a href=home.php> Retour </a>';
}else{
    echo 'Le fichier n\'a pas été importé';
}

}else{
    echo 'Remplissez tous les champs';echo '<br><a href=add-form.php> Retour </a>';} 
} else {
    echo 'Pour acceder à cette page vous devez publier un projet';}
   } else {
    echo 'Vous n\'êtes pas identifiez';
   }

?>