<?php


class CategoryController {

    private PDO $pdo;

    public function __construct() {

        try {
            $this->setPdo(new PDO($_ENV['DATABASE_DNS'],$_ENV['username'], $_ENV['password']));
            $this->pdo->query("USE ".$_ENV['database']);
          } catch (PDOException $error) {
              echo "Il y a une erreur ";
              var_dump($error);
      } }



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
