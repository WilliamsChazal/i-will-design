<?php
session_start();
$_SESSION = array();
                        session_destroy();
                        echo '<body onLoad="alert(\'Deconnexion réussie\')">';
                        echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
?>