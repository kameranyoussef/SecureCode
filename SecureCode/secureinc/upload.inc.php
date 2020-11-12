<?php
if (isset($_POST ['submit'])) {
		require 'deletefile.inc.php'; 
		
        $file = $_FILES['file'];
        $filename  = $_FILES['file']['name'];
        $fileTmpName  = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType  = $_FILES['file']['type'];

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('php');

        if (in_array($fileActualExt,$allowed)) {
            $somevar = 0;
            function addit() 
            {
                GLOBAL $somevar;
                $somevar++;
            }

            if ($fileError === 0) {
                //file size 1000000 = 1mb
                if ($fileSize < 1000000) {
					$n1=uniqid('',true);
                    $fileNameNew = $n1.".txt";
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);


                    $json = file_get_contents('./sec_vul.json');
                    $json_data = json_decode($json,true);
					

					$n2=uniqid('',true);
					$myfile = fopen("./reports/".$n2.".txt", "w") or die("Unable to open file!");
					$path = "./reports/".$n2.".txt";
					

                    foreach ($json_data as $key => $value) {
                        $myFile = $fileDestination;
                        $searchString = $value;
                        
                        
						$contents = file_get_contents($myFile);
						$pattern = preg_quote($searchString, '/');
                        $pattern = "/^.*$pattern.*\$/m";
                        

						if(preg_match_all($pattern, $contents, $matches)){
							if(file_exists($path)){
								addit();
								$data = "***ALERT! Potential Threat: ".$searchString."\n";
								file_put_contents($path, $data.PHP_EOL , FILE_APPEND | LOCK_EX);

							} else {
								echo  'no file<br>';
								header("Location: ../index.php?errorInvalidFile");exit();
							}
						}
                    }
                    if ($somevar) {
                        header("Location: ../index.php?success");exit();
                    }
                }
                if (!$somevar) {
					$data = "***ALERT! NO Threat"."\n";
					file_put_contents($path, $data.PHP_EOL , FILE_APPEND | LOCK_EX);
                    header("Location: ../index.php?success");exit();
                } 
                else {header("Location: ../index.php?errorInvalidFile");exit();
                }
            }else {header("Location: ../index.php?errorInvalidFile");exit();
            }
        } else {header("Location: ../index.php?errorphpfile");exit();
        }
        header("Location: ../index.php");exit();
    }
?>