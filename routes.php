<?php
// return   [
//     '/'=>'controller/index.php',
//     '/about'=>'controller/about.php',
//     '/contact'=>'controller/contact.php',
//     '/notes'=>'controller/notes/index.php',
//     '/notes/create'=>'controller/notes/create.php',
//     '/note'=>'controller/notes/show.php',

//     ];

$router->get('/','index.php');
$router->post('/groups','notes/store.php');
$router->post('/expense','notes/expensestore.php');

$router->post('/group','notes/destroy.php');
$router->post('/expensedestroy','notes/expensedestroy.php');

$router->patch('/expenseupdate','notes/updateexpense.php');
$router->patch('/editgroup','notes/editgroup.php');




