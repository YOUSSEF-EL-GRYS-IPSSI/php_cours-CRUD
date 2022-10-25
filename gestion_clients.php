<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération des données</title>
</head>

<body>
    <?php
    $bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $requete = "SELECT * FROM clients ORDER BY id_client ASC";


    $result  = $bddPDO->query($requete);

    if (!$result) {

        echo "la récupération des données a rencontré un problème. dans la base de donnée ";
    } else {
        $nb_clients = $result->rowCount();
    }
    ?>

    <h3>Tous nos clients</h3>
    <h4>il y a <?= $nb_clients ?> clients</h4>

    <table border=1>
        <tr>
            <th>Numéro de client</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Adresse Email</th>
        </tr>


        <?php
        while ($ligne = $result->fetch(PDO::FETCH_NUM)) {

            echo "<tr>";
            foreach ($ligne as $valeur) {

                echo "<td>$valeur</td>";
            }

            echo "<tr>";
        }
        ?>
    </table>

    <?php

    $result->closeCursor();
    ?>




</body>

</html>