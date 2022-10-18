<?php

namespace app\controller;

use App\router\{Request, Response};
use App\view\View;
use \Exception;

class HomeController
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
        return $this->home();
    }

    public function home()
    {
        $this->view = new View('templates/home.php');
        $this->view->setPart('title', "MVC");
    }
}