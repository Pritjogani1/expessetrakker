<?php
use Core\Validator;
use Core\Database;
use Core\App;





$error = $errors ?? null;
//what we have here is a form submission
$heading = 'My notes';

$db = App::resolve(Database::class);

    
   $groups = $db->query("select * from  groups")->get();
   $expenses = $db->query("select * from  expense")->get();
 $CURRENT_DATE = date('d-m-y');


$totalamount = $db->query("SELECT SUM(amount) AS total_amount FROM expense")->get();
$monthlyamount = $db->query("SELECT SUM(amount) AS total_expense
FROM expense
WHERE MONTH(date) = MONTH(CURRENT_DATE) AND YEAR(date) = YEAR(CURRENT_DATE);
")->get();
 
$highestamount = $db->query("SELECT MAX(amount) AS highest_expense
FROM expense
WHERE MONTH(date) = MONTH(CURRENT_DATE) AND YEAR(date) = YEAR(CURRENT_DATE);
")->get();
if($totalamount[0]['total_amount'] == null){
    $totalamount[0]['total_amount'] = 0;
}

if($monthlyamount[0]['total_expense'] == null){
    $monthlyamount[0]['total_expense'] = 0;
}

if($highestamount[0]['highest_expense'] == null){
    $highestamount[0]['highest_expense'] = 0;
}
   if($error == null)
   {
       $error = [];
   }
   else{
       $error = $error;
   }


 view("index.view.php",[
   'totalamount' => $totalamount[0]['total_amount'],
    'groups' => $groups,
    'expenses' => $expenses,
    'monthlyamount' => $monthlyamount[0]['total_expense'],
    'highestamount' => $highestamount[0]['highest_expense'],
    'errors' => $error
    
 ]);

?>