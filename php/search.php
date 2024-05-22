<?php
require 'connection.php'; 

// inspired by https://www.stackoverflow.com/
try {
    // if query entered
    if (isset($_GET['q'])) {
        $q = $db->real_escape_string($_GET['q']);
        // search the db
        $sql = "
            SELECT poems.*, poets.name as poet_name 
            FROM poems 
            LEFT JOIN poets ON poems.poet_id = poets.id 
            WHERE poems.title LIKE '%$q%' OR poets.name LIKE '%$q%' OR poems.poem LIKE '%$q%'
        ";
        $res = $db->query($sql);

        if ($res) {
            $poems = [];
            while ($row = $res->fetch_assoc()) {
                $poems[] = $row;
            }

            $resp = [
                'count' => count($poems),
                'results' => $poems
            ];
            header('Content-Type: application/json');
            echo json_encode($resp);
        } else {
            throw new Exception("Query failed: " . $db->error);
        }
    } else {
        throw new Exception("Missing query parameter");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
