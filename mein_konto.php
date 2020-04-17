<?php session_start();
require_once('system/config.php');
require_once('system/data.php');
require_once('templates/session_handler.php');

$id = $user['id'];
$edit_valid = true;

if(!empty($_POST['email'])){
  $email = $_POST['email'];
}else{
  $msg .= "Bitte geben Sie eine E-Mail an.";
  $edit_valid = false;
}

if(!empty($_POST['firstname'])){
  $firstname = $_POST['firstname'];
}else{
  $msg .= "Bitte geben Sie Ihren Vornamen an.";
  $edit_valid = false;
}

if(!empty($_POST['lastname'])){
  $lastname = $_POST['lastname'];
}else{
  $msg .= "Bitte geben Sie Ihren Nachnamen an.";
  $edit_valid = false;
}

if($edit_valid){
  if($logged_in){
    $result = edit_data($email, $firstname, $lastname);
    if($result){
      $msg .= "Sie haben Ihre persönlichen Informationen erfolgreich editiert.";
      header('Location: mein_konto.php');
    }else{
      $msg .= "Es ist ein Fehler aufgetreten.";
    }
  }else{
    $msg .= "Sie haben nicht die erforderlichen Berechtigungen um diese Informationen zu bearbeiten.";
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
      <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Mein Konto</h1>
      <p style="text-align: center;">Dies sind Ihre persönlichen Informationen, wenn Sie sie ändern möchten, drücken Sie bitte auf den Button.</p>
      <div style="margin-left: 32vw; margin-right: 32vw;">
      <div class="form-style-5">
        <fieldset>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <legend><span class="number">1</span> Persönliche Informationen</legend>
          <p>E-Mail:</p> <input type="email" name="email" id="email" value=" <?php echo $user['email'];?>">
          <p>Vorname:</p> <input type="text" name="firstname" id="firstname" value="<?php echo $user['firstname'];?>">
          <p>Nachname:</p> <input type="text" name="lastname" id="lastname" value="<?php echo $user['lastname'];?>">
        </fieldset>
            <input type="submit" name="edit_button" value="Bearbeitungen speichern" />
        </form>
      </div>
    </div>
    </section>
  </div>
</body>
</html>
