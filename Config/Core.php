<?php
//instancie les objets Database, Controllers, Dispatcher
include_once ('../dispatcher.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

function autoload_classes($class) {

    //liste les classes à charger

    $array_src = array ("../Models/", "../Controllers/", "../", '../Src/', '../Config/');

    $className = str_replace("\\",DIRECTORY_SEPARATOR, $class);

    $file_name = $className . '.php';

    //var_dump($className);

    $total = count($array_src);

    for ($i =0; $i < $total; $i++)
    {

        if(file_exists($array_src[$i].$file_name))
        {

            include_once $array_src[$i].$file_name;
            
        }
    }


}
spl_autoload_register('autoload_classes');


$dispatch = new Dispatcher();
//$dispatch->run();
/* $db = new Database;
$article = new ArticlesController(); */