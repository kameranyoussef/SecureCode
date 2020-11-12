<div class="login">
    <h1>Login</h1>
    <br>
    <?php
        session_start();
        $token= md5(uniqid());
        $_SESSION['user_login_token']= $token;
        session_write_close();

        if (isset($_GET['error'])) {
          if ($_GET['error'] == "nouser") {
            echo '<p class="signuperror"> Invalied Username</p>';
          }
          else if ($_GET['error'] == "wrongpwd") {
            echo '<p class="signuperror"> Invalied Password</p>';
          }
    
        }
        if (isset($_SESSION['userId'])) {
          echo '
          <form action="secureinc/logout.inc.php" method="post">
            <button type="submit" class="btn btn-primary btn-block btn-large" name="logout-submit">Logout</button>
          </form>
          ';
        }
        else if (!isset($_SESSION['userId'])) {
          echo '
          <form action="secureinc/login.inc.php" method="post" autocomplete="off">
            <input type="text" name="mailuid" placeholder="Username...." required="required">
            <input type="password" name="pwd" placeholder="Password...." required="required">
            <button type="submit" class="btn btn-primary btn-block btn-large" name="login-submit">Login</button>
          </form>
          ';
        }


    ?>   
</div> 