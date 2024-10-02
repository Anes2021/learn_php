<?php

include "../connect.php";


$username = filterRequest("user_name");
$email = filterRequest("user_email");
$password = filterRequest("user_pass");

try {
    $stmt = $con->prepare("INSERT INTO `users`(`user_name`, `user_pass`, `user_email`) VALUES (?,?,?)");
    $stmt->execute(array($username, $password, $email));
    $count = $stmt->rowCount();

    if ($count > 0) {
        // Return a JSON response indicating success
        echo json_encode([
            "status" => "successful",
            "username" => $username,
            "email" => $email,
            "password" => $password
        ]);
    } else {
        // Return a JSON response indicating failure
        echo json_encode([
            "status" => "failed",
            "username" => "Something went wrong!",
            "email" => "Something went wrong!",
            "password" => "Something went wrong!"
        ]);
    }
} catch (PDOException $e) {
    // Catch exceptions and return an error message
    echo json_encode([
        "status" => "failed",
        "message" => "An error occurred: " . $e->getMessage()
    ]);
}
