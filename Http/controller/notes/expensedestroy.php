<?php
//delete  note
use Core\App;
use Core\Database;
$heading = 'note';



$heading = 'note';
$db = App::resolve(Database::class);


$id = $_POST['id'] ?? null;


if (!$id) {
    die("Error: Group ID is required.");
}



$db->query("DELETE FROM expense WHERE id = :id", [
    'id' => $id
]);

// Redirect back to the home page
header("Location: /");
exit();

// $pdo->prepare("DELETE FROM expense WHERE groupid = ?")->execute([$groupid]);
// $pdo->prepare("DELETE FROM `groups` WHERE grp_id = ?")->execute([$groupid]);





