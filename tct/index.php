<?php 
 


echo 'begin';

//$files = glob('folder/*.{jpg,png,gif}', GLOB_BRACE);
			$files = scandir('folder/');
$cpt=0;
foreach($files as $file) {
     $cpt=1;
    //      rename ('folder/'.basename($file),'folder/'. str_replace( 'page_', 'lettre vendredi secu_' ,basename($file)));
 
  // create directory if not exists
 	  if (!file_exists('folder/'.basename($file, ".pdf"))) {
		  echo 'creation dossier : '.'folder/'.basename($file, ".pdf").'<br />';
		    mkdir('folder/'.basename($file, ".pdf"), 0777, true);		  
		  echo 'fin creation dossier : '.'folder/'.basename($file, ".pdf").'<br />';
			//copy file
			echo 'copie :'.'folder/'.basename($file).'  vers  '.'folder/'.basename($file, ".pdf").'/'.basename($file).'<br />';
			copy('folder/'.basename($file), 'folder/'.basename($file, ".pdf").'/'.basename($file));
			copy('TDR.pdf', 'folder/'.basename($file, ".pdf").'/TDR.pdf');
			copy('VENDREDI DE LA SECU.pdf', 'folder/'.basename($file, ".pdf").'/VENDREDI DE LA SECU.pdf');
			
			echo 'fin copie :'.'folder/'.basename($file).'  vers  '.'folder/'.basename($file, ".pdf").'/'.basename($file).'<br />';
			
          }
  }

   
   
   
echo 'end';


?> 