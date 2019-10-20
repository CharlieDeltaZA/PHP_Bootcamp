<?php
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK") {
        if (!file_exists("../private")) {
            mkdir("../private");
        }
        if (!file_exists('../private/passwd')) {
            file_put_contents('../private/passwd', "");
        }
        $contents = unserialize(file_get_contents('../private/passwd'));
        if ($contents) {
            $check = 0;
            foreach ($contents as $current => $me) {
                if ($me['login'] === $_POST['login'])
                    $check = 1;
            }
        }
        if ($check) {
            echo "ERROR\n";
        } 
        else {
            $temp['login'] = $_POST['login'];
            $temp['passwd'] = hash('whirlpool', $_POST['passwd']);
            $contents[] = $temp;
            file_put_contents('../private/passwd', serialize($contents));
            echo "OK\n";
        }
    } 
    else {
        echo "ERROR\n";
    }
?>
