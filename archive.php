<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icons8-hamburger-32.png" type="image/png">
    <title>Blogid</title>
    <style>
        html, body {
            height: 100%;
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
            display:flex;
            min-width: 100%;
            flex-wrap: wrap;
	        justify-content: start ;
            flex-direction: row;
            padding: 10px; /* Add padding inside the container */
            background-color: lightgrey;
            flex-grow: 1; 
            min-height: 75vh;
            overflow: hidden;
        }

        .text {
            font-size: 16px; /* Adjust font size as needed */
            margin-top: auto;
        }

        .container_img {
            position: relative;
            max-width: 300px;
            margin-right: 20px; /* Add spacing between the elements */
            display:inline-block;
            margin-top: 10px;
            height: 100%;
            box-sizing: border-box;
            border-radius: 8px;
            padding: 5px;
            border: 2px solid #333; 
            background-color: darkcyan ;
            text-align: center;
            
            flex-wrap: wrap;
        }
        .image {
            border-radius: 8px; /* Rounded corners for the image */
            overflow: hidden; /* Ensure image stays within rounded borders */
        }

    </style>
</head>
<body>
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
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
    <div class="gradient-background">
        <h1>Blogi postitused</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed adipisci fugiat, excepturi praesentium voluptas consequuntur eaque, officiis modi facere sint nesciunt id, nulla obcaecati. Eius illum magni sequi ex perspiciatis.</p>
    </div>
    <div class="container">
        <!-- PHP code to fetch data from the database and populate the table -->
        <?php
              // Include the database connection file
              require 'db_connection.php';
              
              // SQL query to fetch data from the database table
              $sql = "SELECT * FROM blog_posts ORDER BY date DESC";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
              
              // Loop through the fetched data and display it in the table rows
              foreach ($result as $row) {
                $formatted_date = date('d-m-Y', strtotime($row['date']));

        echo '<div class="container_img">';
        echo '<div class="image">';
        echo '<img style="height: 175px; width: 300px;" src="' . $row['img'] . '" alt="' . $row['restaurant'] . '">';
        echo '</div>';
        echo '<p class="text"><strong><i>' . $row['restaurant'] . ', ' . $formatted_date . '</i></strong></p>';
        echo '<p>' . $row['comment'] . '</p>';
        echo '<p><strong>' . $row['Hinnang'] . '</strong></p>';
        echo '<p><strong><i>' . $row['Author'] . '</i></strong></p>';
        echo '</div>';
    }
    ?>


    </div>

    <div style="border-width:0px;" class="bottom-banner">
        <p style="font-size: 18px;"><strong>Asukoht</strong> <br>Eesti, kehtna </p>
        <p style="font-size: 18px;"><strong>Võta ühendust </strong><br> <a href="contact.html">Kontakt info</a></p>
        <p style="font-size: 18px;"><strong>Keeled</strong><br>Eesti, Inglise <br></p>
    </div>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
