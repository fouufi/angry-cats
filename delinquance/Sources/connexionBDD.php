<?php

//connexion à la base de données:
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "utilisateur";
$BDD['pass'] = "m0t_d3_p@sse_us3r";
$BDD['db'] = "delinquance";

$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
$mysqli->set_charset("utf8");

if(!$mysqli)
{
    echo "Connexion non établie avec la BDD";
    exit;
}

   
?>
