<?php

namespace app\controller;

use App\model\Bdd;
use App\router\{Request, Response};
use App\view\View;
use \Exception;

class ExpositionController
{
    protected $request;
    protected $response;
    protected $view;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
        $bdd = new Bdd();
        $expositions = $bdd->getExpositions();
        $content['expositions'] = $expositions;
        $this->view = new View('templates/exposition/liste.php');
        $this->view->setPart('title', "Expositions");
        $this->view->setPart('content', $content);
    }
}