<?php
session_start();
include_once('conn.php');
if (isset($_GET['id'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $id = $_GET['id'];
        $sql = "DELETE FROM members WHERE id = '$id'";
        $_SESSION['message'] = ($db->exec($sql)) ? 'Member deleted successfully' : 'Something went wrong. Cannot delete member';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->close();
    header('location: index.php');
    exit();
} else {
    $_SESSION['message'] = 'Invalid member ID';
    header('location: index.php');
    exit();
}
?>