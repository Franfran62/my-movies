<?php

require_once "../Controller/MovieController.php";

$movieController = new MovieController();
$movieController->delete($_GET['id']);

// echo "<script>window.location='../index.php'</script>";

header('Location: ../view/bibliotheque.php');
exit();

