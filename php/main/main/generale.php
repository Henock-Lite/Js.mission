<?php

include "./config.php";


//10.1. Créez un script PHP pour sélectionner les catégories de livres distinctes de la table 
//"livres". Affichez ces catégories dans une liste.




try {
    $sqlgenerale = 'SELECT * FROM livres';
    $requestgenerale = $pdo->prepare($sqlgenerale);
    $requestgenerale->execute();
    $livres = $requestgenerale->fetchAll();
} catch (Exception $e) {
    echo "Échec de la récupération : " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>
</head>

<body>

    <style>
        td {
            text-align: center;
        }

        body {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        img {
            width: 100%;
            height: 300px;
            margin: 0 auto;
            display: block;
            object-fit: cover;
        }

        caption {
            margin: 15px 0;
            border: dashed 2px blueviolet;
            background: skyblue;
            font-weight: bold;
            text-transform: capitalize;
        }
    </style>

    <table border="1px" width="100%">
        <thead>
            <caption>les livres 📚</caption>

            <tr>
                <?php foreach ($livres as $value): ?>
                    <th>
                        <?= "Titre : " . $value["titre"] ?>
                    </th>
                <?php endforeach ?>
            </tr>

        </thead>
        <tbody style="width: 100%; height:100%">
            <tr>
                <?php foreach ($livres as $value): ?>
                    <td> <?= "Auteurs: " . $value["auteur"] ?></td>
                <?php endforeach ?>
            </tr>
        </tbody>
    </table>

</body>

</html>