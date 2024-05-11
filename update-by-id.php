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
    .ralfi-link a {
        text-decoration: none; /* Remove underline */
        color: #fff; /* Set color to white */
        }
</style>
<?php
require 'db_connection.php';
// Kas ids on ja kas on number
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = substr($_GET['id'], -2);
    if(is_numeric($id)) {
        $sql = 'SELECT * FROM blog_posts WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Process the fetched data here
    }
}
?>
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
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
 
        <div class="col-sm-8">
            <h3 class="text-center">Update - Muuda tabeli kirjet</h3>
 
            <form action="update.php" method="POST">
                <div class="row mb-2">
                    <label for="restaurant" class="col-sm-2 form-label mt-1 fw-bold">Restorani nimi</label>
                    <div class="col">
                        <input type="text" name="restaurant" value="<?php echo $res[0]['restaurant']; ?>" id="restaurant" class="form-control" required>
                    </div>
                </div>
 
                <div class="row mb-2">
                    <label for="date" class="col-sm-2 form-label mt-1 fw-bold">Kuupäev</label>
                    <div class="col">
                        <input type="date" name="date" value="<?php if(isset($res[0]['date'])) {echo $res[0]['date'];} ?>" id="date" class="form-control" required>
                    </div>
                </div>
 
                <div class="row mb-2">
                    <label for="Hinnang" class="col-sm-2 form-label mt-1 fw-bold">Hinnang</label>
                    <div class="col">
                        <input type="text"  name="Hinnang" value="<?php echo $res[0]['Hinnang']; ?>" id="Hinnang" class="form-control">
                    </div>
                </div>
 
                <div class="row mb-2">
                    <label for="img" class="col-sm-2 form-label mt-1 fw-bold">Pilt</label>
                    <div class="col">
                        <input type="text" name="img" value="<?php if(isset($res[0]['img'])) {echo $res[0]['img'];} ?>" id="img" class="form-control">
                    </div>
                </div>
 
                <div class="row mb-2">
                    <label for="comment" class="col-sm-2 form-label mt-1 fw-bold">Märkused</label>
                    <div class="col">
                        <input type="text" name="comment" value="<?php if(isset($res[0]['comment'])) {echo $res[0]['comment'];} ?>" id="comment" class="form-control">
                    </div>
                </div>
 
                <div class="row mb-2">
                    <label for="author" class="col-sm-2 form-label mt-1 fw-bold">Autor</label>
                    <div class="col">
                        <input type="text" name="author" value="<?php if(isset($res[0]['Author'])) {echo $res[0]['Author'];} ?>" id="author" class="form-control">
                    </div>
                </div>
 
                <div class="row mb-2">
                    <div class="col">
                        <input type="hidden" name="sid" value="<?php echo $res[0]['id']; ?>">
                        <input type="submit" name="submit" value="Muuda andmeid" class="btn btn-warning form-control">                        
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-info form-control">Reseti vorm</button>
                    </div>
 
                </div>
 
            </form>
        </div>
 
        <div class="col-sm-2"></div>
    </div>
</div>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>