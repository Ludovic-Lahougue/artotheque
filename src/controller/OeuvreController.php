<?php

namespace app\controller;

use App\model\Bdd;
use App\router\{Request, Response};
use App\view\View;
use \Exception;

class OeuvreController
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
        $oeuvres = $this->bdd->getOeuvres();
        $content['oeuvres'] = $oeuvres;
        
        $this->view = new View('templates/oeuvre/liste.php');
        $this->view->setPart('title', "Oeuvres");
        $this->view->setPart('content', $content);
    }

    public function new()
    {
        $method = $this->request->getPostParam('type');
        $description = $this->request->getPostParam('description');
        $auteur = $this->request->getPostParam('auteur');
        $code = $this->request->getPostParam('code');
        $masse = $this->request->getPostParam('masse');

        if(!is_null($auteur)) {
            $auteur = $this->bdd->getAuteurByEmail($auteur);
            if(is_null($auteur))
                $auteur = $this->bdd->newAuteur("Inconnu", "", "", "");
        }
        if(!is_null($method)) {
            $method = "new{$method}";
            if(!method_exists(Bdd::class, $method))
                throw new Exception("methode {$method} non existante");

            if(!is_null($method) && !is_null($description) && !is_null($auteur) && !is_null($code)) {
                $this->bdd->$method($auteur, $description, $code, $masse);
                return $this->liste();
            }
        }

        $auteurs = $this->bdd->getAuteurs();
        $content['auteurs'] = $auteurs;
        
        $this->view = new View('templates/oeuvre/new.php');
        $this->view->setPart('title', "Nouvelle oeuvre");
        $this->view->setPart('content', $content);
    }

    public function delete()
    {
        $code = $this->request->getPostParam('code');
        if($code == null)
            return;
        $oeuvre = $this->bdd->getOeuvre($code);
        $this->bdd->deleteOeuvre($oeuvre);
        
        $this->liste();
    }
}