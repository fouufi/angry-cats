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
                if(isset($_POST['envoi_crime']))
                {
                    $col = $_POST['column']; //Variable contenant la colonne sélectionnée par l'utilisateur
                    //Récupération de l'id
                    $id = $_SESSION["id"];
                    $_SESSION["column"] = $col;
                    
                    //Affichage de la valeur à modifier
                    $findRow = "SELECT $col FROM Crime WHERE ID_Crime = $id";
                    $showRow = $mysqli->query($findRow);
                
                    echo "<h4 style='color:#fff;'>La valeur que vous souhaitez modifier dans la table Crime à la colonne `$col` est :</h4>";
                    ?>
                    <table class="t02">
                    <?php
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
					    echo "<td>$row[0]</td>";
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
        
                    <form action="update.php" method="post" class="modif">
				        <p>Quelle est la nouvelle valeur : <input type="text" name="new_value" placeholder="Nouvelle valeur"></p>
                        <input type="submit" name="replace" value="Remplacer">
                    </form>
                    <?php
                }

                if(isset($_POST['envoi_instit']))
                {
                    $col = $_POST['column']; //Variable contenant la colonne sélectionnée par l'utilisateur
                    //Récupération de l'id
                    $id = $_SESSION["id"];
                    $_SESSION["column"] = $col;
                    
                    //Affichage de la valeur à modifier
                    $findRow = "SELECT $col FROM Institution WHERE ID_Institution = $id";
                    $showRow = $mysqli->query($findRow);
                
                    echo "<h4 style='color:#fff;'>La valeur que vous souhaitez modifier dans la table Institution à la colonne `$col` est :</h4>";
                    ?>
                    <table class="t02">
                    <?php
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
					    echo "<td>$row[0]</td>";
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
        
                    <form action="update.php" method="post" class="modif">
				        <p>Quelle est la nouvelle valeur : <input type="text" name="new_value" placeholder="Nouvelle valeur"></p>
                        <input type="submit" name="replace" value="Remplacer">
                    </form>
                    <?php
                }


                if(isset($_POST['envoi_ville']))
                {
                    $col = $_POST['column']; //Variable contenant la colonne sélectionnée par l'utilisateur
                    //Récupération de l'id
                    $id = $_SESSION["id"];
                    $_SESSION["column"] = $col;
                    
                    //Affichage de la valeur à modifier
                    $findRow = "SELECT $col FROM Ville WHERE ID_Ville = $id";
                    $showRow = $mysqli->query($findRow);
                
                    echo "<h4 style='color:#fff;'>La valeur que vous souhaitez modifier dans la table Ville à la colonne `$col` est :</h4>";
                    ?>
                    <table class="t02">
                    <?php
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
					    echo "<td>$row[0]</td>";
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
        
                    <form action="update.php" method="post" class="modif">
				        <p>Quelle est la nouvelle valeur : <input type="text" name="new_value" placeholder="Nouvelle valeur"></p>
                        <input type="submit" name="replace" value="Remplacer">
                    </form>
                    <?php
                }

                if(isset($_POST['envoi_depart']))
                {
                    $col = $_POST['column']; //Variable contenant la colonne sélectionnée par l'utilisateur
                    //Récupération de l'id
                    $id = $_SESSION["id"];
                    $_SESSION["column"] = $col;
                    
                    //Affichage de la valeur à modifier
                    $findRow = "SELECT $col FROM Departement WHERE ID_Departement = $id";
                    $showRow = $mysqli->query($findRow);
                
                    echo "<h4 style='color:#fff;'>La valeur que vous souhaitez modifier dans la table Département à la colonne `$col` est :</h4>";
                    ?>
                    <table class="t02">
                    <?php
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
					    echo "<td>$row[0]</td>";
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
        
                    <form action="update.php" method="post" class="modif">
				        <p>Quelle est la nouvelle valeur : <input type="text" name="new_value" placeholder="Nouvelle valeur"></p>
                        <input type="submit" name="replace" value="Remplacer">
                    </form>
                    <?php
                }

                if(isset($_POST['envoi_region']))
                {
                    $col = $_POST['column']; //Variable contenant la colonne sélectionnée par l'utilisateur
                    //Récupération de l'id
                    $id = $_SESSION["id"];
                    $_SESSION["column"] = $col;
                    
                    //Affichage de la valeur à modifier
                    $findRow = "SELECT $col FROM Region WHERE ID_Region = $id";
                    $showRow = $mysqli->query($findRow);
                
                    echo "<h4 style='color:#fff;'>La valeur que vous souhaitez modifier dans la table Région à la colonne `$col` est :</h4>";
                    ?>
                    <table class="t02">
                    <?php
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
					    echo "<td>$row[0]</td>";
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
        
                    <form action="update.php" method="post" class="modif">
				        <p>Quelle est la nouvelle valeur : <input type="text" name="new_value" placeholder="Nouvelle valeur"></p>
                        <input type="submit" name="replace" value="Remplacer">
                    </form>
                    <?php
                }

                if(isset($_POST['envoi_crime_s']))
                {
                    //Récupération de l'id
                    $id = $_SESSION["id"];

                    if (isset($_POST['reponse']))
                    {
                        $reponse = $_POST['reponse'];

                        if($reponse == 'oui')
                        {
                            echo "<h4 style='color:#fff;'>La ligne supprimée est celle ci :</h4>";

                            //Affichages des noms des colonnes
                            $findNames = "SHOW COLUMNS FROM Crime"; 
                            $showNames = $mysqli->query($findNames);
                            ?>
                            <table class="t02"> 
                            <?php
                            while ($row = $showNames->fetch_row())
				            {
                                echo "<th>$row[0]</th>";
				            }
                            //---------------------------------

                            $findRow = "SELECT * FROM Crime WHERE ID_Crime = $id";
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

                            $query = "DELETE FROM Crime WHERE ID_Crime = $id"; 
                            $update = $mysqli->query($query);
                        }

                        if($reponse == 'non')
                        {
                            header('Location: angrycats.morvan.me/index.php');
                            exit();
                        }
                    }

                }

                if(isset($_POST['envoi_instit_s']))
                {
                    //Récupération de l'id
                    $id = $_SESSION["id"];

                    if (isset($_POST['reponse']))
                    {
                        $reponse = $_POST['reponse'];

                        if($reponse == 'oui')
                        {
                            echo "<h4 style='color:#fff;'>La ligne supprimée est celle ci :</h4>";

                            //Affichages des noms des colonnes
                            $findNames = "SHOW COLUMNS FROM Institution"; 
                            $showNames = $mysqli->query($findNames);
                            ?>
                            <table class="t02"> 
                            <?php
                            while ($row = $showNames->fetch_row())
				            {
                                echo "<th>$row[0]</th>";
				            }
                            //---------------------------------

                            $findRow = "SELECT * FROM Institution WHERE ID_Institution = $id";
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

                            $query = "DELETE FROM Institution WHERE ID_Institution = $id"; 
                            $update = $mysqli->query($query);
                        }

                        if($reponse == 'non')
                        {
                            header('Location: angrycats.morvan.me/index.php');
                            exit();
                        }
                    }

                }

                if(isset($_POST['envoi_ville_s']))
                {
                    //Récupération de l'id
                    $id = $_SESSION["id"];

                    if (isset($_POST['reponse']))
                    {
                        $reponse = $_POST['reponse'];

                        if($reponse == 'oui')
                        {
                            echo "<h4 style='color:#fff;'>La ligne supprimée est celle ci :</h4>";

                            //Affichages des noms des colonnes
                            $findNames = "SHOW COLUMNS FROM Ville"; 
                            $showNames = $mysqli->query($findNames);
                            ?>
                            <table class="t02"> 
                            <?php
                            while ($row = $showNames->fetch_row())
				            {
                                echo "<th>$row[0]</th>";
				            }
                            //---------------------------------

                            $findRow = "SELECT * FROM Ville WHERE ID_Ville = $id";
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

                            $query = "DELETE FROM Ville WHERE ID_Ville = $id"; 
                            $update = $mysqli->query($query);
                        }

                        if($reponse == 'non')
                        {
                            header('Location: angrycats.morvan.me/index.php');
                            exit();
                        }
                    }
                }

                if(isset($_POST['envoi_depart_s']))
                {
                    //Récupération de l'id
                    $id = $_SESSION["id"];

                    if (isset($_POST['reponse']))
                    {
                        $reponse = $_POST['reponse'];

                        if($reponse == 'oui')
                        {
                            echo "<h4 style='color:#fff;'>La ligne supprimée est celle ci :</h4>";

                            //Affichages des noms des colonnes
                            $findNames = "SHOW COLUMNS FROM Departement"; 
                            $showNames = $mysqli->query($findNames);
                            ?>
                            <table class="t02"> 
                            <?php
                            while ($row = $showNames->fetch_row())
				            {
                                echo "<th>$row[0]</th>";
				            }
                            //---------------------------------

                            $findRow = "SELECT * FROM Departement WHERE ID_Departement = $id";
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

                            $query = "DELETE FROM Departement WHERE ID_Departement = $id"; 
                            $update = $mysqli->query($query);
                        }

                        if($reponse == 'non')
                        {
                            header('Location: angrycats.morvan.me/index.php');
                            exit();
                        }
                    }

                }

                if(isset($_POST['envoi_region_s']))
                {
                    //Récupération de l'id
                    $id = $_SESSION["id"];

                    if (isset($_POST['reponse']))
                    {
                        $reponse = $_POST['reponse'];

                        if($reponse == 'oui')
                        {
                            echo "<h4 style='color:#fff;'>La ligne supprimée est celle ci :</h4>";

                            //Affichages des noms des colonnes
                            $findNames = "SHOW COLUMNS FROM Region"; 
                            $showNames = $mysqli->query($findNames);
                            ?>
                            <table class="t02"> 
                            <?php
                            while ($row = $showNames->fetch_row())
				            {
                                echo "<th>$row[0]</th>";
				            }
                            //---------------------------------

                            $findRow = "SELECT * FROM Region WHERE ID_Region = $id";
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

                            $query = "DELETE FROM Region WHERE ID_Region = $id"; 
                            $update = $mysqli->query($query);
                        }

                        if($reponse == 'non')
                        {
                            header('Location: angrycats.morvan.me/index.php');
                            exit();
                        }
                    }

                }
            ?>
        </div>
    </body>
</html>
