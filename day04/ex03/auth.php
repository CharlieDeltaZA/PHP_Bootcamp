<?php
    function auth($login, $passwd) {
        $contents = unserialize(file_get_contents("../private/passwd"));
        foreach ($contents as $current => $user) {
            if ($user['login'] === $login && $user['passwd'] === hash("whirlpool", $passwd)) {
                return True;
            }
        }
        return False;
    }
?>
