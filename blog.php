<?php
include 'db.php';
include_once 'Posts2_model.php';

$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);
session_start();

// Include and configure Smarty
require_once('/usr/share/php/smarty-4.3.4/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');

// --- START: Authentication and Session Logic ---
$user_data = [];

// Check for active user session first.
if (isset($_SESSION['user_data'])) {
    $user_data = $_SESSION['user_data'];
}

// If no active session, try to auto-login using the 'rememberMe' cookie.
if (empty($user_data) && isset($_COOKIE['rememberMe'])) {
    $remember_user = $_COOKIE['rememberMe'];

    // Retrieve user based on the rememberMe digest (Using mysqli_real_escape_string for safety)
    $safe_remember_user = mysqli_real_escape_string($db, $remember_user);
    $query = "SELECT * FROM users WHERE remember_digest = '$safe_remember_user' LIMIT 1";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Auto-login successful: Populate the session variable
        $_SESSION['user_data'] = [
            'id' => $user['id'],
            'username' => $user['name'],
            'email' => $user['email']
        ];
        
        $user_data = $_SESSION['user_data'];
    }
}

// Assign user data and rememberMe cookie status to Smarty
$smarty->assign('user_data', $user_data);
$smarty->assign('remember_user', $_COOKIE['rememberMe'] ?? NULL);
// --- END: Authentication and Session Logic ---


// Check if the micropost_id is set in the GET request (Edit mode)
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
    // New post mode
    $smarty->assign('blog', '');
    $smarty->assign('action', 'newblog_action.php');
}

// Display the form
$smarty->display('./templates/blog_template.tpl');

?>