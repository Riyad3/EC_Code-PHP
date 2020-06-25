<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
***************************/
if(isset($_POST['Valider'])){
  registration();
}
function registration() {

  // On verifie d'abord qu'on reçoit des données via le formulaire 
  if(!empty($_POST)){
    extract($_POST);
    $valid = true;

  // On attribut les valeur recuperer dans le form
    if(isset($_POST['Valider'])){
      $mail = $_POST['email'];
      $password = $_POST['password'];
      $conf_password = $_POST['password_confirm'];

      if(empty($mail)){
        $valid = false;
        $er_mail = "Le mail ne peut pas être vide";
      }
      elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)){
        $valid = false;
        $er_mail = "Le mail n'est pas valide";
      }
    }
    if(empty($password)) {
      $valid = false;
      $er_mdp = "Le mot de passe ne peut pas être vide";
       }
       elseif($password != $conf_password)
       {
         $valid = false;
         $er_mdp = "La confirmation du mot de passe ne correspond pas";
    }
    if($valid){
      $password = hash('sha256', $password);
      $conf_password = $password;
      $new_user = new User();
      $new_user->setEmail($mail);
      $new_user->setPassword($password);
      $new_user->createUser();
  
      }
    }
  }



