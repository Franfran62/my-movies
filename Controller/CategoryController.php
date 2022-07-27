<?php

require_once "../config/dotenv.php";

class CategoryController {

    private PDO $pdo;

    public function __construct() {

        (new DotEnv('../.env'))->load();

        try {
            $this->setPdo(new PDO(getenv('DATABASE_DNS'),getenv('username'), getenv('password')));

        } catch (PDOException $error) {
            echo "Il y a une erreur $error";
        }
    }


    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function getAll() : array
    {
        $categories = [];
        $req =  $this->pdo->query( "SELECT * FROM category");
        $data = $req->fetchAll();
        foreach ($data as $category)
        {
            $categories[] = new Category($category);
        }
        return $categories;

    }

    public function get(int $id): Category
    {
        $req = $this->pdo->prepare("SELECT * FROM `category` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $category = new Category($data);
        return $category;
    }
    
}
