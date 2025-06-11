<?php

include "./config.php";

//3.2. Écrivez un autre script PHP qui sélectionne les titres des livres écrits par l'auteur "Jules 
//Verne". Affichez ces titres dans un tableau html avec affichage des images des livres.

try {

    $sqltab = "SELECT titre,image FROM livres WHERE auteur LIKE '%jules Verne%'";
    $tabquery = $pdo->prepare($sqltab);
    $tabquery->execute();
    $reqtab = $tabquery->fetchAll();

} catch (Exception $e) {
    echo "Echec de connexion" . $e->getMessage();
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

        caption{
            margin: 15px 0;
            border: dashed 2px blueviolet;
            background: skyblue;
            font-weight: bold;
            text-transform: capitalize;
        }
    </style>



    <table border="1px" width="500px">
        <thead>
            <caption>livres écrits par l'auteur "Jules
                Verne"</caption>
            <tr>
                <th>
                    titres
                </th>
                <th>
                    image
                </th>

            </tr>

        </thead>
        <tbody style="width: 100%; height:100%">
            <?php foreach ($reqtab as $dataTab): ?>
                <tr>
                    <td><?= $dataTab["titre"] ?></td>
                    <td><img src="./img/<?= $dataTab["image"] ?>" alt="image"></td>
                </tr>

            <?php endforeach ?>


        </tbody>
    </table>





</body>

</html>