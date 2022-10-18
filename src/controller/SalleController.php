<?php

namespace app\controller;

use App\model\Bdd;
use App\model\enum\EtatOeuvre;
use App\router\{Request, Response};
use App\view\View;
use \Exception;

class SalleController
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
        $salles = $this->bdd->getSalles();
        $content['salles'] = $salles;
        $this->view = new View('templates/salle/liste.php');
        $this->view->setPart('title', "Salles");
        $this->view->setPart('content', $content);
    }

    public function new()
    {
        $id = $this->request->getPostParam('id');
        $codes = $this->request->getPostParam('codes');

        if(!is_null($id)) {
            $salle = $this->bdd->newSalle($id);
            if(is_array($codes)) {
                foreach($codes as $code)
                {
                    $oeuvre = $this->bdd->getOeuvre($code);
                    if(!is_null($oeuvre))
                    {
                        $oeuvre->setEtat(EtatOeuvre::EXPOSEE);
                        $salle->addOeuvre($oeuvre);
                    }
                }
            }
            return $this->liste();
        }

        $oeuvres = $this->bdd->getOeuvreStock();
        $content['oeuvres'] = $oeuvres;
        
        $this->view = new View('templates/salle/new.php');
        $this->view->setPart('title', "Nouvelle oeuvre");
        $this->view->setPart('content', $content);
    }

    public function delete()
    {
        $id = $this->request->getPostParam('id');
        if(is_null($id))
            return;
        $salle = $this->bdd->getSalle($id);
        $this->bdd->deleteSalle($salle);
        
        $this->liste();
    }

    public function modify()
    {
        
    }
}