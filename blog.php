<?php
include 'db.php';
include_once 'Posts2_model.php';

$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);
session_start();

// Include Smarty
require_once('/usr/share/php/smarty-4.3.4/libs/Smarty.class.php');
$smarty = new Smarty();

// Configure Smarty directories
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');

// Connect to the database
$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);

// Initialize variables
$user_data = [];

// Load cookie containing the user's data
if (isset($_COOKIE['PHPSESSIONID'])) {
    $cookie_data = json_decode($_COOKIE['PHPSESSIONID'], true);
    if (is_array($cookie_data)) {
        $user_data = $cookie_data;
    }
}

// Assign variables to Smarty
$smarty->assign('user_data', $user_data);

// Check if the micropost_id is set in the GET request
if (isset($_GET['micropost_id']) && $_GET['micropost_id'] != '') {
    $micropost_id = $_GET['micropost_id'];

    // Fetch the specific post data for editing
    $post = get_post_for_edit($db, $micropost_id);

    if ($post === null) {
        echo "Post not found.";
        exit;
    }

    // Pass the post data to the template
    $smarty->assign('blog', $post['content']);
    $smarty->assign('action', 'updateblog_action.php');
    $smarty->assign('micropost_id', $micropost_id);

} else {
    // If micropost_id is not set, it's a new post
    $smarty->assign('blog', '');  // Empty post
    $smarty->assign('action', 'newblog_action.php');
}

$user_data = [];

if (isset($_COOKIE['PHPSESSIONID'])) {
    $cookie_data = json_decode($_COOKIE['PHPSESSIONID'], true);
    if (is_array($cookie_data)) {
        $user_data = $cookie_data;
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

// Display the form
$smarty->display('./templates/blog_template.tpl');

?>
