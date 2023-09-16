<?php
session_start();

session_destroy();

print_r($_SESSION);

if(!$_SESSION) {
    print_r("세션없다");
    header('Location: /HackersPractice/index.php');
}
