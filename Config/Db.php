<?php


class Database{
    
    private static $_instance = null;
    private $PDOInstance = null;

    private function __construct()
    {
        include('authenticator.php');
        
        try{
            $this->PDOInstance = new PDO("mysql:host=localhost;dbname=blog_php", $nomDeCo, $motDePasse);    
        }


        catch(PDOException $e)
        {

            echo "Error connection to DB\n";
            echo $e;
            file_put_contents('ERROR_LOG_FILE',$e,FILE_APPEND);
        }

        if(is_a($this->PDOInstance, 'PDO'))
        {
            echo "Connection to DB successfull.\n";
        }

        

    }

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new Database();
        }
        return self::$_instance;

    }

    public function getUser()
        {
            return $this->_user;
        }
    public function getPasswd()
        {
            return $this->_passwd;
        }

        

        public function prepare($query)
        {
            return $this->PDOInstance->prepare($query);
        }

}
//$db = Database::getInstance();
