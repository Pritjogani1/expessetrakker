<?php

use Core\Session;
use Core\ValidationException;
use LDAP\Result;
session_start();
const BASE_PATH = __DIR__.'/../';
// var_dump(BASE_PATH);
// require BASE_PATH . "vendor/autoload.php";

require BASE_PATH . "Core/functions.php";
spl_autoload_register(function($class){

   $class =  str_replace("\\",DIRECTORY_SEPARATOR,$class);
    require  base_path($class.".php");

});

require base_path("bootstrap.php");


$router = new \Core\Router();
$routes = require base_path( "routes.php");
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$method =  isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];


try{
    $router->route($uri,$method);

}catch(ValidationException $exception){
    
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
   return  redirect($_SERVER['HTTP_REFERER']);
}


Session::unflash();

//connect with mysql datbase

//class Person{
//     public $name;
//     public $age;
    
//     public function berath()
//     {
//         echo "breathing";
//     }
// }

// $person = new Person();
//     $person->name = "prit";
//     $person->age = 25;
//     echo($person->name);
//}

// $dsn = 
// new PDO($dsn)





// $config = require "config.php";
// $db = new Database($config);
// $config = [
//     'host'=>'localhost',
//     'port'=>'3306',
//     'dbname'=>'dairy',
//     'user'=>'root'
// ];

// $id = $_GET['id'];
//WHERE id = ?
// $query = "SELECT * FROM notes "; 
// $data = $db->query($query);//[$id]
// var_dump($data); 

// foreach($data as $d)
// {
//     echo "<li>". $d['body']."</li>";
// }

// $data1 =  implode(",", $data);
// foreach($data as $dd1)
// {
//     echo $dd1;
// }

