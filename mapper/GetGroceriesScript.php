<?php

class GetGroceriesScript {
    public function getGroceries($link) {
        $query = "SELECT * FROM GROCERIES";
        $result = $link->query($query);
        return $result;
    }
}
