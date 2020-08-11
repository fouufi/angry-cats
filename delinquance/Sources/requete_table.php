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
			if(isset($_GET["tables_maj"]))
			{
				$table = $_GET["tables_maj"];
			
				if($table == "crime_maj")
				{
					echo "<h3>Table Crime</h3>";

					$_SESSION['Table'] = "Crime";
					$_SESSION['ID_Primary'] = "ID_Crime";
					#Création des requêtes 
					$query = "SELECT * FROM Crime";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Crime"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id du crime afin de pouvoir mettre à jour une valeur souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Mise à jour d'une valeur de la ligne : <input type="text" name="idcrime" placeholder="ID_Crime"></p>
						<p><input type="submit" name="done_crime" value="OK"></p>
					</form>
					<?php
				}
				
				if($table == "institution_maj")
				{
					echo "<h4>Table Institution</h4>";

					$_SESSION['Table'] = "Institution";
					$_SESSION['ID_Primary'] = "ID_Institution";
					#Création des requêtes 
					$query = "SELECT * FROM Institution";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Institution"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id de l'institution afin de pouvoir mettre à jour une valeur souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Mise à jour d'une valeur de la ligne : <input type="text" name="idinstit" placeholder="ID_Institution"></p>
						<p><input type="submit" name="done_instit" value="OK"></p>
					</form>

					<?php
				}

				if($table == "ville_maj")
				{
					echo "<h4>Table Ville</h4>";

					$_SESSION['Table'] = "Ville";
					$_SESSION['ID_Primary'] = "ID_Ville";
					#Création des requêtes 
					$query = "SELECT * FROM Ville";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Ville"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id de la ville afin de pouvoir mettre à jour une valeur souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Mise à jour d'une valeur de la ligne : <input type="text" name="idville" placeholder="ID_Ville"></p>
						<p><input type="submit" name="done_ville" value="OK"></p>
					</form>
					
					<?php
				}
				
				if($table == "departement_maj")
				{
					echo "<h4>Table Département</h4>";

					$_SESSION['Table'] = "Departement";
					$_SESSION['ID_Primary'] = "ID_Departement";
					#Création des requêtes 
					$query = "SELECT * FROM Departement";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Departement"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id du département afin de pouvoir mettre à jour une valeur souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Mise à jour d'une valeur de la ligne : <input type="text" name="iddepart" placeholder="ID_Departement"></p>
						<p><input type="submit" name="done_depart" value="OK"></p>
					</form>
					
					<?php
				}

				if($table == "region_maj")
				{
					echo "<h4>Table Région</h4>";

					$_SESSION['Table'] = "Region";
					$_SESSION['ID_Primary'] = "ID_Region";
					#Création des requêtes 
					$query = "SELECT * FROM Region";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Region"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id de la région afin de pouvoir mettre à jour une valeur souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Mise à jour d'une valeur de la ligne : <input type="text" name="idregion" placeholder="ID_Region"></p>
						<p><input type="submit" name="done_region" value="OK"></p>
					</form>
					
					<?php
				}

			}

			if(isset($_GET["tables_suppr"]))
			{
				$table = $_GET["tables_suppr"];
			
				if($table == "crime_suppr")
				{
					echo "<h3>Table Crime</h3>";

					$_SESSION['Table'] = "Crime";
					$_SESSION['ID_Primary'] = "ID_Crime";
					#Création des requêtes 
					$query = "SELECT * FROM Crime";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Crime"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id du crime afin de pouvoir supprimer la ligne souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Supprimer la ligne : <input type="text" name="idcrime" placeholder="ID_Crime"></p>
						<p><input type="submit" name="done_crime_s" value="OK"></p>
					</form>
					<?php
				}
				
				if($table == "institution_suppr")
				{
					echo "<h4>Table Institution</h4>";

					$_SESSION['Table'] = "Institution";
					$_SESSION['ID_Primary'] = "ID_Institution";
					#Création des requêtes 
					$query = "SELECT * FROM Institution";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Institution"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id de l'institution afin de pouvoir supprimer la ligne souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Supprimer la ligne : <input type="text" name="idinstit" placeholder="ID_Institution"></p>
						<p><input type="submit" name="done_instit_s" value="OK"></p>
					</form>

					<?php
				}

				if($table == "ville_suppr")
				{
					echo "<h4>Table Ville</h4>";

					$_SESSION['Table'] = "Ville";
					$_SESSION['ID_Primary'] = "ID_Ville";
					#Création des requêtes 
					$query = "SELECT * FROM Ville";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Ville"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id de la ville afin de pouvoir supprimer la ligne souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Supprimer la ligne : <input type="text" name="idville" placeholder="ID_Ville"></p>
						<p><input type="submit" name="done_ville_s" value="OK"></p>
					</form>
					
					<?php
				}
				
				if($table == "departement_suppr")
				{
					echo "<h4>Table Département</h4>";

					$_SESSION['Table'] = "Departement";
					$_SESSION['ID_Primary'] = "ID_Departement";
					#Création des requêtes 
					$query = "SELECT * FROM Departement";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Departement"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id du département afin de supprimer la ligne souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Suppression de la ligne : <input type="text" name="iddepart" placeholder="ID_Departement"></p>
						<p><input type="submit" name="done_depart_s" value="OK"></p>
					</form>
					
					<?php
				}

				if($table == "region_suppr")
				{
					echo "<h4>Table Région</h4>";

					$_SESSION['Table'] = "Region";
					$_SESSION['ID_Primary'] = "ID_Region";
					#Création des requêtes 
					$query = "SELECT * FROM Region";
					$show = $mysqli->query($query);
					
					$query = "SHOW COLUMNS FROM Region"; 
					$show_names = $mysqli->query($query);

					echo "<table><tr>";
					//Affichages des noms des colonnes
					while ($row = $show_names->fetch_row())
					{
						echo "<th>$row[0]</th>";
					}

					//Récupération du nombre de colonnes
					$col = mysqli_num_fields($show);

					//Parcours des row de la bdd
					while($row = $show->fetch_row())
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

					//Choix de l'id de la région afin de pouvoir supprimer la ligne souhaitée
					?>
					<form action="choice.php" method="post" class="modif">
						<p>Supprimer la ligne : <input type="text" name="idregion" placeholder="ID_Region"></p>
						<p><input type="submit" name="done_region_s" value="OK"></p>
					</form>
					
					<?php
				}
			}
			?>

		</div>
	</body>
</html>
