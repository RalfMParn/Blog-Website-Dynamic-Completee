<?php
$host = 'localhost';
$dbname = 'blog_posts';
$username = ''; 
$password = ''; 
  
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }

?>
