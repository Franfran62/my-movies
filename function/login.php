<?php 

echo 'ici ca va'; 

echo __DIR__;

require_once __DIR__."/../app/Controller/UserController.php";

echo '1'; 

// $user = new UserController();

echo '2'; 


if (empty($_POST['emailLog']) || empty($_POST['password']))
{
    echo '3'; 
 echo 'Il y a eu une erreur';


} else {
    echo '4'; 
 $user->isConnected($_POST['emailLog'],$_POST['password']);
 echo '5'; 

// header('Location: https://projet-my-movies-php.herokuapp.com ');
// echo '6'; 
// exit();

echo "Personne n'est censé me voir"; 

}


 ?>