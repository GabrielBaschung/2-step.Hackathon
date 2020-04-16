<?php
// ------------------- CONTROLLER -------------------
session_start(); // Start einer neuen, oder Weiterführung einer bestehenden Session
// Alle Site-relevanten Werte (base-url, DB-Einstellungen) sind in config.php zentral gespeichert.
require_once('system/config.php');
// Alle DB-Abfragen sind in data.php zusammengefasst.
require_once('system/data.php');
// Die Verwaltung der Session erledigen wir hier nicht über eine externe Datei, sondern direkt im Controller
// Wir prüfen, ob es eine Session-Variable $_SESSION['userid'] gibt.
if(isset($_SESSION['userid'])) {
  // Falls es eine solche Variable gibt, zerstören wir sie...
  unset($_SESSION['userid']);
  // ... und beenden gleich darauf die Session.
  // Ergebnis: Der User ist ausgeloggt.
  session_destroy();
}

$logged_in = false;
$log_in_out_text = "Anmelden";

//Wenn der Loginknopf gedrückt wird, werden die Logindaten als korrekt angesehen.
if(isset($_POST['login_button'])){
  $logindaten_korrekt = true;
  $msg = "";
  //Überprüfung des E-Mailfeldes, wenn es nicht leer ist, geht es weiter und die E-Mailadresse wird in der Variable $email gespeichert
  if(!empty($_POST['email'])){
    $email = $_POST['email'];
  }else{
    $msg .= "Bitte geben Sie eine E-Mailadresse  ein.";
    $logindaten_korrekt = false;
  }
  //Überprüfung des Passwortfeldes, wenn es nicht leer ist, geht es weiter und das Passwort wird in der Variable $password gespeichert
  if(!empty($_POST['password'])){
    $password = $_POST['password'];
  }else{
    $msg .= "Bitte geben Sie ein Passwort ein.<br>";
    $logindaten_korrekt = false;
  }
  //Wenn nun die Logindaten immer noch korrekt sind, wird die Funktion login ausgeführt, die unter system/data.php ist
  if($logindaten_korrekt){
    $user = login($email , $password);
    if($user){
          $_SESSION['userid'] = $user['id'];
          header('Location: index.php');
      exit;
    }else{
      $msg = "Sie haben wohl einen Fehler gemacht.";
    }
  }
}

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
      <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Anmelden</h1>
      <p style="text-align: center;">Bitte melde dich an!</p>
      <div style="margin-left: 32vw; margin-right: 32vw;">
      <div class="form-style-5">
        <form action="<?php echo $_SERVER['PHP_SELF']; // $_SERVER['PHP_SELF'] gibt die Adresse der aktuellen Datei aus ?>" method="post">
            <fieldset>
            <legend><span class="number">1</span> Persönliche Informationen</legend>
            <input type="email" name="email" id="id_email" placeholder="Your Email *">
            <input type="password" name="password" id="id_password" placeholder="Your Password *">
            </fieldset>
          <input type="submit" name="login_button" value="Anmelden" />
        </form>
      </div>
    </div>
<!-- Nachricht, falls ein Fehler auftaucht (Mail/PW falsch oder Benutzer nicht vorhanden) -->
<?php include_once('templates/msg.php') ?>
    </section>
  </div>
</body>
</html>
