<?php
require_once 'models/Expense.php';
require_once 'models/Category.php';

class ExpenseController {

    public function listExpenses($pdo) {
        $expenses = Expense::getAllExpenses($pdo);
        require 'views/expense_list.php';
    }

    public function showAddForm($pdo) {
        $categories = Category::getAllCategories($pdo);
        require 'views/expense_form.php';
    }

    public function addExpense($pdo) {
        $category_id = $_POST['category_id'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        Expense::addExpense($pdo, $category_id, $amount, $date, $description);
        header('Location: index.php');
    }

    public function deleteExpense($pdo, $id) {
        Expense::deleteExpense($pdo, $id);
        header('Location: index.php');
    }

    public function showEditForm($pdo, $id) {
        $expense = Expense::getExpenseById($pdo, $id);
        $categories = Category::getAllCategories($pdo);
        require 'views/expense_form.php';
    }

    public function updateExpense($pdo, $id) {
        $category_id = $_POST['category_id'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        Expense::updateExpense($pdo, $id, $category_id, $amount, $date, $description);
        header('Location: index.php');
    }
}
?>
