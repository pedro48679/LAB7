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
if (!empty($_POST['blog_content'])) {
    $blog_content = mysqli_real_escape_string($db, $_POST['blog_content']); // Sanitize input

    // Get the user_id from cookie
    $user_id = $user_data['id'];

    // Insert new post into the database
    $insert_query = "INSERT INTO microposts (content, user_id, created_at, updated_at) 
                     VALUES ('$blog_content', $user_id, NOW(), NOW())";
    
    if (mysqli_query($db, $insert_query)) {
        $_SESSION['message_type'] = 3;
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

