<?php

include_once('../Models/Article.php');
//echo "Je suis ArticlesController";

class ArticlesController{

    public function controlGetArticleById($id)
    {
        $user=new Article();
        $array=$user->get_article($id);
        foreach($array as $article)
        {
            $result['id']= htmlspecialchars($article['id']);
            $result['title'] = htmlspecialchars($article['title']);
            $result['content'] = nl2br(htmlspecialchars($article['content']));
        }
        return $result;  
    }

    public function renderView($pattern)
    {
        $result = $this->controlGetArticles();
        include_once '../Views'.$pattern.'.php';
    }

    public function controlGetArticles()
    {
        //echo "toto";
        $user = new Article();
        $array = $user->get_articles();
            foreach($array as $key => $article)
            {
                $result[$key]['id'] = htmlspecialchars($article['id']);
                $result[$key]['title'] = htmlspecialchars($article['title']);
                $result[$key]['content'] = nl2br(htmlspecialchars($article['content']));
            }
            //var_dump($result);
        //
        //echo "<script> console.log(" . $result . "); </script>"; 
        //global $result;
        return $result; 
    } 

    public function controlPostArticle($title, $content,$id_creator){

        $user = new Article;
        $controltitle = secure_input($title); 
        $controlcontent = secure_input($content);
        $controlIdCreator = secure_input($id_creator);
        $user->post_article($controltitle, $controlcontent,$controlIdCreator);
    }
}




function secure_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/* $user=new ArticlesController();

$result=$user->controlGetArticle(69);
var_dump($result);
echo $result['title']; */