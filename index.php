<?php

include 'db.php';
include_once 'Posts2_model.php';

$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);
session_start();

require_once('/usr/share/php/smarty-4.3.4/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');

// get current page from URL (?page=2)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 25;

// get paginated posts
$data = get_posts($db, $limit, $page);

// assign posts and pagination data to Smarty
$smarty->assign('posts', $data['posts']);
$smarty->assign('total_pages', $data['total_pages']);
$smarty->assign('current_page', $data['current_page']);

$user_data = [];

if (isset($_COOKIE['PHPSESSIONID'])) {
    $cookie_data = json_decode($_COOKIE['PHPSESSIONID'], true);
    if (is_array($cookie_data)) {
        $user_data = $cookie_data;
        $_SESSION['user_data'] = $user_data;

    }
}

if (empty($user_data) && isset($_COOKIE['rememberMe'])) {
    $remember_user = NULL;
    if (isset($_COOKIE['rememberMe'])) {
        $remember_user = $_COOKIE['rememberMe'];
        $query = "SELECT * FROM users WHERE remember_digest = '$remember_user' LIMIT 1";
        $result = mysqli_query($db, $query);

        // If user exists and remember_digest matches, auto-log them in
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Automatically log the user in by setting session data
            $_SESSION['user_data'] = [
                'id' => $user['id'],
                'username' => $user['name'],
                'email' => $user['email']
            ];
            $user_data = $_SESSION['user_data'];
        }
    }
}

$smarty->assign('user_data', $user_data);

$smarty->assign('remember_user', $_COOKIE['rememberMe'] ?? NULL);


// display template
$smarty->display('./templates/Posts2_Smarty.tpl');


?>
