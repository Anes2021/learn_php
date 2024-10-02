<?php

header('Content-Type: application/json'); 

include "../connect.php";

$email = filterRequest("user_email");
$password = filterRequest("user_pass");

try {
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `user_pass` = ? AND `user_email` = ?");
    $stmt->execute(array($password, $email));
    $count = $stmt->rowCount();

    if ($count > 0) {

        //generate random token bytes
        $token = bin2hex(random_bytes(32));
        //set expiration time after 2 days
        $expiry_date = date('Y-m-d H:i:s', strtotime('+2 days'));

        //store token informatoin in sessions table
        $tokenStmt = $con->prepare("INSERT INTO `sessions`(`token`, `user_email`, `expiry_date`) VALUES (?, ?, ?)");
        $tokenStmt->execute(array($token, $email, $expiry_date));

        //send token to flutter in the response header
        header('Authorization: Bearer ' . $token);

        //response status
        echo json_encode(array(
            "status" => "successful",
        ));
    } else {
        echo json_encode(array(
            "status" => "failed",
            "message" => "Incorrect email or password."
        ));
    }
} catch (PDOException $e) {
    echo json_encode([
        "status" => "failed",
        "message" => "An error occurred: " . $e->getMessage()
    ]);
}
?>
