
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supression des données des clients</title>
</head>
<body>
    

<form action="delete_client.php" method="post">

        <fieldset>
            <legend>
                <b>Saisissez votre identifiant client pour supprimer vos coordonées</b>
            </legend>
            <table>
                <tr>
                    <td>Code client : </td>
                    <td>
                        <input type="text" name="id_client" id="" size="50" maxlength="55>">
                    </td>
                </tr>


    
                <tr>
                    <td>
                        <input type="submit"  value="Deleted" name="deletedClient">
                    </td>
                </tr>
            </table>

        </fieldset>

    </form>
</body>
</html>