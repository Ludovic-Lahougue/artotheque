<?php

namespace app\controller;

use App\model\Bdd;
use App\router\{Request, Response};
use App\view\View;
use \Exception;

class PersonneController
{
    protected $request;
    protected $response;
    protected $view;
    protected $bdd;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->bdd = new Bdd();
    }

    public function getView()
    {
        return $this->view;
    }

    public function execute($action)
    {
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            throw new Exception("Action {$action} non trouvée");
        }
    }

    public function defaultAction()
    {
        return $this->liste();
    }

    public function liste()
    {
        $personnes = $this->bdd->getPersonnes();
        $content['personnes'] = $personnes;
        $this->view = new View('templates/personne/liste.php');
        $this->view->setPart('title', "Personnes");
        $this->view->setPart('content', $content);
    }

    public function new()
    {
        $method = $this->request->getPostParam('type');
        $nom = $this->request->getPostParam('nom');
        $prenom = $this->request->getPostParam('prenom');
        $email = $this->request->getPostParam('email');
        $telephone = $this->request->getPostParam('telephone');
        
        if(!is_null($method)) {
            $method = "new{$method}";
            if(!method_exists(Bdd::class, $method))
                throw new Exception("methode {$method} non existante");
            if(!is_null($method) && !is_null($nom) && !is_null($prenom) && !is_null($email)) {
                $this->bdd->$method($nom, $prenom, $email, $telephone);
                return $this->liste();
            }
        }
        
        $this->view = new View('templates/personne/new.php');
        $this->view->setPart('title', "Nouvelle personne");
    }

    public function delete()
    {
        $email = $this->request->getPostParam('email');
        if($email == null)
            return;
        $personne = $this->bdd->getPersonneByEmail($email);
        $this->bdd->deletePersonne($personne);
        
        $this->liste();
    }
}