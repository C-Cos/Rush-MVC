<?php

include_once '../Config/authenticator.php';
include_once '../Config/db.php';

class Comments{
    

    public function get_comments()
    {

        $db=Database::getInstance();
        $result = $db -> prepare('SELECT * FROM comments');
        $result -> execute();
        $stock = $result -> fetchAll();
        return $stock;

    }
    
    public function get_comment($id)
    {
        $db=Database::getInstance();
        $requete=("SELECT * FROM comments WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
        $stock = $result->fetchAll();
        return $stock;
    }
    
    public function post_comment($content, $id_article,$id_creator)
    {
        $db=Database::getInstance();
        $requete=("INSERT INTO comments(content,id_article,id_creator) VALUES ('$name','$hash','$email')");
        $result=$db->prepare($requete);
        $result->execute();
    }
    
    public function put_comment($id,$content)
    {
        $db=Database::getInstance();
        
        $requete=("UPDATE comments SET content='$content',modification_date=NOW() WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
    }
    
    public function delete_comment($id)
    {
        $db=Database::getInstance();
       $requete=("DELETE FROM comments WHERE id='$id'");
       $result=$db->prepare($requete);
       $result->execute();
    }
}
