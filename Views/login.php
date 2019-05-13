<?php

//session_start();

/* require 'autolo.php'; 
Autoloader::register(); */ 

include_once '../Models/Form.php';

$form = new form ($_POST);

/* $email = $_POST["email"];
$password = $_POST["password"];
$message = ""; */

if (isset($_POST["submit"])){
    $datas =0;

    if (isset($_POST['email']) && isset ($_POST['password'])){
        
        //connection PDO

        $verif = password_verify($password, $datas->password);

        // si verif == true, création de la session en fonction du statut ?
        // + redirection vers la page d'accueil. header('Location: page').
    }

    else{
        
        $message = "Invalid username and/or password";
    }
}

echo $form->input("email", 'text');
echo $form->input("password", 'password');
echo $form->submit("submit", 'submit');