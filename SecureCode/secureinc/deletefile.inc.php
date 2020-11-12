<?php
 
	$files_re = scandir('./reports/');
	$total_re = (count(scandir('./reports/')) - 2);

	
	foreach($files_re as $file_re) {
		if (($file_re != ".") && ($file_re != ".." && ($file_re != ".DS_Store"))){
			if( $total_re> 10 ){
				$files_re = glob('./reports/*'); // get all file names
				foreach($files_re as $file_re){ // iterate files
					if(is_file($file_re)){
						unlink($file_re); // delete file
					}
				}
			}
		}
	}
	
	
	$files_up = scandir('./uploads/');
	$total_up = (count(scandir('./uploads/')) - 2);
	
	foreach($files_up as $file_up) {
		if (($file_up != ".") && ($file_up != ".." && ($file_up != ".DS_Store"))){
			if( $total_up> 10 ){
				$files_up = glob('./uploads/*'); // get all file names
				foreach($files_up as $file_up){ // iterate files
					if(is_file($file_up)){
						unlink($file_up); // delete file
					}
				}
			}
		}
	}
	
	
?>