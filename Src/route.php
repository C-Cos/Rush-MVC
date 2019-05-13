<?php
include_once ('../Src/RouterException.php');

class Route{

    private $path;
    private $array;
    private $matches;
    
    public function __construct($path, $array)
    {
        //var_dump($array);
        $this->path = $path;
        $this->array = $array;

    }

    public function match($url)
    {
        //echo $this->path;
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        //echo $path[1];
        $regex = "#^$path$#i";
        //echo $regex;

        if(!preg_match($regex, $url, $matches))
        {
            //echo "<br>URL = $url<br>";
            return false;
        }
        else
        {
            //var_dump($matches);
            array_shift($matches);
            $this->matches = $matches;
            return true;
        }
    }

    public function call()
    {
        //var_dump($this->array);
        echo '</br>';
        //return call_user_func_array($this->array,$this->matches);
        //echo '<pre>';
        return array($this->array, $this->matches);
        //echo '</pre>';
        
    }
    //give array avec l'instance du controller generer avec la cle du tableau $array 

}