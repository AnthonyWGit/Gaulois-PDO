<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div>
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
    $persoLieuStatement->execute();
    $table = $persoLieuStatement->fetchAll();
    ?>
    </div>
</body>
</html>