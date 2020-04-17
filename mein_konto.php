<?php session_start();
require_once('system/config.php');
require_once('system/data.php');
require_once('templates/session_handler.php');

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

<!-- Anmeldeformular -->
    <section>
      <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Mein Konto</h1>
      <p style="text-align: center;">Dies sind Ihre persönlichen Informationen, wenn Sie sie ändern möchten, drücken Sie bitte auf den Button.</p>
      <div style="margin-left: 32vw; margin-right: 32vw;">
      <div class="form-style-5">
            <fieldset>
            <legend><span class="number">1</span> Persönliche Informationen</legend>
              <p>Vorname: <?php echo $user['firstname']?></p>
              <p>Nachname: <?php echo $user['lastname']?> </p>
              <p>Mailadresse: <?php echo $user['email']?></p>
              <p>Dabei seit: <?php echo $user['register_time']?></p>
              <p type="password" >Passwort: Aus Sicherheitsgründen wir das Passwort hier nicht angezeigt.</p>
            </fieldset>
            <input type="submit" name="edit_button" value="Bearbeiten" />
      </div>
    </div>
<!-- Nachricht, falls ein Fehler auftaucht (Mail/PW falsch oder Benutzer nicht vorhanden) -->
<?php include_once('templates/msg.php') ?>
    </section>
  </div>
</body>
</html>
