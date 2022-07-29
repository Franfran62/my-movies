<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost:8888/my-movies/index.php">
                <i class="bi bi-film"></i> My Movies </a>
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNavAltMarkup" 
                    aria-controls="navbarNavAltMarkup" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8888/my-movies/index.php">Home</a>
                    </li>

                   <?= !empty($_SESSION["username"]) ? "<li class='nav-item '>
                   <a class='nav-link' href='http://localhost:8888/my-movies/view/publication.php'> Publier </a>
                   </li>" : "" ?>

                    <?= !empty($_SESSION["username"]) ? "<li class='nav-item '>
                   <a class='nav-link' href='http://localhost:8888/my-movies/view/bibliotheque.php'> Ma bibliothèque </a>
                   </li>" : "" ?>
                </ul>

                <ul class="navbar-nav ms-auto">

                <?= !empty($_SESSION["username"]) ? "<li class='nav-item nav-link active'> Bonjour {$_SESSION["username"]} !</li>" : "" ?>
                <li class="nav-item">
                    <?=
                     !empty($_SESSION) ? '<a class="nav-link active" href="http://localhost:8888/my-movies/function/disconnect.php"> Se déconnecter</a>' :
                    '<a class="nav-link" href="http://localhost:8888/my-movies/view/connection.php">Se connecter</a>'
                     ?>
                </li>
                <li class="nav-item">
                     <?=
                     !empty($_SESSION) ? '' :
                    '<a class="nav-link" href="http://localhost:8888/my-movies/view/inscription.php">Inscription </a>'
                     ?>
                </li>


                </ul>
            </div>
        </div>
    </nav>
</header>
