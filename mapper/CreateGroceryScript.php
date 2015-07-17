<?php
    class createGroceryScript {
        public function createGrocery($link, $name, $info) {

            $groceryName    = htmlspecialchars($name);
            $groceryInfo    = htmlspecialchars($info);

            $query          = "INSERT INTO GROCERIES (groceries_item_name, groceries_info) values (?, ?)";

            if($stmt = $link->prepare($query)) {
                $stmt->bind_param("ss", $groceryName, $groceryInfo);
                if($stmt->execute()) {
                    $_SESSION["createGrocery"] = true;
                } else {
                    $_SESSION["createGrocery"] = false;
                }
            } else {
                $_SESSION["error"] = mysqli_error();
                var_dump($stmt->error);
            }
        }
    }