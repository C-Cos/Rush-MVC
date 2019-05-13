<?php

include_once '../Models/Comments.php';

class CommentsController{

    public function controlGetComments() // Fonction de Display 
    {
        $comment = new Comments();
        $array = $comment->get_comments();
            foreach($array as $key => $comment)
            {
                $result[$key]['id'] = htmlspecialchars($comment['id']);
                $result[$key]['content'] = htmlspecialchars($comment['content']);
                $result[$key]['id_article'] = htmlspecialchars($comment['id_article']);
                $result[$key]['id_creator'] = nl2br(htmlspecialchars($comment['id_creator']));
            }
            
            
        return $result; 
    } 

    public function controlPostUser($content, $id_article,$id_creator){ //Fonction de création 

        $user = new Comments;
        $controlcontent = secure_input($content); 
        $controlIdArticle = secure_input($id_article);
        $controlIdCreator = secure_input($id_creator);
        $user->post_comment($controlcontent, $controlIdArticle,$controlIdCreator);
    }
}


function secure_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}