<?php
// Include necessary files
include 'db.php';
include_once 'Posts2_model.php';

session_start();

// Connect to the database
$db = dbconnect($hostname, $db_name, $db_user, $db_passwd);

$user_data = [];

// Load cookie containing the user's data
if (isset($_COOKIE['PHPSESSIONID'])) {
    $user_data = json_decode($_COOKIE['PHPSESSIONID'], true);
    
    if (!is_array($user_data) || !isset($user_data['id'])) {
        $_SESSION['message_type'] = 4;
        header("Location: ./message.php");
        exit;
    }
} else {
    $_SESSION['message_type'] = 4;
    header("Location: ./message.php");
    exit;
}

// Get the blog content from the form submission
if (!empty($_POST['blog_content']) && isset($_POST['micropost_id'])) {
    $micropost_id = (int)$_POST['micropost_id'];
    $blog_content = mysqli_real_escape_string($db, $_POST['blog_content']); // Sanitize input

    // Check if the post exists and belongs to the current user
    $user_id = $user_data['id'];
    $check_post_query = "SELECT * FROM microposts WHERE id = {$micropost_id} AND user_id = {$user_id}";
    
    $result = mysqli_query($db, $check_post_query);

    if (mysqli_num_rows($result) === 0) {
        $_SESSION['message_type'] = 6;
        header("Location: ./message.php");
        exit;
    }

    // Update the post
    $update_query = "UPDATE microposts SET content = '$blog_content', updated_at = NOW() WHERE id = $micropost_id";
    if (mysqli_query($db, $update_query)) {
        $_SESSION['message_type'] = 5;
        header("Location: ./message.php");
        exit;
    } else {
        $_SESSION['message_type'] = 0;
        header("Location: ./message.php");
        exit;
    }
} else {
      $_SESSION['message_type'] = 6;
      header("Location: ./message.php");
      exit;
}
?>
