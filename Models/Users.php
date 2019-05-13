<?php

include_once '../Config/authenticator.php';
include_once '../Config/Db.php';

class Users{
    

    public function get_users()
    {

        $db=Database::getInstance();
        $result = $db -> prepare('SELECT * FROM users');
        $result -> execute();
        $stock = $result -> fetchAll();
        return $stock;

    }
    
    public function get_user($id)
    {
        $db=Database::getInstance();
        $requete=("SELECT * FROM users WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
        $stock = $result->fetchAll();
        return $stock;
    }
    
    public function post_user($name, $password,$email)
    {
        $db=Database::getInstance();
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $requete=("INSERT INTO users(name,password,email) VALUES ('$name','$hash','$email')");
        $result=$db->prepare($requete);
        $result->execute();
    }
    
    public function put_user($id,$name,$password, $email)
    {
        $db=Database::getInstance();
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $requete=("UPDATE users SET name='$name',password='$hash',email='$email',modification_date=NOW() WHERE id='$id'");
        $result=$db->prepare($requete);
        $result->execute();
    }
    
    public function delete_user($id)
    {
        $db=Database::getInstance();
       $requete=("DELETE FROM users WHERE id='$id'");
       $result=$db->prepare($requete);
       $result->execute();
    }
}

/* $admin=new Users(); */

/* $celestin=$admin->get_user(1);
echo $celestin[0]['name']."\n";
$admin->post_user('Michel','Pomme','Michel@forever-tonight.fr');
$michel=$admin->get_user(3);
echo $michel[0]['name']."\n"; */

/* $liste=$admin->get_users();

foreach($liste as $value)
{
    echo $value['name'];
} */

/* $admin->put_user(3,'Jean-Michel','oui','oui@oui.oui'); */