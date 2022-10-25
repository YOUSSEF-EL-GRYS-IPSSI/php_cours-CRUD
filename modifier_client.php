<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un client version 1</title>
</head>

<body>


<?php
   

    ///////////CONNECTION DE LA BASE DE DONNEE //////////////////////
    $bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //////////////////////////////////////////////////////////////////////


    if (!isset($_POST['modif'])) 
    {
        $id_client = $_GET['id_client'];

        $requete = "SELECT * FROM clients WHERE id_client = $id_client";

        $result = $bddPDO->query($requete);

        $data = $result->fetch(PDO::FETCH_ASSOC);



        echo"<pre>";
        echo print_r($data);
        echo "</pre>";


           ?>

        <form action="modifier_client.php" method="post">

            <fieldset>
                <legend><b>Modifier vos coordonnée</b></legend>


                <table>
                    <tr>
                        <td>Nom:</td>
                        <td><input type="text" name="nom" id="" size="60" value="<?= $data["nom"]; ?>"> </td>
                    </tr>

                    <tr>
                        <td>Prénom:</td>
                        <td><input type="text" name="prenom" id="" size="60" value="<?= $data["prenom"]; ?>"> </td>
                    </tr>

                    <tr>
                        <td>Age:</td>
                        <td><input type="text" name="age" id="" size="60" value="<?= $data["age"]; ?>"> </td>
                    </tr>

                    <tr>
                        <td>Adresse:</td>
                        <td><input type="text" name="adresse" id="" size="60" value="<?= $data["adresse"]; ?>"> </td>
                    </tr>

                    <tr>
                        <td>Ville:</td>
                        <td><input type="text" name="ville" id="" size="60" value="<?= $data["ville"]; ?>"> </td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="mail" id="" size="60" value="<?= $data["mail"]; ?>"> </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="reset" name="" id="" value="Effacer">
                        </td>
                        <td>
                            <input type="submit" name="modif" id="" value="Enregister">
                        </td>
                    </tr>
                </table>
            </fieldset>

            <input type="hidden" name="id_client" value="<?= $id_client; ?>">
        </form>
    <?php
        $result->closeCursor();
    } 
    
    
    
    
    
    
    
    
    else
    
    if(isset($_POST['nom'])&& isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['mail'])) 
    {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $mail = $_POST['mail'];

        $id_client = $_POST['id_client'];

        $requete = $bddPDO->prepare('UPDATE clients SET nom =:nom, prenom =:prenom, age =:age, adresse =:adresse, ville =:ville, mail =:mail
        WHERE id_client =:id_client');


        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':prenom', $prenom);
        $requete->bindValue(':age', $age);
        $requete->bindValue(':adresse', $adresse);
        $requete->bindValue(':ville', $ville);
        $requete->bindValue(':mail', $mail);
        $requete->bindValue(':id_client', $id_client);



        $result = $requete->execute();


      
        if (!$result) {
            echo "Un probleme est survenue, les modification n'ont pas été faites!";
        } 
        else {
            echo "Vos modifications ont été bien effectuées. :)";
            header("location:gestion_clients.php");
        }
    } 
        
    else {
        echo "Modifier vos coordonnés!";
    }
    ?>


</body>

</html>