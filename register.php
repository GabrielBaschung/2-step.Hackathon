<?php
// ------------------- CONTROLLER -------------------
// Die Initialisierung der Sessiou und das Laden der benötigten Dateien läuft
//   analog zu login.php ab.
session_start();
require_once('system/config.php');
require_once('system/data.php');


?>
<!DOCTYPE html>
<html>
<head>
<?php
  include_once('templates/page_head.php');
?>
</head>
<body>
  <div>
    <?php include_once('templates/menu.php') ?>
    <section>
      <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Registrieren</h1>
      <p style="text-align: center;">Bitte registriere dich!</p>

      <div style="margin-left: 32vw; margin-right: 32vw;">
      <div class="form-style-5">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <fieldset>
            <legend><span class="number">1</span> Persönliche Informationen</legend>
              <input type="email" name="email" id="id_email" value="" placeholder="Your Email *">
              <input type="text" name="field1" id="id_firstname" value="" placeholder="Your Firstname *">
              <input type="text" name="field1" id="id_lastname" value="" placeholder="Your Lastname *">
              <input type="password" name="password" id="id_password" placeholder="Your Password *">
              <input type="password" name="password_confirm" id="id_password_confirm" placeholder="Confirm Your Password *">
            </fieldset>
            <input type="submit" name="register_submit" value="Registrieren" />
        </form>
      </div>
    </div>
    </section>
  </div>
</body>
</html>
