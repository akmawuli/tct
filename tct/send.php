<?php 

	
$conn = mysql_connect("localhost", "cnss", "app");

if (!$conn) {
echo "Impossible de se connecter à la base de données : " . mysql_error();
   exit;
}

if (!mysql_select_db("sicnss")) {
   echo "Impossible de sélectionner la base mydbname : " . mysql_error();
   exit;
}

$sql = "select `id`, `raison_sociale`, `email`, `code_valide`
FROM   aaa_communication
WHERE  code_valide = 1";

$result = mysql_query($sql);

if (!$result) {
   echo "Impossible d'exécuter la requête ($sql) dans la base : " . mysql_error();
   exit;
}

if (mysql_num_rows($result) == 0) {
   echo "Aucune ligne trouvée, rien à afficher.";
   exit;
}
 
while ($row = mysql_fetch_assoc($result)) {
   echo $row["userid"];
   echo $row["fullname"];
   echo $row["userstatus"];
}

mysql_free_result($result);



?> 