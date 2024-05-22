<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $pid = $_POST['poem_id'];
    $title = $_POST['title'];
    $poet = $_POST['poet'];
    $poem = $_POST['poem'];
    $poet_id = null;

    $pq = "SELECT id FROM poets WHERE name=?";

    $stmt = $db->prepare($pq);
    $stmt->bind_param("s", $poet);

    $stmt->execute();

    $res = $stmt->get_result();
    // if the poet is same set the poet id to it 
    if ($res->num_rows > 0) {
        $prow = $res->fetch_assoc();
        $poet_id = $prow['id'];
    } else {
        // if not add the poet to db
        $ipq = "INSERT INTO poets (name) VALUES (?)";
        $stmt = $db->prepare($ipq);
        $stmt->bind_param("s", $poet);
        $stmt->execute();
        $poet_id = $stmt->insert_id;
    }
    // update the db with the new info
    $stmt = $db->prepare("UPDATE poems SET title = ?, poet_id = ?, poem = ? WHERE id = ?");
    $stmt->bind_param("sisi", $title, $poet_id, $poem, $pid);

    if ($stmt->execute()) {
        echo "Poem updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
