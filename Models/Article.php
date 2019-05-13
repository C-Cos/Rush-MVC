<?php

include_once '../Config/Db.php';

class Article{
    
    public function get_articles()
    {

        $db=Database::getInstance();
        $result = $db -> prepare('SELECT * FROM articles');
        $result -> execute();
        $stock = $result -> fetchAll();
        return $stock;

    }
    
    public function get_article($id)
    {
        $db=Database::getInstance();
        $requete=("SELECT * FROM articles WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
        $stock = $result->fetchAll();
        return $stock;
    }
    
    public function post_article($title, $content, $id_creator)
    {
        $db=Database::getInstance();
        $requete=("INSERT INTO articles(title,content,id_creator) VALUES ('$title','$content','$id_creator')");
        $result=$db->prepare($requete);
        $result->execute();
    }
    
    public function put_article($id,$title,$content)
    {
        $db=Database::getInstance();
        $requete=("UPDATE articles SET title='$title',content='$content',modification_date=NOW() WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
    }
    
    public function delete_article($id)
    {
        $db=Database::getInstance();
        $requete=("DELETE FROM articles WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
    }
}


/* $writer=new Article;

$writer->post_article('Horoscope','Poisson',1);
$writer->post_article('Horoscope','Poisson',1); */
/* $article=$writer->get_article(2);
var_dump($article[1]['content']); */

//$writer->delete_article(4);

/* $writer->put_article('1','Horoscope Cancer','Pas la folie furieuse','oui');
$article=$writer->get_article(1);
echo $article[0]['content'];*/
