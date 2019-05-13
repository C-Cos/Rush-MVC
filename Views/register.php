<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
<?php

include_once ('../Models/Form.php');

include_once 'Layouts/Header.php';

$form = new form($_POST);

echo "<div class='container'>";
echo $form->startForm();
echo $form->input('username', "text");
echo $form->input('email', 'text');
echo $form->input("password", 'password');
echo $form->input('password_confirmation', "password");
echo $form->submit('Submit', 'Submit');
echo $form->endForm();
echo "</div>";

include_once 'Layouts/Footer.php';

//Création article
/* echo $form->input("Title", 'text', $username);
echo $form->textarea("textarea", 'textarea');

echo $form->submit("submitarticle", 'submitarticle'); */

?>
    
</body>
</html>