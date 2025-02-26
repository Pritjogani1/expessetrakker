<?php



use Core\Database;
use Core\App;
use Core\Validator;
$heading = 'note';
$db = App::resolve(Database::class);

    $db->query("UPDATE expense SET groupid = :groupid, amount = :amount, description = :description, date = :date, id = :id where id = :id",[
        'groupid' => $_POST['groupid'],
        'amount' => $_POST['amount'],
        'description' => $_POST['description'],
        'date' => $_POST['date'],
        'id' => $_POST['id']
    ]);
     header("Location: /");
     die();

