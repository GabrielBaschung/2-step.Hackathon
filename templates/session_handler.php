<?php
if(isset($_SESSION['verification'])){
  $verification = get_user_by_id($_SESSION['verification']);
  $user_id_ver = $verification['id'];
  $logged_in = false;
  $log_in_out_text = "Anmelden";
}else if(isset($_SESSION['userid'])){
  $user = get_user_by_id($_SESSION['userid']);
  $user_id = $user['id'];
  $logged_in = true;
  $log_in_out_text = "Logout";
}else{
  $logged_in = false;
  $log_in_out_text = "Anmelden";
}
?>
