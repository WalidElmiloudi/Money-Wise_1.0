<?php

namespace App\Core;

use App\Core\ControllerFactory;

class Router
{
    private $currentController = 'HomeController';
    private $currentMethod = 'index';
    private $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if(isset($url[0])) {
            if(file_exists('../app/Controller/'.ucfirst($url[0])).'Controller.php') {
                $this->currentController = ucfirst($url[0]).'Controller';
                unset($url[0]);
            } else {
              $this->currentController = 'NotFoundController';
            }
        }

        require_once '../app/Controller/'.$this->currentController.'.php';

        $controllerClass = 'App\\Controller\\'.$this->currentController;

        $this->currentController = ControllerFactory::make($controllerClass);

        if(isset($url[1])) {
            if(method_exists($this->currentController,$url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            } else {
              $this->currentMethod = 'index';
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
    }

    public function getUrl()
    {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'],'/');
            $url =filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);

            return $url;
        }

        return [];
    }
}