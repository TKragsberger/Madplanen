<?php

class GetUsersScript {
   public function getUsers($link) {
       $query = "SELECT * FROM USER";
       $result = $link->query($query);
       return $result;
   }
}
