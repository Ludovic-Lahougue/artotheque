<?php
    
    use App\router\{Request, Response};
    use App\controller\FrontController;

    require_once 'src/autoloader.php';
    Autoloader::register();

    $request = new Request($_GET, $_POST);
    $response = new Response();
    $frontController = new FrontController($request, $response);
    $frontController->execute();
?>