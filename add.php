<?php
session_start();
include_once('conn.php');

if(isset($_POST['add'])){
    header('location: index.php');
    $database = new Connection();
    $db = $database->open();

    try{
        $stmt = $db->prepare("INSERT INTO members (firstname, lastname, address)
        VALUES (:firstname, :lastname, :address)");
        $_SESSION['message'] = ($stmt->execute(array(
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':address' => $_POST['address']
        ))) ? 'Member added successfully' : 'Something went wrong. Cannot add member';
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }
    //close connection
    $database->close();
}
else{
    $_SESSION['message'] = 'Fill up add form first';
}
?>
