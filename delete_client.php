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

    if (empty($_POST['id_client'])) {
        header("Location:form_delete_client.php");
        $error = "Veuillez saisir l'Id que vous voulez modifier.";
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////

    ///////////CONNECTION DE LA BASE DE DONNEE //////////////////////
    $bddPDO = new PDO('mysql:host=localhost;dbname=webtoup', 'root', "");
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //////////////////////////////////////////////////////////////////////


    if (!isset($_POST['delete'])) 
    {
        $id_client = $_POST['id_client'];

        $requete = "SELECT * FROM clients WHERE id_client = $id_client";

        $result = $bddPDO->query($requete);

        $data = $result->fetch(PDO::FETCH_ASSOC);

        echo print_r($data);



           ?>

        <form action="delete_client.php" method="post">

            <fieldset>
                <legend><b>Supprimer vos coordonnée</b></legend>


                <table>
                    <tr>
                        <td>Nom:</td>
                        <td><?= $data["nom"]; ?> </td>
                    </tr>

                    <tr>
                        <td>Prénom:</td>
                        <td><?= $data["prenom"];?> </td>
                    </tr>

                    <tr>
                        <td>Age:</td>
                        <td><?= $data["age"]; ?> </td>
                    </tr>

                    <tr>
                        <td>Adresse:</td>
                        <td><?= $data["adresse"]; ?> </td>
                    </tr>

                    <tr>
                        <td>Ville:</td>
                        <td><?= $data["ville"]; ?> </td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td><?= $data["mail"]; ?> </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="reset" name="" id="" value="Effacer">
                        </td>
                        <td>
                            <input type="submit" name="delete" id="" value="deleted">
                        </td>
                    </tr>
                </table>
            </fieldset>

            <input type="hidden" name="id_client" value="<?= $id_client; ?>">
        </form>
    <?php
        $result->closeCursor();
    } 
    
    
    
    
    
    
    
    
    else{
    
       $id_client = $_POST['id_client'];

       $requete = "DELETE FROM clients WHERE id_client = $id_client";

       $result = $bddPDO->exec($requete);




      
        if (!$result) {
            echo "Un probleme est survenue, le client n'a pas été supprimé!";
        } 
        else {
            echo "le client a bien été supprimé. :)";
        }
    
   } 

   
    ?>


</body>

</html>