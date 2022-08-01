<?php 

require_once "../Controller/MovieController.php";
$movie = new MovieController();

$title = htmlspecialchars($_POST['title']);
$description  = htmlspecialchars($_POST['description']);
$release_date = htmlspecialchars($_POST['release_date']);
$image_url = htmlspecialchars($_POST['image_url']);
$director = htmlspecialchars($_POST['director']);
$category_id = htmlspecialchars($_POST['category_id']);
$id = htmlspecialchars($_GET['id']);

$movie->update($title, $description, $release_date, $image_url, $director, $category_id, $id);

header('Location: ../view/bibliotheque.php');
exit();
