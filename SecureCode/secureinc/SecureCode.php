
<br><br>
<div class="tab w3-container">

    <div class="w3-bar w3-black">
        <button class="btn btn-primary btn-block btn-large w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'uploadfile')">Upload File</button>
        <button class="btn btn-primary btn-block btn-large w3-bar-item w3-button tablink" onclick="openCity(event,'testcode')">Test Code</button>
        <button class="btn btn-primary btn-block btn-large w3-bar-item w3-button tablink" onclick="openCity(event,'uploads')">Uploads</button>
    </div>
    
    <div id="uploadfile" class="w3-container w3-border city">
        <div class="upload">  
            <h2>upload php code file</h2><br>
            <?php
                if(empty($access)) {
                    header("Location: index.php");
                    exit();
                }
                if (isset($_GET['errorfileistoobig'])) {
                    echo '<h3>File Is Too Big</h3><br>';
                } else if (isset($_GET['errorInvalidFile'])) {
                    echo '<h3>File too small</h3><br>';
                } else if (isset($_GET['errorphpfile'])) {
                    echo '<h3>Select/Only PHP File</h3><br>';
                } else if (isset($_GET['errorInvalidtest'])) {
                    echo '<h3>Invalid Test</h3><br>';
                } else if (isset($_GET['success'])) {
                    echo '<div id="file"><h3>File Uploaded Successfully Check Uploads Tab</h3></div><br>';
                }
            ?>

            <form action="secureinc/upload.inc.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file"><br>
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Upload</button>
            </form>
        </div>
    </div>
  
    <div class="uploads-container">
        <div id="testcode" class="w3-container w3-border city" style="display:none">
            <div class="test">
                <h1>insert php code</h1> <br>
                    <?php
                        if(empty($access)) {
                            header("Location: index.php");
                            exit();
                        }
                        else if (isset($_GET['errorcode'])) {
                            echo '<h3>Invalid Input</h3><br>';
                        }
                        else if (isset($_GET['successfulTest'])) {
                            echo '<h4>Code test is complete, Check UPLOADS tab.</h4><br>';
                        }
                    ?>
                <form action="secureinc/tstcode.inc.php" method="POST">
                        <textarea class="codemirror-textarea" name="code-textarea" rows="3" cols="40" placeholder="Insert here..." ></textarea><br>
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Test</button>
                </form>

            </div>
        </div>
    </div>

</div>


<div class="uploads-container">
    <div id="uploads" class="w3-container w3-border city" style="display:none">
        <div class="uploads">  
            <h1>Uploads</h1> <br>
            <h2>Click To View(the latest files are added to the end of the list of each section):</h2><br>
            <?php
            require 'secureinc/files.inc.php'; 
            ?>
			<h2>(After 11 Tests Your Test & Outcome Files  will REST!)</h2><br>
        </div>
    </div>
</div>