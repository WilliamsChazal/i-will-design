<?php

if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['password'])&&!empty($_POST['password'])&&isset($_POST['confirmation'])&&!empty($_POST['confirmation'])){

   
    
    if($_POST['password']=== $_POST['confirmation']){
        require_once('db-connect.php'); //la liaison à la base de Données se fait après les vérifications
        $username=strip_tags($_POST['username']); /* Prendre le "name" */
        $email=strip_tags($_POST['email']); // strip_tag permet de sécurisé et d'éviter les injections dans le php"
        $password=strip_tags($_POST['password']);
        $confirmation=strip_tags($_POST['confirmation']);
        $password_encrypt= password_hash ($password, PASSWORD_DEFAULT);
        
    //faire requete SQL 
        $sql ="INSERT INTO users(username,email,password) VALUES(:username, :email, :password)";
        $query = $db ->prepare($sql);
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password_encrypt, PDO::PARAM_STR);
        $query->execute();
        echo 'Sucess';
        echo'<br><a href=admin.php> Retour </a>';
        
    }else{
        echo 'Les mots de passe ne sont pas identiques';
    }


}else{
    echo 'Veuillez remplir tous les champs du formulaire';
}



