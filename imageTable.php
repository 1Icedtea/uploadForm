<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Image Table</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php 
    include("connection.php");
?>
<script>
    <?php 
        if($_GET['uploadStatus'] == 'true') { 
            echo "alert('Image has been uploaded!')"; 
        };
     ?>
</script>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section class="container">
    <?php 
        $query = "SELECT * FROM `img_table`";
        if ($result = mysqli_query($con, $query)) {
            if (mysqli_num_rows($result) > 0) { 
                echo '<table class="u-full-width">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>File Name</th>';
                            echo '<th>Title</th>';
                            echo '<th>Action</th>';
                        echo '</tr>';
                    echo '</thead';
                echo '<tbody>';
                while ( $row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['file_name'].'</td>';
                        echo '<td>'.$row['img_title'].'</td>';
                        echo '<td>';
                        echo '<a href="viewImage.php?id=' . $row['id'] . '">View</a>';
                        echo '</td>';
                    echo '</tr>';
                 }
                 echo '</tbody>';
                 echo '</table';
            } else {
                echo "<h1>No record</h1>";  
            }
        }
    ?>
  </section>
  <a href="./index.php" class="button" >Home</a>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
