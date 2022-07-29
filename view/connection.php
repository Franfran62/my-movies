<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Main.css-->
    <link rel="stylesheet" href="../style/look.css">
    <title>My Movies ! - Connection </title>
</head>
<body>

<?php require "../html-partial/header.php"; ?>

<main >

<div class="container d-flex  vh-100 ">
    <div class="d-flex align-items-center justify-content-center bg-light mx-auto my-auto rounded-4 shadow-lg p-3 ">

    <form method="post" action="../function/login.php">

  <div class="mb-3">
    <label for="emailLog" class="form-label">Entrez votre adresse e-mail </label>
    <input type="email" class="form-control border border-primary" id="emailLog" name="emailLog" placeholder="bonjour@gmail.com"  required>
  </div>
  <div class="mb-3">
    <label for="passwordLog" class="form-label">Votre mot de passe</label>
    <input type="password" class="form-control border border-primary" id="passwordLog" name="password"  required>
  </div>

  <button type="submit" class="btn btn-primary mt-3"> Se connecter </button>

</form>

<!-- <a href="./signUp.php"> S'inscrire </button></a> !-->

    </div>
</div>

</main>

</body>

</html>