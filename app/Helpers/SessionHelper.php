<?php
// app/Helpers/SessionHelper.php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
}

function logout() {
    session_destroy();
    header('Location: /rms/user/login');
    exit;
}
?>
