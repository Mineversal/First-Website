<?php

session_start();
session_unset();
session_destroy();
setcookie("name", "");
header('Location: '.$uri.'/admin/');

?>