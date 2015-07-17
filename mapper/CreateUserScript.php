<?php
    class createUserScript {
        public function createUser($link, $first, $last, $username, $pass) {
            include '../connection/Regex.php';
            $regex          = new Regex();

            $firstName      = htmlspecialchars($first);
            $lastName       = htmlspecialchars($last);
            $email          = htmlspecialchars($username);
            $password       = htmlspecialchars($pass);

            if($regex->checkPassword($password)) {
                $date       = date("Y-m-d H:i:s");
                $salt       = md5($date);
                $hPassword  = md5($password.$salt);
                $query      = "INSERT INTO USER (first_name, last_name, email, password, salt) values (?, ?, ?, ?, ?)";

                if($stmt = $link->prepare($query)) {
                    $stmt->bind_param("sssss", $firstName, $lastName, $email, $hPassword, $salt);
                    if($stmt->execute()) {
                        $_SESSION["createUser"] = true;
                        header("Location: ../index.php");
                    } else {
                        $_SESSION["createUser"] = false;
                        var_dump($stmt->error);
                    }
                } else {
                    $_SESSION["error"] = mysqli_error();
                    var_dump($stmt->error);
                }
            } else {
                $_SESSION["passwordRequirements"] = false;
            }
            
        }
    }