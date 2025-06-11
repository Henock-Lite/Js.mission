 <?php
    //Question 1 : Les Bases du PHP

    echo "<p>Bonjour, monde !</p>";

    //Question 2 : Variables et Opérateurs

    $name = "Henock";
    $age = 24;

    $phrase = "<p>" . "Vôtre Nom est : " . $name . " Vôtre ages est de :" . $age . " ans" . "<br>" . "</p>";

    echo $phrase;

    $currentYear = 2025;
    $calculate = $currentYear - $age;

    echo $calculate . "<br>";

    //Question 3 : Structures de Contrôle

    $UserAge = 17;

    if ($UserAge >= 18) {
        echo "Vous êtes Majeur" . "<br>";
    } else {
        echo "Vous êtes Mineure" . "<br>";
    }
    echo "Incrementation-display :";

    for ($i = 1; $i <= 10; $i++) {
        echo  $i;
    }
    echo "<br>";
    //Question 4 : Fonctions

    function sum($a, $b)
    {
        return $a + $b;
    }

    echo  "La somme est : " . sum(15, 13) . "<br>";

    $donnees = [
        [
            "nom" => "rober",
            "age" => 25
        ],
        [
            "nom" => "David",
            "age" => 30
        ],
    ];

    function CreateTable($donnees)
    {
        $htmltable = "<table border='1' cellpadding='8'>";
        $htmltable .= "<thead> <tr><th>Nom</th> <th>Age</th></tr></thead>";
        $htmltable .= "<tbody>";

        foreach ($donnees as $personne) {
            $htmltable .= "<tr>";
            $htmltable .= "<td>" . htmlspecialchars($personne["nom"]) . "</td>";
            $htmltable .= "<td>" . htmlspecialchars($personne["age"]) . "</td>";
            $htmltable .= "</tr>";
        }

        $htmltable .= "</tbody>";
        $htmltable .= "</table>";

        return $htmltable;
    }

    echo CreateTable($donnees);

    //Question 5 : Manipulation de Fichiers
    function play()
    {
        file_put_contents("write.txt", "\n Hello world");
        $text =  file_get_contents("write.txt");
        echo $text;
    }
    play();


    //*Exercice 2* : 

    $notes = [0, 13, 10, 8, 18];

    // Le maximum des notes

    $result = max($notes);
    echo "<br>"  . "Le maximum des notes : " . $result;

    // Le minimum des notes

    $result = min($notes);
    echo "<br>" . "Le minimum des notes : " . $result;

    //Calculez la moyenne des notes et affichez-la avec deux décimales.

    function average($array)
    {
        return array_sum($array) / count($array);
    }
    echo   "<br>" . 'la moyenne des notes : ' . number_format(average($notes), 2) . "<br>";


    echo "<pre> Ordre decroissant  : " .
        rsort($notes);
    var_dump($notes);
    echo "</pre>";



    //*Exercice 3*

    //Créez un tableau $nombres contenant une liste de 10 nombres entiers au hasard 

    $nombres = [];

    for ($i = 0; $i < 10; $i++) {
        $nombres[] = rand(1, 10);
    }
    echo "une liste de 10 nombres entiers au hasard : ";
    foreach ($nombres as $nombre) {
        echo  $nombre;
    }

    //Écrivez une fonction afficherTableau qui prend en paramètre un tableau et affiche ses éléments à l'écran. 

    $tableau = array(25, 75, 4, 99, 30);
    function afficherTableau($tableau)
    {
        $tab =  $tableau;
        echo "<pre>afficherTableau : ";
        var_dump($tab);
        echo "</pre>";
    }

    afficherTableau($tableau);

    // Écrivez une fonction sommeTableau qui prend en paramètre un tableau et retourne la  somme de tous ses éléments.

    $tab = [25, 45, 10];

    function sommeTableau($tab)
    {
        $tableau = array_sum($tab);
        return $tableau;
    }
    echo "la  somme de tous ses éléments : " . sommeTableau($tab) . "<br>";

    //Écrivez une fonction moyenneTableau qui prend en paramètre un tableau et retourne la moyenne de ses éléments. 

    $donnesTab = [12, 21, 13, 8];
    function moyenneTableau($donnesTab)
    {
        return array_sum($donnesTab) / count($donnesTab);
    }

    echo "la moyenne de ses éléments " . moyenneTableau($donnesTab) . "<br>";

    // Écrivez une fonction nombrePairs qui prend en paramètre un tableau et retourne le nombre de nombres pairs dans le tableau. 

    function nombrePairs($donnesTab)
    {
        echo "<pre> les Nombres paires sont  : ";
        return array_filter($donnesTab, function ($donnes) {
            return $donnes % 2 === 0;
        });
        echo "</pre>";
    }
    var_dump(nombrePairs($donnesTab));



    //*Exercice 4* : 
    //Créez un tableau $nomsComplets contenant une liste de 5 noms complets sous forme de chaînes de caractères 

    // Tableau de noms complets
    $nomsComplets = ["daryl-Numbi", "jean-Marc", "marie-Curie", "Paul-timmy", "Marvick-shape"];

    //  Affichage de la liste des noms complets
    function afficherNoms($nomsComplets)
    {
        echo "<pre>LISTES  NOMS COMPLETS  :"."<br>";
        for ($i = 0; $i < count($nomsComplets); $i++) {
            var_dump($nomsComplets[$i]);
        }
         echo "</pre>";
    }

     echo afficherNoms($nomsComplets);


    //Écrivez une fonction nomEnMajuscules qui prend en paramètre un nom complet (sous forme de chaîne de caractères) et retourne le nom en majuscules. 

    function nomEnMajuscules($nomComplets)
    {
        return strtoupper($nomComplets);
    }
    echo "<pre>le nom en majuscules : " . var_dump($nomsComplets) . "</pre>";


    // Fonction pour séparer prénom et nom
    
    
    function prenomNom($nomComplets)
    {
        return explode("-", $nomComplets);
    }

    // Affichage des noms en majuscules
    echo "<pre>Noms en majuscules:\n";
    foreach ($nomsComplets as $nom) {
        echo strtoupper($nom) . "\n";
    }
    echo "</pre>";


  
    // Affichage des prénoms de chaque personne
    echo "<pre>Nom:\n";
    foreach ($nomsComplets as $nom) {
        list($prenom, $nomDeFamille) = prenomNom($nom);
        echo $prenom . "\n";
    }
    echo "</pre>";
