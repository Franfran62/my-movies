<?php

require_once "../Controller/MovieController.php";

$movieController = new MovieController();
$movieController->delete($_GET['id']);

// echo "<script>window.location='../index.php'</script>";

header('Location: https://projet-my-movies-php.herokuapp.com/view/bibliotheque.php');
exit();

