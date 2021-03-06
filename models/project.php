<?php
class Project {
    
    private $title;
    private $description;
    private $url_web;
    private $url_github;
    private $created_at;
    private $picture;
    
    public function add($data){
        global $db;
        require_once 'connexion.php';
        extract($data);
        if (!isset($id)){
            $sql = "INSERT INTO projects(id,title,description,picture,created_at,url_web,url_github) VALUES (NULL,?,?,?,?,?,?)";
            $db->prepare($sql)->execute([$title, $description, $picture, $created_at, $url_web, $url_github]);
        } else {
            if (isset($picture)) {
                $sql = "UPDATE projects SET title=?, description=?,picture=?,created_at=?, url_web=?, url_github=? WHERE id=?";
                $db->prepare($sql)->execute([$title, $description, $picture, $created_at, $url_web, $url_github, $id]);
            } else {
                $sql = "UPDATE projects SET title=?, description=?, url_web=?, url_github=? WHERE id=?";
                $db->prepare($sql)->execute([$title, $description, $url_web, $url_github, $id]);
            }
        
        }
    }
    
    public function up($data){
        global $db;
        require_once 'connexion.php';
        extract($data);
        
        if (@$id){
                if (isset($picture)) {
                    $sql = "UPDATE projects SET title=?, description=?,picture=?,created_at=?, url_web=?, url_github=? WHERE id=?";
                    $db->prepare($sql)->execute([$title, $description, $picture,$created_at, $url_web, $url_github, $id]);
                } else {
                    $sql = "UPDATE projects SET title=?, description=?, url_web=?, url_github=? WHERE id=?";
                    $db->prepare($sql)->execute([$title, $description, $url_web, $url_github, $id]);
                }
            
        }else {
            echo "erreur d'aiguillage pas de Id pour la mise à jour";
        }
    }
    
    public function del($id){
        global $db;
        require_once 'connexion.php';
        $elementToDel = $this->select($id, 'picture');
        $sql = "DELETE FROM projects WHERE id=?";  
        $db->prepare($sql)->execute([$id]);
        if ($this->picture) {
            unlink("assets/upload/" . $elementToDel);
        }
        
    }

    public function select($id = "*", $col = "*")
    {
        global $db;
        require_once 'connexion.php';
        if (!($col == "*")) {
            $sql = "SELECT $col FROM projects WHERE id=$id";
            return $db->query($sql)->fetch();
        } else {
            if ($id == "*"){
                $sql = "SELECT $col FROM projects";
                return $db->query($sql)->fetchAll();
            }else{
                $sql = "SELECT $col FROM projects WHERE id=$id";
                return $db->query($sql)->fetchAll();
            }
        }
    }

    public function __contruct(array $data)
    {
        $this->hydrate($data);
        $this->add($data);
        
    } 
    
    public function hydrate(array $data)
    {
    foreach ($data as $key => $value){
        $method = 'set'.ucfirst($key);
        if (method_exists($this,$method)){
            $this->$method($value);
        }
    }
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of url_github
     */ 
    public function getUrl_github()
    {
        return $this->url_github;
    }

    /**
     * Set the value of url_github
     *
     * @return  self
     */ 
    public function setUrl_github($url_github)
    {
        $this->url_github = $url_github;

        return $this;
    }

    /**
     * Get the value of url_web
     */ 
    public function getUrl_web()
    {
        return $this->url_web;
    }

    /**
     * Set the value of url_web
     *
     * @return  self
     */ 
    public function setUrl_web($url_web)
    {
        $this->url_web = $url_web;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}
?>