<?php
  require "header.php";
?>


  <main>
    <div >
      <section>
      <?php
      $access = 'my_value';
      if (isset($_SESSION['userId'])) {
        require "secureinc/SecureCode.php";
        
      }
      else {
        require "secureinc/login.int.php";
      }
      ?>
      </section>
    </div>
  </main>
</body>
<?php
  require "footer.php";
?>