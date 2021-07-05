<?php
$servername ='localhost';
$dbname ='backoffice';
$username ='root';
$password ='';
try {
    $db = new PDO("mysql:host=$servername; dbname=$dbname",$username, $password);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /* echo 'Success'; */
} catch (PDOException $e) {
    echo 'Error Connection : '.$e->getMessage();
}


/* <?php
$servername = 'localhost';
$dbname = 'backoffice';
$username = 'root';
$password = '';
try {
$db = new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo 'succes';
} catch (PDOException $e) {
echo 'connexion fail : '.$e->getMessage();
} */