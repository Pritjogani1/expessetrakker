<?php
class Category {
    public $id;
    public $name;

    // Get all categories
    public static function getAllCategories($pdo) {
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
