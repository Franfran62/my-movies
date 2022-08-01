
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

    <link rel="stylesheet" href="./style/look.css">

    <title>My Movies !</title>

</head>

<body>

<?php 
require "./Controller/testDebug.php";
$test = new Test(); 

$test->sayHello();

session_start();
require "./html-partial/header.php"; 

?>

    <h1 class="mt-3"> Bienvenue sur My Movies </h1>
    <h3>Découvre ici ta bibliothèque personnelle</h3>
    <img class ="logo" src="./images/logo.png" alt="Logo My Movie">


</body>
</html>




