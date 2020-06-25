<?php ob_start(); 
  require_once( 'model/user.php' );


  $user = $_SESSION['user_id'];
  
  $user_data = User::getUserById($user);
  
  //var_dump($user_data);
  $user_mail = $user_data["email"];

  echo $user_mail;
?>



<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>

