<?php
if (isset($_POST['login-submit'])){
    
    require 'dbh.inc.php';
    require 'ran.inc.php';
    
    $rndNS = rnd(25,true,true,true);
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM user WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlerror");
        exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){
                   
                    function sessionStart($lifetime,$path,$domain,$secure,$httpOnly){
                        session_set_cookie_params($lifetime,$path,$domain,$secure,$httpOnly);
                        session_start();
                    }
                    sessionStart(600,'/','localhost',true,true);
                    $_SESSION['userId'] = $rndNS;

                    header("Location: ../index.php");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit();
}