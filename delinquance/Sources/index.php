<?php
include ('connexionBDD.php');
error_reporting(E_ALL);
ini_set("display_errors",1);
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
				echo "<h4>Bienvenue sur la page d'accueil !</h4>";
				echo "<h5>Base de données : Délinquance</h5>"
			?>
			<br />

				<form action="requete.php" method="post" class="form1">
        			<label for="req">Type de requête à effectuer :</label>
					<select name="req" size="1" style="width:230px;">
						<option value="maj">Mise à jour d'une donnée</option>
						<option value="del">Suppression d'une donnée</option>
					</select>

					<input type="submit" name="submit" value="Valider" />
    
			</form>
		</div>
	</body>
</html>
