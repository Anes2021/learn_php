<?php

include "../connect.php";

//we use filterRequest Function for SECURITY "i made it in function.php file using htmlspecialchars, and we also use $_POST methode becuase it is more secure"

    $username = filterRequest("user_name");
    $email = filterRequest("user_email");
    $password = filterRequest("user_pass");

    $stmt = $con->prepare("INSERT INTO `users`(`user_name`, `user_pass`, `user_email`) VALUES (?,?,?)");
    $stmt->execute(array($username, $password, $email));    
    $count =$stmt->rowCount();

    if($count > 0) {
        echo "user added!";
    }else {
        echo "something went wrong!";
    }
