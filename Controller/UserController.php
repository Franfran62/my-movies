<?php 

// require_once "../config/dotenv.php";

class UserController {

    
    private PDO $pdo;


    public function __construct() {

       
        // (new DotEnv('../.env'))->load();

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

    public function create(string $email, string $password, string $username) : void 
    {
        $req = $this->pdo->prepare("INSERT INTO `user` (id, email, password, username) VALUES (UUID(), :email, :password, :username)");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $password, PDO::PARAM_STR);
        $req->bindValue(':username', $username, PDO::PARAM_STR);
        $req->execute();
    }

    public function isConnected(string $email, string $password) 
     {

        $req = $this->pdo->prepare("SELECT * FROM `user` WHERE email = :email");
        $req->bindValue(':email', $email);
        $req->execute();
            $user = $req->fetch(PDO::FETCH_ASSOC);
                if($user === false || !password_verify($password ,$user['password'])) {
                    echo 'Identifiants introuvables';
                }  else {
                    session_start();
                    $_SESSION["username"] = $user["username"];  
                    $_SESSION["email"] = $user["email"];                 
                }

    }
         
    

    public function alreadyExists(string $email) : bool
    {
        $req = $this->pdo->prepare("SELECT * FROM `user` WHERE email = :email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if ($user === false || $user['email'] !== $email) {
            return false;
        } else {
            return true;
        }
     
    } 

    public function getIdFromEmail(string $email) 
    {
        $req = $this->pdo->prepare("SELECT * FROM `user` WHERE email = :email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if ($user === false) {
            return false;
        } else {
            return $user['id'];
        }

    }

    
}