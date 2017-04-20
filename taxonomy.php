<?php

class Taxonomy {
    public $name;
    public $id;
    
    function __construct($id=0) {
        if($id!=0) {
            echo 'On construit l\'objet selon son ID';
            $this->name = "quelque chose";
            $this->id = 'un id';
        }
    }
    
    function getPosts() {
        echo 'Fait des trucs pour obtenir les articles de cette taxonomy';
    }
}

class Category extends Taxonomy {
    public $description; // Text
    public $parent; // INT id
    public $children; // Array of INT
    
    function __construct($id=0) {
        if($id!=0) {
            echo 'On construit l\'objet Category selon son ID';
            $this->name = "quelque chose";
            $this->id = 'un id';
            $this->description = "du texte";
            $this->parent = 'l\'id du parent';
            $this->children = 'tableau d\'id des enfants de cette catégorie';
        }
    }
    
    function addChild() { 
        // Ajout un enfant à cette catégorie
    }
}

class Keywords extends Taxonomy {
    function getOccurrences() {
        // Obtient le nombre d'occurences du mot-clé dans la bdd
    }
}


class Transport {
    
    public $id;
    public $passengers; // people capacity
    public $driver;    
    
    function __construct($id=0) {
        if($id !=0) {
            $this->id = $id;
            $this->passengers = $passengers;
            $this->driver = $driver;
        }
    }
    
    function isRunning() {
        echo 'Ça roule très vite';
    }
    
    function changeDriver() {
        echo 'Super conducteur';
    }
}

class Cab extends Transport {
    
    public $gps;
    
    function isAvailable() {
        echo 'libre';
    }
    function takeErrand() {
        echo 'Je prend une course';
    }
}

class Underground extends Transport {
    public $line;
    public $station;
    
    function inStation() {
     
     echo 'On ouvre pas les portes, sauter à travers les vitres.';
        
    }
    
}