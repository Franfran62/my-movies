
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
    <title>My Movies ! - Inscription </title>
</head>
<body>

<?php require "../html-partial/header.php";

if ($_POST) {
  // Validate password strength
  $uppercase = preg_match('@[A-Z]@', $_POST['password']);
  $lowercase = preg_match('@[a-z]@', $_POST['password']);
  $number    = preg_match('@[0-9]@', $_POST['password']);
  $specialChars = preg_match('@[^\w]@', $_POST['password']);

  if(strlen($_POST['username']) < 20) 
  {
     echo "Votre nom d'utilisateur est trop long";

  } else {
  
  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
      echo 'Votre mot de passe doit contenir au minimum 8 caractères, 1 chiffre, 1 majuscule et 1 caractère spécial.';
  } else { 
      echo '<form id="myForm" action="../function/inscription.php" method="post">';
      foreach ($_POST as $input=> $data) {
      echo '<input type="hidden" name="'.$input.'" value="'.$data.'">';
          }  
      } } }
       ?>

<main >

<div class="container d-flex  vh-100 ">
    <div class="d-flex align-items-center justify-content-center bg-light mx-auto my-auto rounded-4 shadow-lg p-3 ">

    <form method="post">
    <div class="mb-3">
    <label for="username" class="form-label"> Choisissez un pseudo </label>
    <input type="text" class="form-control border border-primary" id="username" name="username" value="<?= !empty($_POST['username']) ? $_POST['username'] : "" ?>" placeholder="Franfran62"  required>
  </div>

  <div class="mb-3">
    <label for="emailLog" class="form-label">Entrez votre adresse e-mail </label>
    <input type="email" class="form-control border border-primary" id="emailLog" name="emailLog" value="<?= !empty($_POST['emailLog']) ? $_POST['emailLog'] : "" ?>" placeholder="bonjour@gmail.com"  required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Votre mot de passe</label>
    <input type="password" class="form-control border border-primary" minlengh="8" id="passwordLog" name="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : "" ?>"  required>
    <div id="passwordHelp" class="form-text fst-italic ">Nous vous conseillons d'utiliser une majuscule, un chiffre et un caractère spécial</div>
  </div>

  <button type="submit" class="btn btn-primary mt-3"> Créer un compte </button>

</form>



    </div>
</div>

</main>
<script type="text/javascript">
        document.getElementById('myForm').submit();
    </script>
</body>

</html>