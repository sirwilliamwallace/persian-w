<?php

// Enable error reporting for debugging inspired by https://www.stackoverflow.com/
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include 'connection.php';


// inspired by https://www.stackoverflow.com/
// Retrieve and validate input parameters
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$pagination = 6;
$offset = ($page - 1) * $pagination;


if ($id) {
    // Query to fetch a single poem by its ID
    $query = "SELECT poems.id, poems.title, poems.poem, poems.thumbnail, poets.name as poet_name 
              FROM poems 
              JOIN poets ON poems.poet_id = poets.id 
              WHERE poems.id = $id";
    $result = $db->query($query);

    // Check if the query returned any results
    if ($result->num_rows > 0) {
        $poem = $result->fetch_assoc();
        echo json_encode($poem);
    } else {
        echo json_encode(null);
    }
} else {
    // Query to fetch a paginated list of poems
    $query = "SELECT poems.id, poems.title, poems.poem, poems.thumbnail, poets.name as poet_name 
              FROM poems 
              JOIN poets ON poems.poet_id = poets.id 
              ORDER BY poems.id DESC 
              LIMIT $pagination OFFSET $offset";
    $result = $db->query($query);
    $poems = array();

    // Fetch and store each row of the result set
    while ($row = $result->fetch_assoc()) {
        $poems[] = $row;
    }

    // Query to get the total number of poems for pagination
    $pagesQuery = "SELECT COUNT(*) FROM poems";
    $res = $db->query($pagesQuery);
    $totalPage = ceil($res->fetch_row()[0] / $pagination);

    echo json_encode([
        'poems' => $poems,
        'total_pages' => $totalPage,
        'current_page' => $page
    ]);
}
?>
