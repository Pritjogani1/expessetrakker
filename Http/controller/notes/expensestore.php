<?php
use Core\Validator;
use Core\Database;
use Core\App;

//what we have here is a form submission
$heading = 'My notes';

$db = App::resolve(Database::class);
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];


        $db->query("INSERT INTO expense (amount,description,date,groupid) VALUES (:amount,:description,:date,:groupid)", [
           
            'amount' => $_POST['amount'],
            'description' => $_POST['description'],
            'date' => $_POST['date'],
            'groupid' => $_POST['groupid'],
        ]);
       $totalamount = $db->query("SELECT SUM(amount) AS total_amount FROM expense;
");
        header("Location: /");
        die();
    
    }

