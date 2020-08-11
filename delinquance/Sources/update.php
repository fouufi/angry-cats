<?php
include ('connexionBDD.php');
error_reporting(E_ALL);
ini_set("display_errors",1);
session_start();
?>

<html>
	<header>
		<meta charset="utf-8"/>
		<title>Angry Cats</title>
	</header>

	<body>
		<link rel="stylesheet" href="style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<?php require "entete.php"; ?>
		
		<br />
		<div class = main>
                <?php
                if(isset($_REQUEST['replace']))
                {                  
                    //Récupération des différents choix du user dans des variables (stockées en variable de session)
                    $id = $_SESSION["id"];
                    $col = $_SESSION["column"];
                    $table = $_SESSION['Table'];
                    $id_primary = $_SESSION['ID_Primary'];
                    //------------------------------
                    
                    $new_data = $_POST["new_value"];

                    $query = "UPDATE $table SET $col = '$new_data' WHERE $id_primary = $id"; 

                    $update = $mysqli->query($query);
                    echo "<h4 style='color:#fff;'>La ligne est désormais :</h4>";

                        //Affichages des noms des colonnes
                        $findNames = "SHOW COLUMNS FROM $table"; 
                        $showNames = $mysqli->query($findNames);
                        ?>
                        <table class="t02">
                        <?php
                        while ($row = $showNames->fetch_row())
				        {
                            echo "<th>$row[0]</th>";
				        }

                        $findRow = "SELECT * FROM $table WHERE $id_primary = $id";
                        $showRow = $mysqli->query($findRow);

                        //Récupération du nombre de colonnes
                        $colnb = mysqli_num_fields($showRow);
                        
                        //Affichage de la ligne
                        while($row = $showRow->fetch_row())
				        {
					        echo "<tr>";
					        //Affichage des données de la base de données correspondant à la ligne
					        for($i = 0; $i < $colnb; $i++)
				            {
						        echo "<td>$row[$i]</td>";
					        }
						    echo "</tr>";    
				        }
                        echo "</table>";
                }
            ?>
        </div>
    </body>
</html>