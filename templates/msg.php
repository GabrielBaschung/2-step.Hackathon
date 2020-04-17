
<!-- Wenn richtig angemeldet, wird diese Nachricht angezeigt -> evtl in Footer einbinden? -->
<?php if(isset($user_id)){ ?>
  <div style="background-color: #2D2D2D; width: 30vw; display: table; margin: auto; height: 5vw; border-radius: 20px; margin-top: 30vh;">
    <p style="text-align: center; padding-top: 31px; font-size: 1.5rem; font-family: 'Roboto', sans-serif; color: white;"> Eingeloggt als <?php echo $user['firstname'] . " " . $user['lastname'];?> </p>
  </div>
<?php } ?>

<!-- Falls was nicht klappt oder so, wird diese Nachricht ausgegeben -->
  <?php if(isset($msg)){ ?>
    <div style="background-color: #F31431; width: 30vw; display: table; margin: auto; border-radius: 20px;" >
      <p style="text-align: center; vertical-align: middle; font-size: 1rem; font-family: 'Roboto', sans-serif; color: white;"> <?php echo $msg;?> </p>
    </div>
  <?php } ?>
