<?php
require_once 'config/db.php';
require_once 'controllers/ExpenseController.php';

$controller = new ExpenseController();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($action == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controller->addExpense($pdo);
    } else {
        $controller->showAddForm($pdo);
    }
} elseif ($action == 'edit') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controller->updateExpense($pdo, $_GET['id']);
    } else {
        $controller->showEditForm($pdo, $_GET['id']);
    }
} elseif ($action == 'delete') {
    $controller->deleteExpense($pdo, $_GET['id']);
} else {
    $controller->listExpenses($pdo);
}
?>
