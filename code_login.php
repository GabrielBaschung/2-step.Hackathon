<?php
session_start();
require_once('system/config.php');
require_once('system/data.php');
require_once('templates/session_handler.php');
$email = $verification['email'];
$password = $verification['password'];

if(isset($_SESSION['random'])){
  if(!empty($_GET['code'])){
    $eingegebener_code = $_GET['code'];
    if($eingegebener_code == $_SESSION['random']){
      if(isset($_SESSION['verification'])){
        $user = login($email, $password);
        unset($_SESSION['random']);
        unset($_SESSION['verification']);
        session_destroy();
        session_start();
        $_SESSION['userid'] = $user['id'];
        header('Location: index.php');
        exit;
      }else{
        $msg .= "Es ist ein Fehler aufgetreten.";
        $verifizierung_korrekt = false;
      }
    }else{
      $msg .= "Der Code ist nicht korrekt.";
      $verifizierung_korrekt = false;
    }
  }
  if(isset($_POST['verifizierungs_button'])){
    $verifizierung_korrekt = true;
    $msg = "";
    //Überprüfung ob der eingegebene Code mit dem Zufallscode übereinstimmt
    if(!empty($_POST['code'])){
      $eingegebener_code = $_POST['code'];
      if($eingegebener_code == $_SESSION['random']){
        if(isset($_SESSION['verification'])){
          $user = login($email, $password);
          unset($_SESSION['random']);
          unset($_SESSION['verification']);
          session_destroy();
          session_start();
          $_SESSION['userid'] = $user['id'];
          header('Location: index.php');
          exit;
        }else{
          $msg .= "Es ist ein Fehler aufgetreten.";
          $verifizierung_korrekt = false;
        }
      }else{
        $msg .= "Der Code ist nicht korrekt.";
        $verifizierung_korrekt = false;
      }
    }
  }
} else{
  $zufall_1 = mt_rand(0,9);
  $zufall_2 = mt_rand(0,9);
  $zufall_3 = mt_rand(0,9);
  $zufall_4 = mt_rand(0,9);
  $zufall_5 = mt_rand(0,9);
  $zufall_6 = mt_rand(0,9);

  $zufallszahl = $zufall_1.$zufall_2.$zufall_3.$zufall_4.$zufall_5.$zufall_6;
  $_SESSION['random'] = $zufallszahl;
  $mailtext = '<html>
  <head>
      <title>Verifizierungscode 2-Step</title>

  </head>
  <body>
  <div style="background-color: rgb(45, 45, 45); height: 15vh; margin-left: 20vw; margin-right: 20vw;">
    <a style="margin-left: 13.15vw; text-align: center; color: white; text-decoration: none; text-transform: uppercase; font-weight: 700; font-size: 7vh;" href=' . $base_url . ' ">2-Step</a>
  </div>
      <h1 style="text-align: center; font-size: 2rem; text-transform: uppercase; font-weight: 100;">Dein Code: ' . $zufallszahl . '</h1>
      <div>
        <div style="margin-left: 35vw; margin-right: 35vw; background-color: rgb(45, 45, 45)" height: 10vh; width: 10vw; justify-content: center;">
          <a style="border-radius: 20px; text-align: center; color: white; text-decoration: none; text-transform: uppercase; font-weight: 300; font-size: 1rem; display: table; margin: auto; border-radius: 20px;" href="' . $base_url. 'code_login.php?code=' . $zufallszahl . ' ">Verifizieren</a>
        </div>
      </div>
      <p style="color: rgb(45, 45, 45); text-align: center; margin-left: 20vw; margin-right: 20vw;">Dieser Code ist nur in deiner aktuellen Session gültig, falls Sie die Seite neu laden, erhalten Sie einen neuen Code. <br>



Falls Sie nicht wissen sollten, warum Sie diese E-Mail erhalten haben oder diese nicht erwartet haben sollten, dann können Sie unserem Support-Team verdächtiges Verhalten jederzeit melden.</p>
  </body>
  </html>
  ';

  $absender   = "hendschne@gmx.ch";
  $betreff    = "Ihr Verifizierungscode";

  $header  = "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html; charset=utf-8\r\n";

  $header .= "From: $absender\r\n";
  $header .= "Reply-To: $antwortan\r\n";
  // $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
  $header .= "X-Mailer: PHP ". phpversion();

  mail( $email,
        $betreff,
        $mailtext,
        $header);
}
?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">

<!DOCTYPE html>
<html>
<head>

  <?php
    require_once('templates/page_head.php'); // Inhalt des <head>-Elements aus externer PHP-Datei
  ?>

</head>
<body>
  <!-- Navigation -->
  <?php require_once('templates/menu.php'); // Navigation aus externer PHP-Datei ?>
  <section>
    <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Verifizieren</h1>
    <p style="text-align: center;">Bitte gib deinen Verifizierungscode ein!</p>
    <div style="margin-left: 32vw; margin-right: 32vw;">
    <div class="form-style-5">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <fieldset>
          <legend><span class="number">1</span> Dieser Code wurde dir per Mail zugestellt</legend>
          <input type="text" name="code" id="code" placeholder="Your Code *">
          </fieldset>
        <input type="submit" name="verifizierungs_button" value="Anmelden" />
      </form>
    </div>
  </div>
<!-- Nachricht, falls ein Fehler auftaucht (Code falsch) -->
<?php include_once('templates/msg.php') ?>
  </section>
  </div>
</body>
</html>
