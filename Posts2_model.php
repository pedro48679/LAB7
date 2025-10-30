<?php 

// get posts with pagination
function get_posts($db, $limit = 25, $page = 1)
{
    // make sure $page is a positive integer
    $page = max(1, (int)$page);
    $offset = ($page - 1) * $limit;

    // main query with LIMIT and OFFSET
    $query = "
        SELECT
            m.id AS micropost_id,
            m.content AS content,
            u.name AS name,             
            m.created_at AS created_at,
            m.updated_at AS updated_at,
            m.user_id AS user_id
        FROM microposts AS m
        LEFT JOIN users AS u
            ON m.user_id = u.id
        ORDER BY m.updated_at DESC
        LIMIT $limit OFFSET $offset
    ";

    if(!($result = @mysqli_query($db, $query))) {
        showerror($db);
    }

    // fetch posts into an array
    $posts = [];
    while ($post = mysqli_fetch_assoc($result)) {
        $posts[] = $post;
    }

    // get total number of posts (for pagination controls)
    $count_query = "SELECT COUNT(*) AS total FROM microposts";
    $count_result = mysqli_query($db, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $total_posts = (int)$count_row['total'];
    $total_pages = ceil($total_posts / $limit);

    // return posts + pagination info
    return [
        'posts' => $posts,
        'total_posts' => $total_posts,
        'total_pages' => $total_pages,
        'current_page' => $page
    ];
}

// Get a single post by micropost_id for editing
function get_post_for_edit($db, $micropost_id)
{
    // Escape the micropost_id to prevent SQL injection
    $micropost_id = (int)$micropost_id;

    // Query to get the specific post
    $query = "
        SELECT
            m.id AS micropost_id,
            m.content AS content,
            m.created_at AS created_at,
            m.updated_at AS updated_at,
            m.user_id AS user_id,
            u.name AS name
        FROM microposts AS m
        LEFT JOIN users AS u
            ON m.user_id = u.id
        WHERE m.id = $micropost_id
    ";

    if (!($result = @mysqli_query($db, $query))) {
        showerror($db);
    }

    // Fetch the post
    $post = mysqli_fetch_assoc($result);

    // Returns the post data if found, otherwise returns null
    return $post ? $post : null;
}


?>
