<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home</title>
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

    $query = "SELECT * FROM `img_table`";
   ?>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section class="container">
    <form action="uploadImage.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="toUploadImg" required />
      <label for="imgTitle">Title</label>
      <input type="text" name="imgTitle" placeholder="Input the title of your image"/>
      <input type="submit" value="Upload File" name="submit" required />
    </form>
  <?php 
    if ($result = mysqli_query($con, $query)) {
      if (mysqli_num_rows($result) > 0) {
        echo '<a href="./imageTable.php" class="button" >Image Table</a>';
      }
    }
   ?>
  </section>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
