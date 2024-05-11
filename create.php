<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="img/icons8-hamburger-32.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dhi0fzjlBj+6n0J2DTbSxE+qB7j6bQzqrqZdAuPb3L9SPgd5auG8W1EQe8XzUdjzUFklvqWQc2GUtDpSTIzhfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Create</title>
</head>
<style>
    .ralfi-link a {
        text-decoration: none; /* Remove underline */
        color: #fff; /* Set color to white */
        }
</style>
<body>
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
        </div>
    </nav>
<?php
// Kas submit nuppu on vajutatud
require 'db_connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $hinnang = $_POST['hinnang'];
    $pilt = $_POST['pilt'];
    $comment = $_POST['comment'];
    $author = $_POST['author'];
    if (empty($hinnang)) {
        $hinnang = 'NULL';
    }
    if (empty($pilt)) {
        $pilt = 'NULL';
    }
    $sql = 'INSERT INTO blog_posts (restaurant, date, Hinnang, img, comment, Author) VALUES (:restaurant, :date, :hinnang, :img, :comment, :author)';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':restaurant', $name);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':hinnang', $hinnang);
$stmt->bindParam(':img', $pilt);
$stmt->bindParam(':comment', $comment);
$stmt->bindParam(':author', $author);

if ($stmt->execute()) {
    $success = true;
    $_POST = array();
} else {
    $success = false;
}
}
?>
<div class="row">
    
    <div class="col-md-8 mx-auto">
        
        <h2 class="text-center">Create - Tee uus sissekanne</h2>
 
        <?php
        // Siia tuleb kas roheline või punane teavitus kast lisamise kohta
        if(isset($success) and $success) {
            ?>
            <div class="alert alert-success">
                Sissekanne on tehtud tabelisse.
            </div>
            <?php
        } else if(isset($success) and !$success) {
            ?>
            <div class="alert alert-danger">
                Sissekanne ei saanud tehtud, tekkis tõrge.
            </div>
            <?php
        }
        ?>
 
        <form action="#" method="post">
            <div class="row mb-2">
                <label for="name" class="col-sm-2 form-label mt-1 fw-bold">Restorani nimi</label>
                <div class="col">
                    <input type="text" name="name" value="" id="name" class="form-control" required>
                </div>
            </div>
 
            <div class="row mb-2">
                <label for="date" class="col-sm-2 form-label mt-1 fw-bold">Kuupäev</label>
                <div class="col">
                    <input type="date" name="date" value="" value="<?php echo date("Y-m-d"); ?>" id="date" class="form-control" required>
                </div>
            </div>
 
            <div class="row mb-2">
                <label for="hinnang" class="col-sm-2 form-label mt-1 fw-bold">Hinnang</label>
                <div class="col">
                    <input type="text" min="0" max="10" step="1" name="hinnang" value="" id="salary" class="form-control">
                </div>
            </div>
 
            <div class="row mb-2">
                <label for="pilt" class="col-sm-2 form-label mt-1 fw-bold">Pilt</label>
                <div class="col">
                    <input type="text" name="pilt" value="" id="pilt" class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <label for="comment" class="col-sm-2 form-label mt-1 fw-bold">Märkused</label>
                <div class="col">
                    <input type="text" name="comment" value="" id="comment" class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <label for="text" class="col-sm-2 form-label mt-1 fw-bold">Autor</label>
                <div class="col">
                    <input type="text" name="author" value="" id="author" class="form-control">
                </div>
            </div>
 
            <div class="row mb-2">
                <div class="col">
                    <input type="submit" href="edits.php" name="submit" value="Lisa info" class="btn btn-success form-control">
                </div>
                <div class="col">
                    <button type="reset" class="btn btn-warning form-control">Reseti vorm</button>
                </div>
 
            </div>
        </form>
    </div>
</div>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>