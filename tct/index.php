<?php 
 


echo 'begin';

//$files = glob('folder/*.{jpg,png,gif}', GLOB_BRACE);
			$files = scandir('folder/');
$cpt=0;
foreach($files as $file) {
     $cpt=1;
          rename ('folder/'.basename($file),'folder/'. str_replace( 'page_', 'lettre vendredi secu_' ,basename($file)));
  }



echo 'end';


?> 