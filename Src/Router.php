<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

spl_autoload_register('autoload_classes');
include_once '../Src/route.php';

$route = ['/blog' => ['../Controllers/ArticlesController.php', 'ArticlesController', 'controlGetArticles'],
        '/login' => ['../Controllers/UsersController.php', 'UsersController', 'controlLogin'],
        '/register' => ['../Controllers/UsersController.php', 'UsersController', 'controlPostUser'],
        '/blog/admin' => ['../Controllers/UsersController.php', 'UsersController', 'controlGetUser'],
        '/blog/admin/articles' => ['../Controllers/ArticlesController.php', 'ArticlesController', 'controlGetArticles'],
        '/myuseraccount' => ['../Controllers/UsersController.php', 'UsersController', 'controlGetUserById'],
        '/blog/article/:id' => ['../Controllers/ArticlesController.php', 'ArticlesController', 'controlGetArticleById']];















/* function(){//stocker le nom du controller et le nom de l'action//
    $article = new ArticlesController();
    $result = $article->controlGetArticles();
    //echo "Homepage Blog";
         }); 

$router->get('/blog/article/:id', function($id){
    include_once '../Controllers/ArticlesController.php';
    $article = new ArticlesController();
    $result = $article->controlGetArticlesById($id);
    //echo "Homepage Blog";
            });

$router->get('/login', function(){
    require '../Views/login.php';
    echo 'je suis login';});
$router->post('/login', function(){
    $user = new UsersController();
    if(isset($_POST['Submit'])){
        $user->get($_POST['username'], $_POST['password']);
    }
    ;});

$router->get('/register', function(){
        include_once '../Controllers/UsersController.php';});
$router->post('/register', function(){
        $user = new UsersController();
        if(isset($_POST['Submit'])){
            echo "je suis dans submit";
            $user->controlPostUser($_POST['username'], $_POST['password'], $_POST['email']);
        }
        ;});

$router->get('/blog/admin', function(){
    include_once '../Controllers/UsersController.php';});
$router->post('/blog/admin', function(){echo 'je suis admin';});

$router->get('/blog/admin/articles', function(){
    include_once '../Controllers/ArticlesController.php';});
$router->post('/blog/admin/articles', function(){echo 'je suis admin articles';});

$router->get('/blog/myuseraccount', function(){
    include_once '../Controllers/UsersController.php';});
$router->post('/blog/myuseraccount', function(){echo 'je suis my user account';});

$router->get('/blog/myarticles', function(){
    include_once '../Controllers/ArticlesController.php';});
$router->post('/blog/myarticles', function(){echo 'je suis my articles account';});
    





$router->get('/login/:id', function($id){echo 'je suis login'.$id; });
$router->post('/login/:id', function($id){echo $_POST['name'].$id; }); */
