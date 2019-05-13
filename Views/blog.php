<?php

//global $result;
//include_once '../ArticlesController.php';
///$this->controlGetArticles();
$this->controlGetArticles();
echo "je suis dans /blog";
//var_dump($result);
foreach ($result as $array)
{
    foreach($array as $value => $content){

        echo "<li>".$value . '='. $content. "</li>";
    }
    
}
    
