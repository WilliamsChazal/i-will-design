Projet Portfolio - Back-Office et Interface Visiteur
Contexte
Dans le cadre du développement d'un Portfolio de développeur Web, le besoin porte sur la conception et le développement d'un back-office permettant d'administrer la publication de projets, puis d'une interface publique permettant de consulter les projets publiés.

Étape 1 : L'inscription d'un nouvel utilisateur
L'objectif de cette première étape est d'inscrire les nouveaux administrateurs du Back-Office du Portfolio dans une base de données, via un formulaire de page web. L'utilisateur doit renseigner son nom d'utilisateur, une adresse email et un mot de passe, qu'il doit re-taper par sécurité dans un second champs de type password. Lorsqu'un utilisateur soumet une inscription, le programme vérifie la conformité des deux mots de passe saisie puis crypte le mot de passe avant d'insérer toutes les données renseignées dans la base de données.

Conception et développement du formulaire d'inscription
L'attribut « action » du formulaire dirige vers une page de traitement « register.php », l'attribut « method » prends la valeur « post » pour des raisons de sécurité.

Le formulaire comprend 4 champs et 1 bouton :

un input « username » de type text ;
un input « mail » de type email ;
un input « password » de type password ;
un input « confirmation » de type password ;
un input « register » de type submit ;
Gérer en JavaScript, dans un fichier externe nommé « main.js » :

une taille minimale de 8 caractères pour les mots de passe ;
l'obligation d'utiliser au moins une majuscule, une minuscule, un chiffre et un caractère spéciale ;
l'impossibilité de coller du texte dans le champs de confirmation du mot de passe ;
la correspondance des mots de passe saisies dans les deux champs :
si ils diffèrent, un message apparaît en rouge à côté du champs de confirmation indiquant que les 2 mots de passe ne sont pas identiques, et empêche le formulaire d'être soumis ;
si ils sont identiques, le bouton submit permet d'accéder à la page de traitement.
Conception de la base de données
Dans phpMyAdmin, créer une nouvelle base de données nommée « backoffice » et choisissez pour l'encodage des caractères « utf8_general_ci ». Créer une nouvelle table « users » dans cette base de données. Structurer votre table « Users » :

users :
id (pk)
username (varchar 255)
email (varchar 255)
password (varchar 255)
Pour chaque nouvelle entrée (à chaque nouvelle requête d'insertion), le champs « id » s'auto-incrémente, les autres champs de l'entrée sont alimentées par les informations transmises par le formulaire.

Connexion à la base de données
Créer une page dédiée à la seule connexion à la base de données, la connexion s'opère grâce à l'objet PDO. La page contient 4 variables, dont les valeurs seront à réadapter au moment du passage en production : (commencez par déclarer que ce qui suivra est du PHP en ouvrant la balise <?php, par contre il est inutile de fermer cette balise)

$servername = "localhost";
$dbname = "backoffice";
$username = "root";
$password = "";
La page établit ensuite la connexion :

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
Si le message « Connected successfully » apparaît, c'est que tout s'est bien passé. On peut ensuite passer en commentaire l'instruction echo "Connected successfully"; qui n'a qu'un caractère informatif pour le développeur.

Développement de la page de traitement en PHP
Commencer par ouvrir la balise <?php dans votre page « register.php ». Cette page ne contiendra que du php donc il est inutile de fermer cette balise.

Vous avez ensuite besoin que votre page PHP établisse la connexion à la base de données. Procédez à l'inclusion de la page « db-connect.php » au moyen de la fonction « require_once » :

require_once('db-connect.php');

Les informations soumises via le formulaire sont récupérées via la variable superglobale « $_POST[''] » qui prend comme clé d'indexation le name de l'input.

L'idée va être de nettoyer les valeurs récupérées avec $_POST[''] au moment où on les stocke dans des variables, par exemple au moyen de la fonction strip_tags(). Cette fonction permet de supprimer tout code html présent dans une chaîne de caractères. La variable retournée ne contiendra donc que du texte. Cette fonction sert à empêcher l'insertion de code HTML dans la base de données.

Après avoir nettoyé et stocké le mot de passe dans une variable, il va falloir l'encrypter pour qu'il ne soit pas écrit en clair dans la base de données. Pour ce faire, on va utiliser la fonction password_hash().

Maintenant qu'on a récupéré les informations à stocker en base de données, on peut travailler sur la requête SQL d'insertion.

Pour des raisons de sécurité, on va toujours utiliser des « Prepared Statements » ou « requête préparée » en français, qui permettent de se protéger contre les injections SQL. Les requêtes préparées sont des modèles de déclaration pour les requêtes dans les systèmes de base de données SQL qui ne contiennent pas de valeurs pour les paramètres individuels, elles fonctionnent avec des variables ou des caractères de remplissage qui sont uniquement remplacés par les valeurs réelles dans le système et ne sont donc pas affectées de valeurs avant l'exécution.

On stocke la requête dans une variable, par exemple :

$sql = 'INSERT INTO users(username, password, email) VALUES(:username, :password, :email)';

On prépare ensuite la requête :

$query = $db->prepare($sql);

On associe les valeurs aux noms correspondants, par exemple :

$query->bindValue(':username', $username, PDO::PARAM_STR);

Enfin, on exécute la requête :

$query->execute();

Et... ça marche ! On écrit dans la base de données !

Reste à prévenir de mauvaises utilisations : on peut a minima vérifier avec une condition que le mot de passe et la confirmation sont identiques. Si c'est le cas, on intègre tout le code qui précède comme instruction de la condition, sinon on affiche un message d'erreur.

En amont, il serait bon de vérifier que tous les champs de formulaire sont paramétrés, et qu'ils sont différents de vide. Si c'est le cas, on intègre tout le code qui précède dans l'instruction de cette condition, sinon, message d'erreur indiquant que tous les champs de ne sont pas remplis.

Étape 2 : Conception et développement de la page d'accueil
Pour le moment, nous avons mis notre formulaire d'inscription dans notre page « index.php ». En terme d'expérience utilisateur, ce n'est peut être pas la façon de faire la plus adéquate : la première page qui se charge doit donner le choix de s'inscrire ou de se connecter. On peut donc imaginer que notre formulaire d'inscription doit se trouver dans une page « register-form.php », et qu'un formulaire de connexion se trouvera dans une page « login-form.php ». La page « index.php » sera donc une page contenant des liens vers ces 2 autres pages.

Étape 3 : Conception et développement de la page de connexion