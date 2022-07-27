<?php 

class Movie {

//Attributes

    private int $id;
    private string $title;
    private string $description;
    private string $director;
    private string $image_url;

//Getters & Setters

    public function getImage_url(): string
    {
        return $this->image_url;
    }

    public function setImage_url(string $image_url): void
    {
        $this->image_url = $image_url;
    }
    private string $release_date;

    public function getRelease_date(): string
    {
        return $this->release_date;
    }

    public function setRelease_date(string $release_date): void
    {
        $this->release_date = $release_date;
    }
    private int $category_id;



    public function getId()
    {
    return $this->id;
    }

    public function setId($id)
    {
    $this->id = $id;

    return $this;
    }

    public function getTitle()
    {
    return $this->title;
    }

    public function setTitle($title)
    {
    $this->title = $title;

    return $this;
    }

    public function getDescription() : string
    {
    return $this->description;
    }

    public function setDescription($description)
    {
    $this->description = $description;

    return $this;
    }

    public function getDirector()
    {
    return $this->director;
    }

    public function setDirector($director)
    {
    $this->director = $director;

    return $this;
    }

    public function getCategory_id()
    {
    return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
    $this->category_id = $category_id;

    return $this;
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

