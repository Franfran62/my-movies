<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://projet-my-movies-php.herokuapp.com">
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
                        <a class="nav-link" href="https://projet-my-movies-php.herokuapp.com">Home</a>
                    </li>

                   <?= !empty($_SESSION["username"]) ? "<li class='nav-item '>
                   <a class='nav-link' href='https://projet-my-movies-php.herokuapp.com/view/publication.php'> Publier </a>
                   </li>" : "" ?>

                    <?= !empty($_SESSION["username"]) ? "<li class='nav-item '>
                   <a class='nav-link' href='https://projet-my-movies-php.herokuapp.com/view/bibliotheque.php'> Ma bibliothèque </a>
                   </li>" : "" ?>
                </ul>

                <ul class="navbar-nav ms-auto">

                <?= !empty($_SESSION["username"]) ? "<li class='nav-item nav-link active'> Bonjour {$_SESSION["username"]} !</li>" : "" ?>
                <li class="nav-item">
                    <?=
                     !empty($_SESSION) ? '<a class="nav-link active" href="https://projet-my-movies-php.herokuapp.com/function/disconnect.php"> Se déconnecter</a>' :
                    '<a class="nav-link" href="https://projet-my-movies-php.herokuapp.com/view/connection.php">Se connecter</a>'
                     ?>
                </li>
                <li class="nav-item">
                     <?=
                     !empty($_SESSION) ? '' :
                    '<a class="nav-link" href="https://projet-my-movies-php.herokuapp.com/view/inscription.php">Inscription </a>'
                     ?>
                </li>


                </ul>
            </div>
        </div>
    </nav>
</header>
