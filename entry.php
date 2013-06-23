<?php
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        save();
    break;

    case 'GET':
        fetch();
    break;

    case 'PUT':
        update();
    break;

    case 'DELETE':
        delete();
    break;

    default:
        echo "erreur dans la méthode requise par le seveur";
    break;
}

function fetch() {
    // Connexion à la base de données
    $pdo=new PDO("mysql:dbname=gestion_series;host=127.0.0.1","root","");
    // La requête à effectuer
    $sql = "SELECT * FROM users";

    // Execution de la requête
    $statement=$pdo->prepare($sql);
    $statement->execute();

    // récupération des resultats
    $results=$statement->fetchAll(PDO::FETCH_ASSOC);

    // affichage du resultat en json
    die(json_encode($results));
}


function save() {
     // Connexion à la base de données
    $pdo=new PDO("mysql:dbname=gestion_series;host=127.0.0.1","root","");
    // La requête à effectuer
    $type = $_POST['type'];
    $nom = $_POST['nom'];
    $sql = "INSERT INTO `gestion_series`.`entry` (`id`, `type`, `nom`, `image`) VALUES (NULL, '$type', '$nom', NULL);";
    // Execution de la requête
    $statement=$pdo->prepare($sql);
    $statement->execute();

    // affichage du resultat en json
    die(json_encode($statement));
}
?>