<?php

require_once "../Controller/MovieController.php";
require_once "../Controller/UserController.php";

// La variable globale $_POST vous donne accès aux données envoyées avec la méthode POST par leur nom
// Pour avoir accès aux données envoyées avec la méthode GET, utilisez $_GET

if (!isset($_POST) || empty($_POST)) {

    echo "Il y a eu une erreur";

} else {

$movie = new MovieController();
$user = new UserController();


    session_start();

    $userId = $user->getIdFromEmail($_SESSION['email']);

    if ($userId === false) {
        echo "Utilisateur introuvable"; 

    } else {
        $title = htmlspecialchars($_POST['title']);
        $description  = htmlspecialchars($_POST['description']);
        $release_date = htmlspecialchars($_POST['release_date']);
        $image_url = htmlspecialchars($_POST['image_url']);
        $director = htmlspecialchars($_POST['director']);
        $category_id = htmlspecialchars($_POST['category_id']);

        $movie->create($title, $description, $release_date, $image_url, $director, $category_id, $userId);
        
        header('Location: ../view/bibliotheque.php');
        exit();
    }
}


?>