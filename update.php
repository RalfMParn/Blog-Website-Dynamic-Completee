<?php
// Include the database connection file
var_dump($_POST);
require_once 'db_connection.php';

// Check if post ID is provided via GET parameter
if (isset($_POST['submit'])) {

    $id = $_POST['sid'];
    $restaurant = $_POST['restaurant'];
    $date = $_POST['date'];
    $rating = $_POST['Hinnang'];
    $img = $_POST['img'];
    $comment = $_POST['comment'];
    $author = $_POST['author'];
    echo "ID: " . $id;
    $sql = 'UPDATE blog_posts SET
    restaurant = "' . $restaurant . '",
    date = "' . $date . '",
    Hinnang = "' . $rating . '",
    img = "' . $img . '",
    comment = "' . $comment . '",
    Author = "' . $author . '"
    WHERE id = ' . $id;

    // Prepare the statement
    $stmt = $conn->prepare($sql);

echo $sql; //TEST

    if ($stmt->execute()) {
        $success = true;
        $_POST = array();
        header("Location: edits.php"); // Redirect to edits.php
        exit(); // Terminate script execution after redirection
    } else {
        $success = false;
        echo "Update failed."; // Display error message if update fails
    }
}

// Check for success or failure
if (isset($success) && $success) {
    echo "Success"; // Display success message
} else {
    echo "Failure"; // Display failure message
}
