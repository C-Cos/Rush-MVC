<?php

spl_autoload_register('autoload_classes');
include_once 'Src/Router.php';

class Dispatcher{

    public function __construct()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/PHP_Rush_MVC');
        $url = '/'. $request;

        if([$_SERVER['REQUEST_METHOD']] === null )
        {
            throw new RouterException('Request_method does not exists');
        }
        else
        { 
            global $route;

            foreach($route as $pattern => $target)
            {
                $path = preg_replace('#:([\w]+)#', '([^/]+)', $pattern);
                $regex = "#^$path$#i";

                if(preg_match($regex, $url, $matches))
                {
                    $action = [$_SERVER['REQUEST_METHOD']][0];
                    echo $action;
                    array_shift($matches);//id
                    if($action === 'GET')
                    {
                        include_once $target[0];
                        $controller = new $target[1];//files
                        $controller->renderView($pattern);//render view
                        $method = $target[2];//call methode
                        $controller->$method();
                        break;
                    }
                    if($action === 'POST')
                    {
                        include_once $target[0];
                        $controller = new $target[1];//files
                        $controller->renderView($pattern);//render view
                        if(isset($_POST['submit']))
                        {
                            $method = $target[2];//call methode
                            $controller->$method();
                            break;
                        }
                        
                    }
                    
                }
                
            } 
        }
    }

}