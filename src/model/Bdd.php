<?php

namespace App\model;

use App\model\classe\oeuvre\Film;
use App\model\classe\oeuvre\Oeuvre;
use App\model\classe\oeuvre\Peinture;
use App\model\classe\oeuvre\Sculpture;
use App\model\personne\{Personne, Auteur, Commissaire, Usager};

class Bdd
{
    private array $oeuvres;
    private array $salles;
    private array $personnes;
    private array $expositions;

    public function __construct()
    {
        $this->setOeuvres(array());
        $this->setSalles(array());
        $this->setPersonnes(array());
        $this->setExpositions(array());
        $this->init();
    }

    /**
     * Get the value of salles
     */ 
    public function getSalles(): array
    {
        return $this->salles;
    }

    /**
     * Set the value of salles
     *
     * @return  self
     */ 
    public function setSalles(array $salles)
    {
        $this->salles = $salles;

        return $this;
    }

    public function addSalle(Salle $salle)
    {
        $this->salles[] = $salle;
    }

    /**
     * Get the value of expositions
     */ 
    public function getExpositions(): array
    {
        return $this->expositions;
    }

    /**
     * Set the value of expositions
     *
     * @return  self
     */ 
    public function setExpositions(array $expositions)
    {
        $this->expositions = $expositions;

        return $this;
    }

    public function addExposition(Exposition $exposition)
    {
        $this->expositions[] = $exposition;
    }

    /**
     * Get the value of personnes
     */ 
    public function getPersonnes(): array
    {
        return $this->personnes;
    }

    /**
     * Set the value of personnes
     *
     * @return  self
     */ 
    public function setPersonnes(array $personnes)
    {
        $this->personnes = $personnes;

        return $this;
    }

    public function addPersonne(Personne $personne)
    {
        $this->personnes[] = $personne;
    }

    /**
     * Get the value of oeuvres
     */ 
    public function getOeuvres(): array
    {
        return $this->oeuvres;
    }

    /**
     * Set the value of oeuvres
     *
     * @return  self
     */ 
    public function setOeuvres(array $oeuvres)
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    public function addOeuvre(Oeuvre $oeuvre)
    {
        $this->oeuvres[] = $oeuvre;
    }

    //Oeuvres

    public function newFilm(Auteur $auteur, string $description, string $code, Personne $proprietaire = null)
    {
        $film = new Film($auteur, $description, $code, $proprietaire);
        $this->addOeuvre($film);
        return $film;
    }

    public function newPeinture(Auteur $auteur, string $description, string $code, Personne $proprietaire = null)
    {
        $peinture = new Peinture($auteur, $description, $code, $proprietaire);
        $this->addOeuvre($peinture);
        return $peinture;
    }

    public function newSculpture(Auteur $auteur, string $description, string $code, float $weight, Personne $proprietaire = null)
    {
        $sculpture = new Sculpture($auteur, $description, $code, $weight, $proprietaire);
        $this->addOeuvre($sculpture);
        return $sculpture;
    }


    // Personnes

    public function newAuteur(string $nom, string $prenom, string $email, string $telephone, array $oeuvres = null)
    {
        $auteur = new Auteur($nom, $prenom, $email, $telephone, $oeuvres);
        $this->addPersonne($auteur);
        return $auteur;
    }

    public function newCommissaire(string $nom, string $prenom, string $email)
    {
        $commissaire = new Commissaire($nom, $prenom, $email);
        $this->addPersonne($commissaire);
        return $commissaire;
    }

    public function newUsager(string $nom, string $prenom, string $email)
    {
        $usager = new Usager($nom, $prenom, $email);
        $this->addPersonne($usager);
        return $usager;
    }

    //Salles

    public function newSalle(array $oeuvres = null)
    {
        $salle = new Salle($oeuvres);
        $this->addSalle($salle);
        return $salle;
    }

    public function newSalleProjecteur(array $oeuvres = null)
    {
        $salleProjecteur = new SalleProjecteur($oeuvres);
        $this->addSalle($salleProjecteur);
        return $salleProjecteur;
    }

    public function newExposition(Commissaire $commissaire, string $theme, array $salles = null)
    {
        $exposition = new Exposition($commissaire, $theme, $salles);
        $this->addExposition($exposition);
        return $exposition;
    }

    public function init()
    {
        $auteur1 = $this->newAuteur("A", "Jean", "Jean@mail.com", "0639481726");
        $oeuvre1 = $this->newPeinture($auteur1, "Peinture 1", "AHD7326B1");
        $oeuvre2 = $this->newSculpture($auteur1, "Sculpture 1", "JAMOSJ912", 3.4);

        $auteur2 = $this->newAuteur("B", "Michel", "michel@mail.com", "0673615273");
        $oeuvre3 = $this->newSculpture($auteur2, "Sculpture 2", "JA3FF4J92", 25);
        $oeuvre4 = $this->newFilm($auteur2, "Film 1", "F324I2");


    }
}
?>