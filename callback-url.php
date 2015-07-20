<?php

session_id('BookAppOAuth');
session_start();

//Just a dummy logging
\file_put_contents(
    '/tmp/external-book-app.log',
    'callback-url.php' . print_r($_POST, true) . print_r($_GET, true),
    FILE_APPEND
);

//Store oauth credentials into session for next step of 2-legged Oauth handshake
$_SESSION['oauth_consumer_key'] = $_POST['oauth_consumer_key'];
$_SESSION['oauth_consumer_secret'] = $_POST['oauth_consumer_secret'];
$_SESSION['store_base_url'] = $_POST['store_base_url'];
$_SESSION['oauth_verifier'] = $_POST['oauth_verifier'];

session_write_close();

header('HTTP/1.0 200 OK');
