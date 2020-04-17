<?php
session_start();
require_once('system/config.php');
require_once('system/data.php');
if(isset($_SESSION['userid'])) {
  unset($_SESSION['userid']);
  session_destroy();
}
if(isset($_SESSION['verification'])){
  unset($_SESSION['verification']);
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
    $password = md5($_POST['password']);
  }else{
    $msg .= "Bitte geben Sie ein Passwort ein.<br>";
    $logindaten_korrekt = false;
  }
  // Wenn nun die Logindaten immer noch korrekt sind, wird die Funktion login ausgeführt, die unter system/data.php ist
  if($logindaten_korrekt){
    $user = login($email , $password);
    if($user){
        $_SESSION['verification'] = $user['id'];
        header('Location: code_login.php');
        exit;
    }else{
      $msg = "Es ist ein Fehler aufgetreten.";
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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
            <legend><span class="number">1</span> Persönliche Informationen</legend>
            <input type="email" name="email" id="email" placeholder="Your Email *">
            <input type="password" name="password" id="password" placeholder="Your Password *">
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
