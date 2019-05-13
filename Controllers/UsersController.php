<?php

include_once '../Models/Users.php';

class UsersController{

    public function controlDeleteUser($id)
    {
        $user=new Users();
        $user->delete_user($id);
    }

    public function controlGetUserById($id)
    {
        
        $user=new Users();
        $array=$user->get_user($id);
        foreach($array as $user)
        {
            $result['id'] = htmlspecialchars($user['id']);
            $result['name'] = htmlspecialchars($user['name']);
            $result['email'] = htmlspecialchars($user['email']);
            $result['password'] = htmlspecialchars($user['password']);
            $result['group'] = htmlspecialchars($user['group']);
            $result['creation_date'] = htmlspecialchars($user['creation_date']);
            $result['modifiication_date'] = htmlspecialchars($user['modifiication_date']);
            $result['status'] = nl2br(htmlspecialchars($user['status']));
        }
        return $result;
    }
    

    public function controlGetUsers() // Fonction de Display 
    {
        $user = new Users();
        $array = $user->get_users();
            foreach($array as $key => $user)
            {
                $result[$key]['id'] = htmlspecialchars($user['id']);
                $result[$key]['name'] = htmlspecialchars($user['name']);
                $result[$key]['email'] = htmlspecialchars($user['email']);
                $result[$key]['group'] = htmlspecialchars($user['group']);
                $result[$key]['status'] = nl2br(htmlspecialchars($user['status']));
            }
            
            
        return $result; 
        //include_once '../Views/Homepage.php';
    } 

    public function controlLogin($email, $password) // recupère un seul User et check par rapport a la bdd pour se connecter
    {
        if (isset($_POST['email']) && isset ($_POST['password'])){
                
            $user = new Users();
            $array = $user->get_user_log($email);
            $result['email'] = htmlspecialchars($array[0]['email']);
            $result['password'] = htmlspecialchars($array[0]['password']);
            
            $verif = password_verify($_POST["password"], $result['password']);

            if(($_POST['email'] == $result['email']) && ($verif == true)){

                $_SESSION['username']=$result['email'];
                include_once '../Views/Homepage.php';
            }

        }else{
            echo '<script language="javascript">';
            echo 'alert("Invalid username and/or password.")';
            echo '</script>';
        }        
    }

    public function renderView($pattern)
    {
        include_once '../Views'.$pattern.'.php';
    }

    public function controlPostUser($name, $password, $email){

        
        if((strlen($_POST['username'])<3 || (strlen($_POST['username'])>10))){
            echo '<script language="javascript">';
            echo 'alert("Invalid username")';
            echo '</script>';
        }

        else if((preg_match("/^[^@]+@[^@]+\.[a-z]{2,6}$/i", $_POST['email'])) == FALSE){
            echo '<script language="javascript">';
            echo 'alert("Invalid Email")';
            echo '</script>';
        }

        else if(($_POST['password'] != $_POST['password_confirmation'])||(strlen($_POST['password'])<8 || (strlen($password)>20))||((strlen($_POST['password_confirmation'])<8 || (strlen($_POST['password_confirmation'])>20)))){
            echo '<script language="javascript">';
            echo 'alert("Invalid password or password confirmation")';
            echo '</script>';
        }
    
        else{
            $user = new Users;
            $controlname = secure_input($name); 
            $controlpassword = secure_input($password);
            $controlemail = secure_input($email);
            $user->post_user($controlname, $controlpassword,$controlemail);
            

            if($user){
                echo '<script language="javascript">';
                echo 'alert("User created")';
                echo '</script>';
            }
        }
    }
}

/* function secure_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} */

//include_once '../Views/register.php';


/* $superUser=new UsersController();
$superUser->controlPostUser('Martin','Pomme','Martin.Matin@france3.fr'); */