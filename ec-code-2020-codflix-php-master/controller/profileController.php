<?php

require_once( 'model/user.php' );
require_once( 'loginController.php' );

function profile() {
    
    $user = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

    if($user){
        $user_id = User::getUserById($user);
        if(isset($_POST['update']) || isset($_POST['change_email']) ){
            updateAccount();
        }
        elseif(isset($_POST['delete'])){
            deleteAccount();

        }
        require_once('view/profileView.php');


    }else{
        require_once('view/homeView.php');
    }
}
function updateAccount() {

    $user_id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $new_password = $_POST['new_password'];
    $password_confirm = $_POST['new_password_confirm'];

    $user = new User();
    $userData = $user->getUserById($user_id); 

    if ($password != $userData['password'])
    {
        $error_msg = "Le mot de passe actuel est erroné.";
    }
    elseif (isset($_POST['change_email']))
    {
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email))
        {
            $error_msg = "Format de mail non valide.";
        }
        else
        {
            $user->setId($user_id);
            $user->setEmail($email);

            $userData = $user->getUserByEmail();

            if ($userData && sizeof( $userData ) > 0)
            {
                $error_msg = "Cette adresse mail est déjà utilisée.";
            }
            else
            {
                $user->updateMail();
                $success_msg = "Vos informations ont été modifiées avec succès.";
            }    
        }
    }
    elseif (isset($_POST['change_password']))
    {
        if (strlen($new_password) < 6)
        {
            $error_msg = "Nouveau mot de passe incorrect. Min. 6 caractères.";
        }
        elseif ($new_password != $password_confirm)
        {
            $error_msg = "Les nouveaux mots de passe ne correspondent pas.";
        }
        else
        {
            $user->setId($user_id);
            $user->setPassword($new_password);

            $user->updatePassword();
            $success_msg = "Vos informations ont été modifiées avec succès.";     
        }
    }

    require('view/profileView.php');
}

function deleteAccount(){

    $user_id = $_SESSION['user_id'];
    $password = hash('sha256', $_POST['password']);

    $user = new User();
    $userData = $user->getUserById($user_id); // Get the current user's data in order to compare the inputs with the current data.

    // The current password is required to save new data.
    if ($password != $userData['password']) {
        $error_msg = "Le mot de passe actuel est erroné.";
    }
    else{
        // var_dump("ÊTES VOUS SUR DE VOULOIR SUPPRIMER VOTRE COMPTE ? CETTE ACTION EST IRREVERSIBLE !");
        // Afficher une modal de confirmation ? => bootstrap
        $user->setId($user_id);
        $user->deleteUser();
        logOut(); // Logging out the current user once the account has been successfully deleted.
    }

        require('view/profileView.php');
    }
