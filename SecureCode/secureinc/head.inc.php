</header>
  <main>
    
    <section>
      <div class="signup">
      <h1>SignUp</h1><br>
      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "invalidmailuid") {
          echo '<p class="signuperror"> Invalid Username and Email</p>';
        }
        else if ($_GET['error'] == "invalidmail") {
          echo '<p class="signuperror"> Invalid Email</p>';
        }
        else if ($_GET['error'] == "invaliduid") {
          echo '<p class="signuperror"> Invalid Username</p>';
        }
        else if ($_GET['error'] == "emailtaken") {
          echo '<p class="signuperror"> Email Is Taken</p>';
        }
        else if ($_GET['error'] == "passwordcheck") {
          echo '<p class="signuperror"> Password did not match!</p>';
        }
        else if ($_GET['error'] == "usertaken") {
          echo '<p class="signuperror"> Username Is Taken</p>';
        }
        elseif ($_GET['signup'] == "success") {
          echo '<p class="signupsuccess"> Signup Successful!</p>';
        }
      }
      ?>
      <br>
        <form action="secureinc/signup.inc.php" method="post" autocomplete="off">
          <input type="text" name="uid" placeholder="Username"required="required" >
          <input type="text" name="mail" placeholder="E-mail" required="required">
          <input type="password" name="pwd" placeholder="Password" required="required">
          <input type="password" name="pwd-repeat" placeholder="Confirm Password" required="required">
          <button type="submit" class="btn btn-primary btn-block btn-large" name="signup-submit">SignUp</button>
        </form>
      </div>
    </section>
  </main>