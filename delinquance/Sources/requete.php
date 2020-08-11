<?php
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
		<div class="main">
		
		<?php
		if(isset($_POST['submit']))
		{
			$req = $_POST['req'];

			if($req == "maj")
			{
				?>
				<form action="requete_table.php" method="get" class="form1">
                    <label for="tables_maj"> Dans quelle table est la donnée ? </label>
                       
					<select name="tables_maj" size="1">
                    	<option value="crime_maj">Table Crime
                        <option value="institution_maj">Table Institution
                        <option value="ville_maj">Table Ville
                        <option value="departement_maj">Table Département
                        <option value="region_maj">Table Région
                    </select>

                    <input type="submit" name="submit_maj" value="Valider"/>
            	</form>

			<?php
				
			}
			if($req == "del")
			{
				echo "<h4>Suppression d'une donnée</h4>";
				?>
				<form action="requete_table.php" method="get" class="form1">
                    <label for="tables_suppr"> Dans quelle table est la donnée ? </label>
                    
					<select name="tables_suppr" size="1">
                    	<option value="crime_suppr">Table Crime
                        <option value="institution_suppr">Table Institution
                        <option value="ville_suppr">Table Ville
                        <option value="departement_suppr">Table Département
                        <option value="region_suppr">Table Région
                	</select>

                    <input type="submit" name="submit_suppr" value="Valider"/>
				</form>
			<?php
			}
		}
		?>
		</div>
	</body>
</html>
