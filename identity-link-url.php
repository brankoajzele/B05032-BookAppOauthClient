<?php

//Just a dummy logging
\file_put_contents(
    '/tmp/external-book-app.log',
    'identity-link-url.php' . print_r($_POST, true) . print_r($_GET, true),
    FILE_APPEND
);

$consumerId = $_GET['consumer_id'];
$callbackUrl = urlencode(urldecode($_GET['success_call_back']));

echo <<<HTML
<form method="post" action="check-login.php?consumer_id={$consumerId}&callback_url={$callbackUrl}">
    <p>External Book App Login</p>
    <input type="text" name="username" id="username" placeholder="Username">
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="submit" name="submit" value="Login">
</form>
HTML;
