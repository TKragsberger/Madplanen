<?php
    class Regex {
        public function checkPassword($password) {
            $patterns = array(
                "~^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$~"
//                "~[\[\]\^\$\.\|\?\*\+\(\)\\\~`\!@#%&\-_+={}'".'"<>:;,]{1,}~'
            );
            foreach($patterns as $pattern){
                if(!preg_match($pattern, $password)){
                    return false;
                }
            }
        return true;
        }
    }