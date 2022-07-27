<?php 

require_once "../config/dotenv.php";

class MovieController {

    
    private PDO $pdo;


    public function __construct() {

       
        (new DotEnv('../.env'))->load();

        try {
            $this->setPdo(new PDO(getenv('DATABASE_DNS'),getenv('username'), getenv('password')));
        } catch (PDOException $error) {
            echo "Il y a une erreur ";
            var_dump($error);
        }
    }


    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }

    public function getAll() : array
    {
        $movies= [];
       $req =  $this->pdo->query( "SELECT * FROM movie");
       $data = $req->fetchAll();
       foreach ($data as $movie)
       {
           $movies[] = new Movie($movie);
       }
       return $movies;

    }

    public function delete(int $id) : void
    {
       $req = $this->pdo->prepare("DELETE FROM `movie` WHERE id = :id");
       $req->bindValue(':id', $id, PDO::PARAM_INT);
       $req->execute();


    }

    public function create(string $title, string $description, string $release_date, string $image_url, string $director, int $category_id) : void 
    {
        $req = $this->pdo->prepare("INSERT INTO `movie` (title, description, release_date, image_url, director, category_id) 
                                    VALUES (:title, :description, :release_date, :image_url, :director, :category_id)");
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':release_date', $release_date, PDO::PARAM_STR);
        $req->bindValue(':image_url', $image_url, PDO::PARAM_STR);
        $req->bindValue(':director', $director, PDO::PARAM_STR);
        $req->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $req->execute();
    }

 
    public function get(int $id): Movie
    {
        $req = $this->pdo->prepare("SELECT * FROM `movie` WHERE id = :id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $movie = new Movie($data);
        return $movie;
    }
    
    public function update(string $title, string $description, string $release_date, string $image_url, string $director, int $category_id, int $id) : void 
    {
        $req = $this->pdo->prepare("UPDATE `movie` SET title = :title, 
                                                       description = :description, 
                                                       release_date = :release_date, 
                                                       image_url = :image_url, 
                                                       director = :director, 
                                                       category_id = :category_id
                                                       WHERE id = :id ");
        $req->bindValue(':title', $title, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':release_date', $release_date, PDO::PARAM_STR);
        $req->bindValue(':image_url', $image_url, PDO::PARAM_STR);
        $req->bindValue(':director', $director, PDO::PARAM_STR);
        $req->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();

    }
    
}