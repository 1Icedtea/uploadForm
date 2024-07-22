<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Upload Image</title>
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
    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($_FILES["toUploadImg"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $fileName = basename($_FILES['toUploadImg']['name']);
    $imgTitle = $_POST['imgTitle'];
    $uploadOK = true;
    // $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

?>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section class="container">
    <?php
        
       if(isset($_POST['submit'])) {
            echo '<p>Image tite</p>';
            echo '<h1>' . $imgTitle . '</h1><br />';
            echo '<pre>';

            if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") { 
                echo "<h6>Please upload a valid image. E.g: JPG, JPEG, PNG</h6>";
                $uploadOK = false;
             }

            if ($uploadOK == false) {
                echo "<h6>File upload failed, please check your file type.</h6>";
            } else {

                if (move_uploaded_file($_FILES['toUploadImg']['tmp_name'], $target_file)) {
                    echo "File is valid, and was successfully uploaded.\n";
                } else {
                    echo "Possible file upload attack!\n";
                    echo 'Here is some more debugging info:';
                    print_r($_FILES);
                }
                
                $sql = "INSERT INTO `img_table` (`file_name`, `img_title`) VALUES ('$fileName', '$imgTitle')";
                if($con->query($sql)) { 
                    $newUrl = './imageTable.php?uploadStatus=true';
                    header("Location: " . $newUrl);
                } else {
                    echo "Error: " . $sql . mysqli_error($con);
                }
            }
            
            print "</pre>";
            
        }
    ?>
    <a href="./index.php" class="button">Home</a>
  </section>


<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
