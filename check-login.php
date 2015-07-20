<?php

require '../vendor/autoload.php';

session_id('BookAppOAuth');
session_start();

//Just a dummy logging
\file_put_contents(
    '/tmp/external-book-app.log',
    'check-login.php' . print_r($_POST, true) . print_r($_GET, true),
    FILE_APPEND
);

/**
 * Here we can do a username/password check on External Book App side,
 * and possibly do something with the $_GET['consumer_id']; which gets passed to this file.
 *
 * If External Book App username/password checks fine, we can proceed with OAuth.
 */

/* Some code here for username/password check on External Book App side */

/* Progressing further with OAuth */

$credentials = new \OAuth\Common\Consumer\Credentials(
    $_SESSION['oauth_consumer_key'],
    $_SESSION['oauth_consumer_secret'],
    $_SESSION['store_base_url']
);

$oauthClient = new OauthClient($credentials);

$requestToken = $oauthClient->requestRequestToken();

$accessToken = $oauthClient->requestAccessToken(
    $requestToken->getRequestToken(),
    $oauthVerifier,
    $requestToken->getRequestTokenSecret()
);

header('Location: ' . $_GET['callback_url']);
