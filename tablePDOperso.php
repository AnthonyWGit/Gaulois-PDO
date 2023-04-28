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
    $sqlQuery1 =    'SELECT personnage.nom_personnage, personnage.adresse_personnage, lieu.nom_lieu FROM personnage     /*Writing request*/
                    INNER JOIN lieu ON personnage.id_lieu = lieu.id_lieu';
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery1);                        //Prepare, execute, then fetch to retrieve data
    $persoLieuStatement->execute();                                                     //The data we retrieve are in array form
    $table = $persoLieuStatement->fetchAll();

        foreach($table as $champ)
        {
            echo "<tr>
            <td scope='row'>".$champ["nom_personnage"]."</td>
            <td scope='row'>".$champ["adresse_personnage"]."</td>
            <td scope='row'>".$champ["nom_lieu"]."</td>
            </td>";         
        }
 