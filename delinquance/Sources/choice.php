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
            //Si l'utilisateur veut modifier une donnée dans la table crime
            if(isset($_POST['done_crime']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idcrime']))
                {
                    $id = $_POST['idcrime'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Crime WHERE ID_Crime = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Crime"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez modifier dans la table Crime est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <label for="column"> Dans quelle colonne est la donnée que vous souhaitez modifier ? </label>
                        <select name="column" size="1">
                            <option value="id_institution">ID_Institution</option>
                            <option value="crime">Crime</option>
                            <option value="annee">Année</option>
                            <option value="nb_actes">Nb_Actes</option>
                            <option value="localisation_x">LocalisationX</option>
                            <option value="localisation_y">LocalisationY</option>
                        </select>
                        <input type="submit" name="envoi_crime" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut modifier une donnée dans la table Institution
            if(isset($_POST['done_instit']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idinstit']))
                {
                    $id = $_POST['idinstit'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Institution WHERE ID_Institution = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Institution"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez modifier dans la table Institution est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <label for="column"> Dans quelle colonne est la donnée que vous souhaitez modifier ? </label>
                        <select name="column" size="1">
                            <option value="id_institution">ID_Institution</option>
                            <option value="institution">Institution</option>
                        </select>
                        <input type="submit" name="envoi_instit" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut modifier une donnée dans la table Ville
            if(isset($_POST['done_ville']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idville']))
                {
                    $id = $_POST['idville'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Ville WHERE ID_Ville = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Ville"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez modifier dans la table Ville est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <label for="column"> Dans quelle colonne est la donnée que vous souhaitez modifier ? </label>
                        <select name="column" size="1">
                            <option value="id_ville">ID_Ville</option>
                            <option value="ville">Ville</option>
                        </select>
                        <input type="submit" name="envoi_ville" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut modifier une donnée dans la table Département
            if(isset($_POST['done_depart']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['iddepart']))
                {
                    $id = $_POST['iddepart'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Departement WHERE ID_Departement = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Departement"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez modifier dans la table Département est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <label for="column"> Dans quelle colonne est la donnée que vous souhaitez modifier ? (Si vous modifier une colonne, vous devrez modifier l'autre après) </label>
                        <select name="column" size="1">
                            <option value="id_departement">ID_Departement</option>
                            <option value="departement">Département</option>
                            <option value="num_departement">Num_Département</option>
                        </select>
                        <input type="submit" name="envoi_depart" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut modifier une donnée dans la table Région
            if(isset($_POST['done_region']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idregion']))
                {
                    $id = $_POST['idregion'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Region WHERE ID_Region = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Region"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez modifier dans la table Région est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <label for="column"> Dans quelle colonne est la donnée que vous souhaitez modifier ? </label>
                        <select name="column" size="1">
                            <option value="id_region">ID_Région</option>
                            <option value="region">Région</option>
                        </select>
                        <input type="submit" name="envoi_region" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            //Si l'utilisateur veut supprimer une ligne dans la table crime
            if(isset($_POST['done_crime_s']))
            {
                //La ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idcrime']))
                {
                    $id = $_POST['idcrime'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Crime WHERE ID_Crime = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Crime"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez supprimer dans la table Crime est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <p>Voulez-vous vraiment supprimer cette ligne ?</p> 
                        <input type="radio" name="reponse" value="oui">Oui
                        <input type="radio" name="reponse" value="non">Non
                        <input type="submit" name="envoi_crime_s" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut supprimer une ligne dans la table Institution
            if(isset($_POST['done_instit_s']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idinstit']))
                {
                    $id = $_POST['idinstit'];
                    $_SESSION["id"] = $id;
                    
                    //Définition des requêtes
                    $findRow = "SELECT * FROM Institution WHERE ID_Institution = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Institution"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez supprimer dans la table Institution est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Affichages de la ligne correspondante
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>

                    <form action="data.php" method="post" class="form1">
                        <p>Voulez-vous vraiment supprimer cette ligne ?</p> 
                        <input type="radio" name="reponse" value="oui">Oui
                        <input type="radio" name="reponse" value="non">Non
                        <input type="submit" name="envoi_instit_s" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut supprimer une ligne dans la table Ville
            if(isset($_POST['done_ville_s']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idville']))
                {
                    $id = $_POST['idville'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Ville WHERE ID_Ville = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Ville"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez supprimer dans la table Ville est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>

                    <form action="data.php" method="post" class="form1">
                        <p>Voulez-vous vraiment supprimer cette ligne ?</p> 
                        <input type="radio" name="reponse" value="oui">Oui
                        <input type="radio" name="reponse" value="non">Non
                        <input type="submit" name="envoi_ville_s" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut supprimer une donnée dans la table Département
            if(isset($_POST['done_depart_s']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['iddepart']))
                {
                    $id = $_POST['iddepart'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Departement WHERE ID_Departement = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Departement"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez supprimer dans la table Département est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);
                    
                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    
                    ?>
                    <form action="data.php" method="post" class="form1">
                        <p>Voulez-vous vraiment supprimer cette ligne ?</p> 
                        <input type="radio" name="reponse" value="oui">Oui
                        <input type="radio" name="reponse" value="non">Non
                        <input type="submit" name="envoi_depart_s" value="Valider"/>
            	    </form>
                    <?php
                }
            }
            
            //Si l'utilisateur veut supprimer une ligne dans la table Région
            if(isset($_POST['done_region_s']))
            {
                //A la ligne correspondant à l'id qu'il a choisi
                if(isset($_POST['idregion']))
                {
                    $id = $_POST['idregion'];
                    $_SESSION["id"] = $id;

                    //Définition des requêtes
                    $findRow = "SELECT * FROM Region WHERE ID_Region = $id";
                    $showRow = $mysqli->query($findRow);

                    $findNames = "SHOW COLUMNS FROM Region"; 
                    $showNames = $mysqli->query($findNames);
                    
                    echo "<h4 style='color:#fff;'>La ligne que vous souhaitez supprimer dans la table Région est :</h4>";
                    ?>
                    <table class="t01">
                    <?php
                    
					//Affichages des noms des colonnes
					while ($row = $showNames->fetch_row())
					{
						echo "<th>$row[0]</th>";
                    }
                    
                    //Récupération du nombre de colonnes
                    $col = mysqli_num_fields($showRow);

                    //Affichages de la ligne correspondante à ce que l'utilisateur souhaite apporter des modifications
                    while($row = $showRow->fetch_row())
					{
						echo "<tr>";
						//Affichage des données de la base de données
						for($i = 0; $i < $col; $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";    
					}
                    echo "</table>";
                    ?>

                    <form action="data.php" method="post" class="form1">
                        <p>Êtes-vous sûr de vouloir modifier cette ligne ? <br /></p>
                        <input type="radio" name="reponse" value="oui">Oui
                        <input type="radio" name="reponse" value="non">Non
                        <input type="submit" name="envoi_region_s" value="Valider"/>
					</form>
                    <?php
                }
            }
            
        ?>

        </div>
    </body>
</html>