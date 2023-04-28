<?php 
    try
    {
        $mySQLconnection = new PDO(                                                     //Connecting to SQL server
            'mysql:host=127.0.0.1;dbname=gaulois;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);                              
    }
    catch (Exception $e) //catching errors                                              //Show error if we can't connect
    {
        die('Erreur : ' . $e->getMessage());
    }    
    $sqlQuery1 =    'SELECT potion.nom_potion, COUNT(ingredient.id_ingredient) AS "nb_ingredients" FROM potion INNER JOIN composer ON potion.id_potion = composer.id_potion
                    INNER JOIN ingredient ON composer.id_ingredient = ingredient.id_ingredient
                    GROUP BY potion.id_potion
                    ORDER BY COUNT("nb_ingredients") DESC';
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery1);                        //Prepare, execute, then fetch to retrieve data
    $persoLieuStatement->execute();
    $table = $persoLieuStatement->fetchAll();

        foreach($table as $champ)
        {
            echo "<tr>
            <td scope='row'>".$champ["nom_potion"]."</td>
            <td scope='row'>".$champ["nb_ingredients"]."</td>
            </td>";         
        }