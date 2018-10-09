<?php
// phpinfo();
// die();
$errors = array();
// isset = it it exists
if(isset($_FILES["image"])) {
    // var_dump($_FILES["image"]);

    $fileSize = $_FILES["image"]["size"];
    $fileTmp = $_FILES["image"]["tmp_name"];
    $fileType = $_FILES["image"]["type"];

    // var_dump($fileSize);
    // var_dump($fileTmp);
    // var_dump($fileType);

    if ($fileSize >  5000000) {
        array_push($errors, "The file is so large, must be under 5MB");
    }

    //check to see if the image is the right type
    $validExtensions = array("jepg","jpg","png");
    $fileNameArray = explode("." , $_FILES["image"]["name"]); //re string it will find that point onece it fonds dot, break into array
    // ("filename", "jpg") <--results

    $fileExt = strtolower(end($fileNameArray));

 // doing for loop for us
    if (in_array($fileExt, $validExtensions) === false) {
        array_push($errors, "File type not valid, can only be a jpg or png");
    }


    $destination = "images/upload";

    //If destination doesn't exits
    if (! is_dir($destination)) {
        mkdir("images/upload/" , 0777, true);
    }

    $newFileName = uniqid() .".". $fileExt;
    move_uploaded_file($fileTmp, $destination."/".$newFileName);


    die();

}





$page = "Image";
$dec = "";
require("template/header.php");


?>

<main>
    <!-- <form action="about.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Upload an image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="button" class="btn btn-outline-light btn-block" name="button">Submit</button>
    </form> -->

    <form action="about.php" method="post" enctype="multipart/form-data">
        <label>Upload An Image</label>
        <input type="file" name="image" />
        <input type="submit" name="upload"/>
    </form>
</main>


<?php require("template/footer.php"); ?>

  </body>
  <?php require("template/script.php"); ?>
</html>
