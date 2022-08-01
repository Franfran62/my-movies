<?php 

// require_once "../config/dotenv.php";

class UserController {

    
    private PDO $pdo;


    public function __construct() {

       
        // (new DotEnv('../.env'))->load();

        try {
          $this->setPdo(new PDO($_ENV['DATABASE_DNS'],$_ENV['username'], $_ENV['password']));
          echo "I'm connected to DB";
          $this->pdo->query("USE ".$_ENV['database']);
          echo "I'm connected to the good base";
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
echo 'un';
        $req = $this->pdo->prepare("SELECT * FROM user WHERE email =:email");
echo 'deux';
        $req->bindValue(':email', $email, PDO::PARAM_STR);
echo 'Trois ';
    if ($req->execute()) {
            // La requête s'est bien déroulée
        } else {
        
            $errorInfo = $req->errorInfo();
            echo 'SQLSTATE : '.$errorInfo[0].'<br>';
            echo 'Erreur du driver : '.$errorInfo[1].'<br>';
            echo 'Message : '.$errorInfo[2]; 
        }
echo 'quatre';
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