<?php 

class Category {



//Atributs

    private int $id;
    private string $name;
    private string $color;



//Getters & Setters
    
    public function getId() : int 
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getName() : string 
    {
        return $this->name;
    }

  
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }


    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

//Constructors

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
  