<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="img/icons8-hamburger-32.png" type="image/png">
    <title>info muutmine</title>
    <style>
        body {
            margin: 0;
        }
        /* Gradient background color */
        .gradient-background {
            background: linear-gradient(to bottom, #4CAF50, #2E7D32);
            padding: 20px; /* Adjust padding as needed */
            text-align: center;
            color: white;
        }

        /* Basic CSS for banner */
        .ralfi-link a {
        text-decoration: none; /* Remove underline */
        color: #fff; /* Set color to white */
        }

        /* Style for links */
        .banner a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Style for hover effect on links */
        .banner a:hover {
            text-decoration: underline;
        }

        .bottom-banner {
            background-color: #333;
            color: #fff;
            padding: 6px;
            text-align: center;
            display: flex;
            bottom: 0; /* Stick to the bottom */
            right: 0;
            left: 0;
            border: 1px solid white; /* Add top border */
            align-items: center;
            justify-content: space-between;
        }

        /* Style for links */
        .bottom-banner a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Style for hover effect on links */
        .bottom-banner a:hover {
            text-decoration: underline;
        }

        .container {
            display: flex;
            position: relative;
            flex-direction: column;
            background-color: lightgrey;
            flex-grow: 1; 
            min-height: 100vh;
            min-width: 100%;
        }
        .image {
            justify-items: right;
            position: absolute;
            border-radius: 200px;
            max-width:201px;
            max-height:251px;
            width: auto;
            height: auto;
            top: 145px;
            right: 20px;
            transform: translateY(-50%); /* Adjust for centering vertically */
        }
        
        @media screen and (max-width: 768px) {
            .image {
                max-width: calc(100% - 40px); /* Adjust max-width to fit within the available space */
                right: 20px; /* Adjust right position to create some spacing */
                left: 20px; /* Adjust left position to center the image horizontally */
                transform: translateY(-50%);
            }
        }
        .name-label {
            position: sticky; /* Position the label relative to its container */
            top: 20px; /* Adjust top position as needed */
            width: 1300px;
            margin-top: 8px;
            display: inline-block;
            background-color: lightblue; /* Background color for the entire label */
            border-radius: 20px; /* Rounded corners */
            padding: 5px 10px; /* Padding to create space around the text */
        }

        .label-text {
            color: white; /* Text color for the "Name:" section */
            font-weight: bold; /* Bold font weight */
            padding: 2px;
            margin: 5px;
        }

        .name {
            color: black; /* Text color for the name */
            margin-left: 5px;
        }
        .navbar-collapse {
            border-top: none; /* Remove border at the top */
        }

    </style>
</head>
<body>

<?php
require_once 'db_connection.php';

if(isset($_GET['ids']) && is_numeric($_GET['ids'])) {
    // DELETE query with a parameterized statement
    $sql = 'DELETE FROM blog_posts WHERE id = :id';
    
    try {
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        // Bind the parameter
        $stmt->bindParam(':id', $_GET['ids'], PDO::PARAM_INT);
        // Execute the statement
        $stmt->execute();
        
        // Redirect to the appropriate page after successful deletion
        header('Location: edits.php');
        exit(); // Terminate script execution after redirection
    } catch(PDOException $e) {
        // Handle any errors that occur during deletion
        echo "Error deleting record: " . $e->getMessage();
        // Optionally, redirect the user to an error page or display a user-friendly message
        exit(); // Terminate script execution after error handling
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

    <div class="collapse" style="padding: 0px;" id="navbarToggleExternalContent" data-bs-theme="dark">
        <div class="bg-dark p-4">
          <h5 class="text-body-emphasis h4" style="display: inline-block; padding-right: 35px"><a style="text-decoration: none; color: #fff;" href="archive.php">Blogid</a></h5>
          <h5 class="text-body-emphasis h4" style="display: inline-block; padding-right: 35px"><a style="text-decoration: none; color: #fff;" href="contact.html">Kontakt</a></h5>
          <h5 class="text-body-emphasis h4" style="display: inline-block; padding-right: 35px"><a style="text-decoration: none; color: #fff;" href="edits.php">Muutmis</a></h5>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span><h5>Menu</h5>
            </button>
            <div class="ralfi-link">
                <h2 style="text-decoration: none; padding-right: 15px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><a href="index.php">RALFI BLOGS</a></h2>
              </div>
      </nav>
      <div class="container">
        <h1>Blogi Tabel</h1>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Restoran</th>
                <th>Kuupäev</th>
                <th>Hinnang</th>
                <th>pilt</th>
                <th>Märkused</th>
                <th>Autor/Kontakt info</th>
                <th>-/+</th>
              </tr>
            </thead>
            <tbody>                
              <!-- PHP code to fetch data from the database and populate the table -->
              <?php
              // the database connection file
              require 'db_connection.php';
              
              // SQL query to fetch data from the database table
              $sql = "SELECT * FROM blog_posts";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

              
              // Loop through the fetched data and display it in the table rows
              foreach ($result as $row) {
                              $formatted_date = date('d-m-Y', strtotime($row['date']));
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";
                  echo "<td>".$row['restaurant']."</td>";
                  echo "<td>".$formatted_date."</td>";
                  echo "<td>".$row['Hinnang']."</td>";
                  echo "<td>".$row['img']."</td>";
                  echo "<td>".$row['comment']."</td>";
                  echo "<td>".$row['Author']."</td>";
                  echo "<td>"?>
                  <div style="text-align: center;">
                   <a href="?page=&ids=<?php echo $row['id']; ?>" onclick="if (confirm('Kas oled kindel?')) { return true; } else { return false; }">
                  <i class="fa-solid fa-trash-can text-danger" title="Delete"></i>
                   </a>
                   <a class="nav-link" href="http://localhost/13.05.2024%20Blogile%20funktsionaalsus%20PDO/update-by-id.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pencil text-warning" title="Edit"></i></a>
                   <a class="nav-link" href="create.php"><i class="fa-solid fa-square-plus text-success" title="Create"></i></a>
                   </div>
                    <?php "</td>";
                  echo "</tr>";
              }
              ?>
              <!-- End of PHP code -->
            </tbody>
          </table>
        </div>
      </div>
    <div style="border-width:0px;" class="bottom-banner">
        <p style="font-size: 18px;"><strong>Asukoht</strong> <br>Eesti, kehtna </p>
        <p style="font-size: 18px;"><strong>Võta ühendust </strong><br> <a href="contact.html">Kontakt info</a></p>
        <p style="font-size: 18px;"><strong>Keeled</strong><br>Eesti, Inglise <br></p>
    </div>

    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
