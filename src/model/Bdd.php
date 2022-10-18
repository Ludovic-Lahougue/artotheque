<?php

namespace App\model;

use App\model\classe\oeuvre\{Oeuvre, Film, Peinture, Sculpture};
use App\model\classe\personne\{Personne, Auteur, Commissaire, Usager};
use App\model\classe\{Salle, SalleProjecteur, Exposition};
use App\model\enum\EtatOeuvre;
use Exception;

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
    
    //Oeuvres
    
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


    public function newFilm(Auteur $auteur, string $description, string $code)
    {
        $film = new Film($auteur, $description, $code);
        $this->oeuvres['Films'][] = $film;
        $auteur->addOeuvre($film);
        return $film;
    }

    public function newPeinture(Auteur $auteur, string $description, string $code)
    {
        $peinture = new Peinture($auteur, $description, $code);
        $this->oeuvres['Peintures'][] = $peinture;
        $auteur->addOeuvre($peinture);
        return $peinture;
    }

    public function newSculpture(Auteur $auteur, string $description, string $code, float $weight)
    {
        $sculpture = new Sculpture($auteur, $description, $code, $weight);
        $this->oeuvres['Sculptures'][] = $sculpture;
        $auteur->addOeuvre($sculpture);
        return $sculpture;
    }

    public function getOeuvre(string $code)
    {
        foreach($this->oeuvres as $oeuvre)
        {
            if($oeuvre->getCode() === $code)
                return $oeuvre;
        }
    }

    public function deleteOeuvre(Oeuvre $oeuvre)
    {
        $key = array_search($oeuvre, $this->getOeuvres());
        unset($this->oeuvres[$key]);
    }

    // Personnes

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

    public function getAuteurs()
    {
        return $this->personnes['Auteurs'];
    }

    public function getAuteurByEmail(string $email)
    {
        foreach($this->getAuteurs() as $auteur)
        {
            if($auteur->getEmail() === $email)
                return $auteur;
        }
        return null;
    }
    
    public function newAuteur(string $nom, string $prenom, string $email, string $telephone)
    {
        $auteur = new Auteur($nom, $prenom, $email, $telephone);
        $this->personnes["Auteurs"][] = $auteur;
        return $auteur;
    }
    
    public function newCommissaire(string $nom, string $prenom, string $email)
    {
        $commissaire = new Commissaire($nom, $prenom, $email);
        $this->personnes["Commissaires"][] = $commissaire;
        return $commissaire;
    }

    public function newUsager(string $nom, string $prenom, string $email)
    {
        $usager = new Usager($nom, $prenom, $email);
        $this->personnes["Usagers"][] = $usager;
        return $usager;
    }

    //Salles

    public function newSalle()
    {
        $salle = new Salle();
        $this->addSalle($salle);
        return $salle;
    }

    public function newSalleProjecteur()
    {
        $salleProjecteur = new SalleProjecteur();
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

        $salle1 = $this->newSalle();
        try
        {
            $salle1->addOeuvre($oeuvre1);
            $salle1->addOeuvre($oeuvre2);
        } catch (Exception $e)
        {
            trigger_error($e->getMessage(), E_USER_WARNING);
        }

        $salle2 = $this->newSalleProjecteur();
        try
        {
            $salle2->addOeuvre($oeuvre3);
            $salle2->addOeuvre($oeuvre4);
        } catch (Exception $e)
        {
            trigger_error($e->getMessage(), E_USER_WARNING);
        }

        $usager = $this->newUsager("D", "Charles", "charles@mail.com");
        $oeuvre2->setEtat(EtatOeuvre::CATALOGUE);
        $usager->addEmprunt($oeuvre2);

        $commissaire = $this->newCommissaire("C", "Jacques", "jacques@mail.com");
        $exposition = $this->newExposition($commissaire, "Printemps", array($salle1));

    }
}
?>