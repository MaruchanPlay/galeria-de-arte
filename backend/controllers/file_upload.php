<?php
$target_dir = "../images/img_usuario/";
$target_file = "";
$uploadOk = 0;
if ($_FILES['foto']['error'] == 0) {

  $target_file = $target_dir . basename($_FILES['foto']['name']);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
//  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
      echo "File is not an image.";
    }
 // }

  // Check if file already exists
  if (file_exists($target_file)) {
    $uploadOk = 0;
    echo "Sorry, file already exists.";
  }

  // Check file size
  if ($_FILES["foto"]["size"] > 500000) {
    $uploadOk = 0;
    echo "Sorry, your file is too large.";
  }

  // Allow certain file formats
  //if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  //&& $imageFileType != "gif" ) {
  // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  // $uploadOk = 0;
  //}

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
      if ($opcion == 2) {
        if (unlink("../images/img_usuario/" . $_REQUEST['foto_actual'])) {
          echo "imagen borrada";
        } else {
          echo "No fue posible borrar la imagen";
        }
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}