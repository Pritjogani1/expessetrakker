<?php
use Core\Validator;
use Core\Database;
use Core\App;

//what we have here is a form submission

$heading = 'My notes';

$db = App::resolve(Database::class);
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];


if(!Validator::string($_POST['name'],1,1000))
{
  
    $errors['name'] = 'The body field is required and must be at least 1 character and no more than 10 characters';

}

if(!empty($errors)){
//validation issue
controller("index.php",[
        'errors' => $errors
    ]);

die();
}
    
        $db->query("INSERT INTO groups (name) VALUES (:name)", [
            'name' => $_POST['name'],
            
            
        ]);
        header("Location: /");
        die();
    
    }

