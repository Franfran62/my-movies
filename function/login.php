<?php 
require_once "../Controller/UserController.php";

$user = new UserController();
if (empty($_POST['emailLog']) || empty($_POST['password']))
{

 echo 'Il y a eu une erreur';


} else {
 $user->isConnected($_POST['emailLog'],$_POST['password']);

header('Location: https://projet-my-movies-php.herokuapp.com ');
exit();

echo "Personne n'est censé me voir"; 

}


 ?>