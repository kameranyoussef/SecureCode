    <div class="accordion">
        <button class="accordion">Test Files</button>
        <div class="panel">
            <p>Tested Files Below: </p>
            <?php
                $directoryx = "secureinc/uploads/";
                $phpfilesx = glob($directoryx . "*.txt");
                $num=1;
				
                foreach($phpfilesx as $phpfilex)
                { 
                    $strx=$phpfilex; //dirc link 
                    $tmp =(explode("/",$strx));
                    $file_extension = end($tmp);
                    $sx = $file_extension;
                    $ex = explode(".", $sx );
                    $withoutExtx = preg_replace('/\\.[^.\\s]{3,4}$/', '', $sx);
                    $phpfilesnx = glob($directoryx . "*.txt");
                    echo "<a "."target=_blank"." href=$phpfilex>"."<p>".$num++."_TestedFile(ClickHere)!</p></a><br>"; 
                } 
            ?>
        </div>

        <button class="accordion">Files outcome</button>
        <div class="panel">
            <p>The Result Outcome of The Test: </p>
            <?php
                $directoryx = "secureinc/reports/";
                $phpfilesx = glob($directoryx . "*.txt");
                $num=1;
                foreach($phpfilesx as $phpfilex)
                { 
                    $strx=$phpfilex; //dirc link 
                    $tmp =(explode("/",$strx));
                    $file_extension = end($tmp);
                    $sx = $file_extension;
                    $ex = explode(".", $sx );
                    $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $sx);
                    $phpfilesnx = glob($directoryx . "*.txt");
                    echo "<a "."target=_blank"." href=$phpfilex>"."<p>".$num++."_ResualtOutcomeFile(ClickHere)!</p></a><br>"; 
                } 
            ?>
        </div>
    </div>

<script type="text/javascript" src="securejs/accorn.js"></script>