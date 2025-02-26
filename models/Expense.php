<?php
class Expense {
    public $id;
    public $category_id;
    public $amount;
    public $date;
    public $description;

    // Add expense
    public static function addExpense($pdo, $category_id, $amount, $date, $description) {
        $stmt = $pdo->prepare("INSERT INTO expenses (category_id, amount, date, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$category_id, $amount, $date, $description]);
    }

    // Get all expenses
    public static function getAllExpenses($pdo) {
        $stmt = $pdo->query("SELECT expenses.*, categories.name AS category_name FROM expenses JOIN categories ON expenses.category_id = categories.id");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Delete expense
    public static function deleteExpense($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM expenses WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Get expense by ID
    public static function getExpenseById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM expenses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Update expense
    public static function updateExpense($pdo, $id, $category_id, $amount, $date, $description) {
        $stmt = $pdo->prepare("UPDATE expenses SET category_id = ?, amount = ?, date = ?, description = ? WHERE id = ?");
        $stmt->execute([$category_id, $amount, $date, $description, $id]);
    }
}
?>
