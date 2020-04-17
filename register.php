<?php
session_start();
require_once('system/config.php');
require_once('system/data.php');

if(isset($_SESSION['userid'])) {
  unset($_SESSION['userid']);
  session_destroy();
}

$logged_in = false;
$log_in_out_text = "Anmelden";

if(isset($_POST['register_button'])){
  $registrierungsdaten_korrekt = true;
  $msg = "";

  //Mailadresse
  if(!empty($_POST['email'])){
    $email = $_POST['email'];
  }else{
    $msg .= "Bitte geben Sie eine E-Mailadresse ein.";
    $registrierungsdaten_korrekt = false;
  }
  //Vorname
  if(!empty($_POST['firstname'])){
    $firstname = $_POST['firstname'];
  }else{
    $msg .= "Bitte geben Sie Ihren Vornamen ein.";
    $registrierungsdaten_korrekt = false;
  }
  //Nachname
  if(!empty($_POST['lastname'])){
    $lastname = $_POST['lastname'];
  }else{
    $msg .= "Bitte geben Sie Ihren Nachnamen ein.";
    $registrierungsdaten_korrekt = false;
  }
  //Passwort
  if(!empty($_POST['password'])){
    $password = $_POST['password'];
  }else{
    $msg .= "Bitte geben Sie Ihr Passwort ein.";
    $registrierungsdaten_korrekt = false;
  }
  //Passwort bestätigen
  if(!empty($_POST['password_confirm']) AND $_POST['password_confirm'] == $password){
    $password_confirm = $_POST['password_confirm'];
  }else{
    $msg .= "Die Passwörter stimmen nicht überein";
    $registrierungsdaten_korrekt = false;
  }
  if($registrierungsdaten_korrekt){
    //Überprüfen ob die Mailadresse schon vergeben ist
    if(email_vergeben($email)){
      $msg = "Diese Mailadresse ist bereits vergeben.";
    }else{
      $registrieren = register($email, $password, $firstname, $lastname);
      $user = login($email, $password);
      if($registrieren AND $user){
        $_SESSION['userid'] = $user['id'];
        unset($_POST);
        header('Location: index.php');
        exit;
      }else{
        $msg = "Die Registrierung hat leider nicht funktioniert.";
      }
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
    <section>
      <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Registrieren</h1>
      <p style="text-align: center;">Bitte registriere dich!</p>

      <div style="margin-left: 32vw; margin-right: 32vw;">
      <div class="form-style-5">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <fieldset>
            <legend><span class="number">1</span> Persönliche Informationen</legend>
              <input type="email" name="email" id="email" value="" placeholder="Your Email *">
              <input type="text" name="firstname" id="firstname" value="" placeholder="Your Firstname *">
              <input type="text" name="lastname" id="lastname" value="" placeholder="Your Lastname *">
              <input type="password" name="password" id="password" placeholder="Your Password *">
              <input type="password" name="password_confirm" id="id_password_confirm" placeholder="Confirm Your Password *">
            </fieldset>
            <input type="submit" name="register_button" value="Registrieren" />
        </form>
      </div>
    </div>
    <?php include_once('templates/msg.php') ?>
    </section>
  </div>
</body>
</html>
