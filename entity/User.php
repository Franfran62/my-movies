<?php 

class User {

//Attributes 

    private $id;
    private $email;
    private $password;
    private $username;

//Getters & Setters

    public function getPassword() : string 
    {
        return $this->password;
    }

    public function getUsername() : string 
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }

//constructors 

public function __construct(array $data)
{
    $this-> hydrate($data);
}

//Methods 

public function hydrate(array $data)
{
    foreach ($data as $key => $value)
    {
        $method = "set" . ucfirst($key);
        if (method_exists($this, $method))
        {
            $this->$method($value);
        }
    }
}

}