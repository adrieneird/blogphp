<?php

abstract class Objet {
    abstract function saveNew();
    abstract function saveUpdate();
    abstract function load();
}

class Page extends Objet {
    private $table = "page";
    private $data;
    public $id;
    private $url;
    private $titre;
    private $contenu;
    
    function setUrl($val) {
        $this->url = "";
        if (!empty($val)) {
            $this->url = $val;
        }
    }
    
    function getUrl() {
        return $this->url;
    }
    
    function setTitre($val) {
        $this->titre = "";
        if (!empty($val)) {
            $this->titre = $val;
        }
    }
    
    function getTitre() {
        return $this->titre;
    }
    
    function setContenu($val) {
        $this->contenu = "";
        if (!empty($val)) {
            $this->contenu = $val;
        }
    }

    function getContenu() {
        return $this->contenu;
    }
    
    function saveNew() {
        $query = "INSERT INTO {$this->table} (url, titre, contenu) VALUES (:url, :titre, :contenu)";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['url' => $this->url, 'titre' => $this->titre, 'contenu' => $this->contenu]);
    }
    
    function saveUpdate() {
        $query = "UPDATE {$this->table} SET url=:url, titre=:titre, contenu=:contenu WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $this->id, 'url' => $this->url, 'titre' => $this->titre, 'contenu' => $this->contenu]);
    }
    
    function load() {
        $query = "SELECT * FROM {$this->table} WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $this->id]);
        $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Parse data
        $this->url = $this->data['url'];
        $this->titre = $this->data['titre'];
        $this->contenu = $this->data['contenu'];
    }
    
    public static function loadFromId($id) {
        $query = "SELECT * FROM page WHERE id=:id";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject("Page");
    }
    
    public static function loadFromUrl($url) {
        $query = "SELECT * FROM page WHERE url=:url";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['url' => $url]);
        return $stmt->fetchObject("Page");
    }
    
    public static function loadPages() {
        $query = "SELECT * FROM page";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Page");
    }
}