<?php 

	
$conn = mysql_connect("localhost", "tct", "app");

if (!$conn) {
echo "Impossible de se connecter � la base de donn�es : " . mysql_error();
   exit;
}

if (!mysql_select_db("sitct")) {
   echo "Impossible de s�lectionner la base mydbname : " . mysql_error();
   exit;
}

$sql = "select `id`, `raison_sociale`, `email`, `code_valide`
FROM   aaa_communication
WHERE  code_valide = 1";

$result = mysql_query($sql);

if (!$result) {
   echo "Impossible d'ex�cuter la requ�te ($sql) dans la base : " . mysql_error();
   exit;
}

if (mysql_num_rows($result) == 0) {
   echo "Aucune ligne trouv�e, rien � afficher.";
   exit;
}
 
while ($row = mysql_fetch_assoc($result)) {
   echo $row["userid"];
   echo $row["fullname"];
   echo $row["userstatus"];
}








   
   if ($trouve==1) {
   
   
    
				 $mail = $email; // D�claration de l'adresse de destination.

						if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui pr�sentent des bogues.

						{

								    $passage_ligne = "\r\n";

						}

						else

{

							    $passage_ligne = "\n";

}

			//=====D�claration des messages au format texte et au format HTML.

			$message_txt = "Bonjour Madame/Monsieur";

			$message_html = "<html><head></head><body><b>Invitation</b>, Vendredi de la S�cu tct.</body></html>";

			//==========

							 

//=====Lecture et mise en forme de la pi�ce jointe.

$fichier   = fopen("folder/".$cpt.".pdf", "r");

$attachement = fread($fichier, filesize("folder/".$cpt.".pdf"));

$attachement = chunk_split(base64_encode($attachement));

fclose($fichier);

//==========

							 

//=====Cr�ation de la boundary.

$boundary = "-----=".md5(rand());

$boundary_alt = "-----=".md5(rand());

//==========

							 

//=====D�finition du sujet.

$sujet = "Invitation !";

//=========

				 

			//=====Cr�ation du header de l'e-mail.

			$header = "From: \"M\"<mcontact@tcttogo.tg>".$passage_ligne;

			$header.= "Reply-to: \"M\" <mcontact@tcttogo.tg>".$passage_ligne;

			$header.= "MIME-Version: 1.0".$passage_ligne;

			$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

			//==========

							 

			//=====Cr�ation du message.

			$message = $passage_ligne."--".$boundary.$passage_ligne;

			$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;

			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

			//=====Ajout du message au format texte.

			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;

			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

			$message.= $passage_ligne.$message_txt.$passage_ligne;

			//==========

							 

			$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;

							 

			//=====Ajout du message au format HTML.

			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;

			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

			$message.= $passage_ligne.$message_html.$passage_ligne;

			//==========

							 

			//=====On ferme la boundary alternative.

			$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;

			//==========
				 

			$message.= $passage_ligne."--".$boundary.$passage_ligne;

							 

			//=====Ajout de la pi�ce jointe.

			$message.= "Content-Type: image/jpeg; name=\"image.jpg\"".$passage_ligne;

			$message.= "Content-Transfer-Encoding: base64".$passage_ligne;

			$message.= "Content-Disposition: attachment; filename=\"image.jpg\"".$passage_ligne;

			$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;

			$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 

			//========== 

			//=====Envoi de l'e-mail.

			mail($mail,$sujet,$message,$header);

							 

//==========
		 
		  
   }
   

mysql_free_result($result);



?> 