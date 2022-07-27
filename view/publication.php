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
        <link rel="stylesheet" href="../style/main.css">
<style>
    textarea {
        resize: none;
    }
</style>
    <title>My Movies - Publication</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php" alt="My Movies"><i class="bi bi-film"></i> My Movies </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="../index.php">Home</a>
                        <a class="nav-link active" href="./publication.php">Publier </a>
                        <a class="nav-link" href="./bibliotheque.php">Bibliothèque </a>

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
       <form class="container-fluid w-50"  method="post" action="../function/create.php" required>

                <label for="title" class="form-label"> Le titre du film * </label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Le titre du film" required>

                <label for="description" class="form-label">Scénario du film</label>
                <textarea rows="10" name="description" id="description" class="form-control"
                    placeholder="Le scénario du film" ></textarea>

                <label for="release_date" class="form-label"> Date de sortie *</label>
                <input type="date" name="release_date" id="release_date" class="form-control" required>

                <label for="image_url" class="form-label"> Affiche du film </label>
                <input type="url" name="image_url" id="image_url" class="form-control" placeholder="Choisir l'image">

                <label for="director" class="form-label"> Le réalisateur </label>
                <input type="text" name="director" id="director" class="form-control" placeholder="Le réalisateur">

           
                <label for="category_id" class="form-label"> Catégorie du film *</label>

               <select class="form-select" name="category_id" id="category_id" required>
                <option selected  disabled value="" >Choisissez une categorie </option>

                <?php 
                require_once "../Controller/CategoryController.php";
                require_once "../entity/Category.php";

                $categoryController = new CategoryController();
                $categories = $categoryController->getAll();


                foreach ($categories as $category) : 
                ?>
                <option value="<?= $category->getId() ?>" > <?= $category->getName() ?> </option>
                <?php endforeach ?>
               </select>
    

            <div class="submit-btn">
                <input type="submit"  value="Publier" class=" btn btn-primary mt-3">

            </div>
        </form>

    </main>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

</body>

</html>