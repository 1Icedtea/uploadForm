<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Image Viewer</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/style.css">:

</head>
<body>
<?php 
    include("connection.php");
    $target_dir = "./uploads/";

?>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section class="container">
    <?php
       $imgID = $_GET['id'];
       $query = "SELECT * FROM `img_table` WHERE id = $imgID";
       if ($result = mysqli_query($con, $query)) { 
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h1>" . $row['img_title'] . '</h1>';
            echo '<img src="' . $target_dir . $row['file_name'] . '" alt="Image here" height="500px" width="500px"/>';
        }
    }
    ?>
    <div class="buttonContainer">
        <a href="./index.php" class="button"> Home </a>
        <a href="./imageTable.php" class="button"> Image Table </a>
    </div>
  </section>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
