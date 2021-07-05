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
        isset($_POST['project_link'])&&!empty($_POST['project_link'])&&
        isset($_FILES['project_image']) && !empty($_FILES['project_image'])&&
        isset($_FILES['project_logo']) && !empty($_FILES['project_logo'])){
    
            require_once("db-connect.php");
            $title =strip_tags($_POST['project_title']);
            $begin =strip_tags($_POST['project_begin']);
            $end =strip_tags($_POST['project_end']);
            $context =strip_tags($_POST['project_context']);
            $specs =strip_tags($_POST['project_specs']);
            $githublink =strip_tags($_POST['project_githublink']);
            $projetlink =strip_tags($_POST['project_link']);

            if ($_FILES['project_image']['error']) {     
                switch ($_FILES['project_image']['error']){     
                        case 1: // UPLOAD_ERR_INI_SIZE     
                        echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                        break;     
                        case 2: // UPLOAD_ERR_FORM_SIZE     
                        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                        break;     
                        case 3: // UPLOAD_ERR_PARTIAL     
                        echo "L'envoi du fichier a été interrompu pendant le transfert !";     
                        break;     
                        case 4: // UPLOAD_ERR_NO_FILE     
                        echo "Le fichier que vous avez envoyé a une taille nulle !"; 
                        break;     
                }     
            }  else {     
        
                $target_dir = "../assets/images/admin_img/";
                $target_file = $target_dir . basename($_FILES["project_image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["project_image"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
        
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "file already exists but it's all good bro.";
                    $uploadOk = 1;
                }
        
                // Check file size
                if ($_FILES["project_image"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
        
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
        
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["project_image"]["tmp_name"], $target_file)) {
                        echo "Le fichier ". htmlspecialchars( basename( $_FILES["project_image"]["name"])). " a été téléversé.";
                        $picture = basename( $_FILES["project_image"]["name"]) ;
        
                    }}}

                    
                        if ($_FILES['project_logo']['error']) {     
                            switch ($_FILES['project_logo']['error']){     
                                    case 1: // UPLOAD_ERR_INI_SIZE     
                                    echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                                    break;     
                                    case 2: // UPLOAD_ERR_FORM_SIZE     
                                    echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                                    break;     
                                    case 3: // UPLOAD_ERR_PARTIAL     
                                    echo "L'envoi du fichier a été interrompu pendant le transfert !";     
                                    break;     
                                    case 4: // UPLOAD_ERR_NO_FILE     
                                    echo "Le fichier que vous avez envoyé a une taille nulle !"; 
                                    break;     
                            }     
                        }  else {     
                    
                            $target_dir = "../assets/images/admin_logo/";
                            $target_file = $target_dir . basename($_FILES["project_logo"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                            // Check if image file is a actual image or fake image
                            if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["project_logo"]["tmp_name"]);
                                if($check !== false) {
                                    echo "File is an image - " . $check["mime"] . ".";
                                    $uploadOk = 1;
                                } else {
                                    echo "File is not an image.";
                                    $uploadOk = 0;
                                }
                            }
                    
                            // Check if file already exists
                            if (file_exists($target_file)) {
                                echo "file already exists but it's all good bro.";
                                $uploadOk = 1;
                            }
                    
                            // Check file size
                            if ($_FILES["project_logo"]["size"] > 500000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }
                    
                            // Allow certain file formats
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                && $imageFileType != "gif" ) {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }
                    
                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                            } else {
                                if (move_uploaded_file($_FILES["project_logo"]["tmp_name"], $target_file)) {
                                    echo "Le fichier ". htmlspecialchars( basename( $_FILES["project_logo"]["name"])). " a été téléversé.";
                                    $logo = basename( $_FILES["project_logo"]["name"]) ;

                        
                        $sql ="INSERT INTO projets (projets_title,projets_date_debut,projets_date_fin,projets_context,projets_specs, projets_lien_github,projets_lien_projet, projets_image, projets_logo) VALUES(:projets_title,:projets_date_debut,:projets_date_fin,:projets_context,:projets_specs,:projets_lien_github,:projets_lien_projet,:projets_image,:projets_logo)";
                        $query = $db ->prepare($sql);
                        $query->bindValue(':projets_title', $title, PDO::PARAM_STR);
                        $query->bindValue(':projets_date_debut', $begin, PDO::PARAM_STR);
                        $query->bindValue(':projets_date_fin', $end, PDO::PARAM_STR);
                        $query->bindValue(':projets_context', $context, PDO::PARAM_STR);
                        $query->bindValue(':projets_specs', $specs, PDO::PARAM_STR);
                        $query->bindValue(':projets_lien_github', $githublink, PDO::PARAM_STR);
                        $query->bindValue(':projets_lien_projet', $projetlink, PDO::PARAM_STR);
                        $query->bindValue(':projets_image', $picture, PDO::PARAM_STR);
                        $query->bindValue(':projets_logo', $logo, PDO::PARAM_STR);
                        $query->execute();
                        echo 'Sucess';
                        echo 'Les données ont été enregistré dans le base de données !'; 
                        echo'<br><a href=home.php> Retour </a>';
                    } else {
                        echo 'Remplissez tous les champs';echo '<br><a href=add-form.php> Retour </a>';
                    } 
                }
            }
            

        } else {
            echo 'Il manque une information !';
        }
                
            
    } else {
        echo 'Pour acceder à cette page vous devez publier un projet';
    }
} else {
    echo 'Vous n\'êtes pas identifiez';
}

?>