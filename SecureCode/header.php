<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SecureCode</title>
    <?php header('X-Frame-Options: DENY' ); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="secureimg/favicon.ico?" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="securecss/stylesheet.css">
    <script type="text/javascript" src="securejs/tab.js"></script>
</head>
<body>

    <header>
        <nav>

            <div class="flex-container">
                <h1 class="logo"><a href="index.php">SECURE >/< Code</a></h1>
                <ul class="navigation">
                    <li><a href="index.php">Home</a></li>
                    
                    <?php
                    if (isset($_SESSION['userId'])) 
                    {
                        echo '<li><a href="secureinc/logout.inc.php">Logout</a></li>';
                    }
                    else 
                    {
                        echo '<li><a href="signup.php">SignUp</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>