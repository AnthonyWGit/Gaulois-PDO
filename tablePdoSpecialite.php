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
    $sqlQuery1 =    'SELECT specialite.nom_specialite, COUNT(personnage.id_personnage) FROM specialite INNER JOIN personnage ON specialite.id_specialite = personnage.id_specialite
                    GROUP BY specialite.id_specialite
                    ORDER BY COUNT(personnage.id_personnage) DESC';
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery1);                        //Prepare, execute, then fetch to retrieve data
    $persoLieuStatement->execute();
    $table = $persoLieuStatement->fetchAll();

        foreach($table as $champ)
        {
            echo "<tr>
            <td scope='row'>".$champ["nom_specialite"]."</td>
            <td scope='row'>".$champ["COUNT(personnage.id_personnage)"]."</td>
            </td>";         
        }