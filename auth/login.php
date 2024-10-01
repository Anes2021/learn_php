<?php

header('Content-Type: application/json'); // Set JSON response type

include "../connect.php";

$email = filterRequest("user_email");
$password = filterRequest("user_pass");

try {
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `user_pass` = ? AND `user_email` = ?");
    $stmt->execute(array($password, $email));
    $count = $stmt->rowCount();

    if ($count > 0) {
        // Return a JSON response indicating success
        echo json_encode(array(
            "status" => "successful",
        ));
    } else {
        // Return a JSON response indicating failure
        echo json_encode(array(
            "status" => "failed",
            "message" => "Incorrect email or password."
        ));
    }
} catch (PDOException $e) {
    // Catch exceptions and return an error message
    echo json_encode([
        "status" => "failed",
        "message" => "An error occurred: " . $e->getMessage()
    ]);
}
?>
