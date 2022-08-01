<?php

session_start();
session_destroy();

header('Location: https://projet-my-movies-php.herokuapp.com/index.php');
exit();



