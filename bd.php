<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement des données</title>
</head>

<body>
    <?php

    use LDAP\Result;

    $bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['valider'])) {

        $nom           =    $_POST['nom'];
        $prenom        =    $_POST['prenom'];
        $age           =    $_POST['age'];
        $adresse       =    $_POST['adresse'];
        $ville         =    $_POST['ville'];
        $mail          =    $_POST['mail'];

        if (
            !empty($nom) && !empty($prenom)
            && !empty($age) && !empty($adresse)
            && !empty($ville) && !empty($mail)
        ) {

            $requete = $bddPDO->prepare('INSERT INTO clients(nom, prenom, age, adresse, ville, mail) 
        VALUES(:nom, :prenom, :age, :adresse, :ville, :mail)');

            $requete->bindValue(':nom', $nom);
            $requete->bindValue(':prenom', $prenom);
            $requete->bindValue(':age', $age);
            $requete->bindValue(':adresse', $adresse);
            $requete->bindValue(':ville', $ville);
            $requete->bindValue(':mail', $mail);

            $result = $requete->execute();

            if (!$result) {

                echo "Error !";
            } else {
                echo "
            <script type=\"text/javascript\">
            alert('Vous ete bien enregistré. Votre identifiant est " . $bddPDO->lastInsertId() . "')
            </<script>";

            
            }
        } else {
            echo "Tous les champs sont requis";
        }
    }


    ?>
    <form action="bd.php" method="post">

        <fieldset>
            <legend>
                <b>Vos coordonées</b>
            </legend>
            <table>
                <tr>
                    <td>Nom: </td>
                    <td>
                        <input type="text" name="nom" id="" size="50" maxlength="50>">
                    </td>
                </tr>

                <tr>
                    <td>Prénom: </td>
                    <td>
                        <input type="text" name="prenom" id="" size="50" maxlength="50>">
                    </td>
                </tr>

                <tr>
                    <td>Age: </td>
                    <td>
                        <input type="text" name="age" id="" size="50" maxlength="3>">
                    </td>
                </tr>

                <tr>
                    <td>Adresse: </td>
                    <td>
                        <input type="text" name="adresse" id="" size="50" maxlength="100>">
                    </td>
                </tr>

                <tr>
                    <td>Ville: </td>
                    <td>
                        <input type="text" name="ville" id="" size="50" maxlength="100>">
                    </td>
                </tr>

                <tr>
                    <td>Adresse Email: </td>
                    <td>
                        <input type="text" name="mail" id="" size="50" maxlength="50>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="reset" name="effacer" value="Effacer">
                    </td>

                    <td>
                        <input type="submit" name="valider" value="valider">
                    </td>
                </tr>
            </table>

        </fieldset>

    </form>

</body>

</html>