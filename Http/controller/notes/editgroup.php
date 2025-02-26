<?php



use Core\Database;
use Core\App;
use Core\Validator;
$heading = 'note';
$db = App::resolve(Database::class);
    $db->query("UPDATE groups SET  grp_id = :grp_id,name = :name where grp_id = :grp_id",[
        'grp_id' => $_POST['grp_id'],
        'name' => $_POST['name'],
        
    ]);
     header("Location: /");
     die();

