<?php
if (isset($_POST ['submit'])) {
	require 'deletefile.inc.php'; 
    $textarea = $_POST['code-textarea'];
    $somevar = 0;
    function addit() 
    {
        GLOBAL $somevar;
        $somevar++;
        //echo "Somevar is ".$somevar;
    }

    if (!empty($textarea)) {
         
        if ($textarea) {

            $text = $textarea;

            header("Content-Type: text/plain");
            $var_str = var_export($text, true);
            $var = $var_str;
			$n1=uniqid('',true);
            file_put_contents('./uploads/'.$n1.'.txt', $var);
			$file_upload = './uploads/'.$n1.'.txt';
			

            $json = file_get_contents('./sec_vul.json');
            $json_data = json_decode($json,true);


			$n2=uniqid('',true);
			$myfile_create = fopen("./reports/".$n2.".txt", "w") or die("Unable to open file!");
			$path = "./reports/".$n2.".txt";
			
            foreach ($json_data as $key => $value) {
				$n2=uniqid('',true);
                $fileDestination = $file_upload;
                $myFile = $fileDestination;
                $searchString = "$value";
                

				$contents = file_get_contents($myFile);
				$pattern = preg_quote($searchString, '/');
				$pattern = "/^.*$pattern.*\$/m";


				if(preg_match_all($pattern, $contents, $matches)){
					if(file_exists($path)){
						addit();
						$data = "***ALERT! Potential Threat: ".$searchString."\n";
						file_put_contents($path, $data.PHP_EOL , FILE_APPEND | LOCK_EX);
                        } 
                    else {
						header("Location: ../index.php?errorcode");exit();
					}
				}	
            }
            if ($somevar) {
                header("Location: ../index.php?successfulTest");exit();
            }
        }
        if (!$somevar) {     
			$data = "***ALERT! NO Threat"."\n";
			file_put_contents($path, $data.PHP_EOL , FILE_APPEND | LOCK_EX);
            header("Location: ../index.php?successfulTest");exit();
        }
        else {header("Location: ../index.php?errorcode");exit();}
    }else {header("Location: ../index.php?errorcode");exit();
    }
}
?>




