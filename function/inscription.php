<?php 

require_once "../Controller/UserController.php";

$user = new UserController();

if (empty($_POST['emailLog']) || empty($_POST['password'])|| empty($_POST['username']) )
{

    echo 'Il y a eu une erreur';
    var_dump($_POST);

} else {


$email = $_POST['emailLog'];
$password  = password_hash(($_POST['password']), PASSWORD_BCRYPT);
$username = $_POST['username'];

if ($user->alreadyExists($email)) {
    echo " L'utilisateur existe déjà ";
} else {
    session_start();
    $user->create($email,$password,$username);
    $user->isConnected($_POST['emailLog'],$_POST['password'],$_POST['username']);
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["email"] = $_POST["email"];
    header('Location: ../index.php');
   exit();
   
}

}



 ?>