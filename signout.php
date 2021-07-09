<?php 
session_start();
session_unset();
session_destroy();

function pageRedirect()
{
    if (getenv('JAWSDB_URL')) {
        $base_url = "https://kai-myblog.herokuapp.com";
    } else {
        $base_url = "http://" . $_SERVER['SERVER_NAME'] . "/myblog";
    }
    header("Location: $base_url/");
    exit();
}

pageRedirect();