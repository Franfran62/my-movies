<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Main.css-->
    <link rel="stylesheet" href="../style/look.css">

    <title>My Movies - Bibliothèque</title>
</head>

<?php

require_once "../Controller/MovieController.php";
require_once "../Controller/CategoryController.php";
require_once "../Controller/UserController.php";
require_once "../entity/Movie.php";
require_once "../entity/Category.php";
session_start();
require "../html-partial/header.php";


$MovieController = new MovieController();
$categoryController = new CategoryController();
$user = new UserController();

$user_id = $user->getIdFromEmail($_SESSION['email']);

if ($user_id ===false) {
  echo "Utilisateur introuvable"; 
} else {
$movies = $MovieController->getAll($user_id);


?>


<body>

    <main>


    <section class="container d-flex justify-content-center mt-3">
        <?php
        foreach ($movies as $movie) :
            $modalId = $movie->getId();
            $category = $categoryController->get($movie->getCategory_id())
            ?>
            <div class="card mx-3" style="width: 18rem;">
                <img src="<?= $movie->getImage_url() ?>" class="card-img-top" alt="<?= $movie->getTitle() ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie->getTitle() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                        <?= substr($movie->getDescription(),0,100) ?>
                        ...
                        <!-- Button trigger modal -->
                        <button id="myBtn" class = "btn btn-primary outline" 
                        data-bs-toggle="modal" data-bs-target="#Modal<?= $modalId?>" >Read more</button>

<!-- Modal -->
<div class="modal fade" id="Modal<?= $modalId?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?= $movie->getTitle() ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card mx-auto" style="width: 18rem;">
            <img src="<?= $movie->getImage_url() ?>" class="card-img-top" alt="<?= $movie->getTitle() ?>">
      </div>
        <div class="card-title">
            <h2> <?= $movie->getTitle(); ?> </h2>
        </div>
        <h6 class="card-subtitle mb-2 text-muted">
        <?= $movie->getRelease_date() ?> <?= $movie->getDirector() ?>
        </h6>
        <div class="card-text">
           <?= $movie->getDescription() ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                    </p>
                    <footer class="blockquote-footer" style="color: <?= $category->getColor() ?>"><?= $category->getName() ?></footer>
                    <a href="./modification.php?id=<?=$movie->getId() ?>" class="btn btn-warning" > <i class="bi bi-pencil-square"></i></a>
                    <a href="../function/delete.php?id=<?= $movie->getId() ?>" class="btn btn-danger"> <i class="bi bi-trash3"></i> </a>
                </div>
            </div>

        <?php endforeach; } ?>
</section>



    </main>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>


</body>

</html>