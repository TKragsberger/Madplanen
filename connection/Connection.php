<?php
//    session_start();
    class Connection {
        public function getConnection() {
//            $dbHost     = 'localhost';
//            $user       = 'root';
//            $password   = '';
//            $db         = 'kragsberger_dk';
            $dbHost     = 'kragsberger.dk.mysql';
            $user       = 'kragsberger_dk';
            $password   = 'Noibti8280';
            $db         = 'kragsberger_dk';
            
            $conn       = new mysqli($dbHost, $user, $password, $db);
            return $conn;
        }
        
        public function closeConnection($conn) {
            if($conn->close)
                echo "Connection closed";
            else
                echo "Connection not closed";
        }
        
        public function login($link, $email, $pass) {
//            header_remove("Location");
            $username   = htmlspecialchars($email);
            $password   = htmlspecialchars($pass);
            $query      = 'SELECT user_id, first_name, last_name, password, salt FROM USER WHERE email = ?';
            if($stmt    = $link->prepare($query)){
                $stmt->bind_param("s", $username);
                if($stmt->execute()) {
                    $stmt->bind_result($userId, $firstName, $lastName, $passwordDB, $saltDB);
                    if($stmt->fetch()){
                        $hPassword  = md5($password.$saltDB);
                        if($hPassword === $passwordDB) {
                            $_SESSION["login"] = true;
                            $_SESSION["name"] = $firstName.' '.$lastName;
                            $_SESSION["userId"] = $userId;
                            header("Location: ../index.php");
                            return "success";
                        } else {

                            $_SESSION["wrongPasswordOrEmail"] = true;
                            header("Location: ../html/Login.php");
                            return "wrong password";
                        }
                    }
                } else {
                    $_SESSION["wrongPasswordOrEmail"] = true;
                    header("Location: ../html/Login.php");
                    return "wrong username";
                }

            } else {
                $_SESSION["Error"] = mysqli_error();
                header("Location: ../index.php");
                var_dump($stmt->error);
                return "error";
            }
        }
        
        public function logout($link) {
            session_unset();
//            session_destroy();
            header("Location: ../index.php");
        }
    }