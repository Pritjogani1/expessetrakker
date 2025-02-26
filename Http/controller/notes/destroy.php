<?php
//delete  note
use Core\App;
use Core\Database;
$heading = 'note';



$heading = 'note';
$db = App::resolve(Database::class);


$groupid = $_POST['groupid'] ?? null;


if (!$groupid) {
    die("Error: Group ID is required.");
}



$db->query("DELETE FROM groups WHERE grp_id = :groupid", [
    'groupid' => $groupid
]);

// Redirect back to the home page
header("Location: /");
exit();

// $pdo->prepare("DELETE FROM expense WHERE groupid = ?")->execute([$groupid]);
// $pdo->prepare("DELETE FROM `groups` WHERE grp_id = ?")->execute([$groupid]);





