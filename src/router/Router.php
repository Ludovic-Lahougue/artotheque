<?php

namespace App\router;

use \Exception;

class Router
{

    protected $controllerClassName;
    protected $controllerAction;
    protected $request;

    public function __construct(Request $request)
    {
        $this->setRequest($request);
        $this->parseRequest();
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setControllerClassName($controllerClassName)
    {
        $this->controllerClassName = $controllerClassName;
    }

    public function setControllerAction($controllerAction)
    {
        $this->controllerAction = $controllerAction;
    }

    public function getControllerClassName()
    {
        return $this->controllerClassName;
    }

    public function getControllerAction()
    {
        return $this->controllerAction;
    }

    public function parseRequest()
    {
        $package = $this->getRequest()->getGetParam('controller');
        switch ($package)
        {
            case 'oeuvre':
                $this->setControllerClassName('App\controller\OeuvreController');
                break;
            case 'personne':
                $this->setControllerClassName('App\controller\PersonneController');
                break;
            case 'salle':
                $this->setControllerClassName('App\controller\SalleController');
                break;
            case 'exposition':
                $this->setControllerClassName('App\controller\ExpositionController');
                break;
            default:
                $this->setControllerClassName('App\controller\HomeController');
        }
        
        if(!class_exists($this->getControllerClassName()))
            throw new Exception("Classe {$this->getControllerClassName()} non existante");

        $this->setControllerAction($this->getRequest()->getGetParam('action', 'defaultAction'));
    }
}
?>