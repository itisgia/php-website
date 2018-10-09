<?php

// http://image.intervention.io/getting_started/installation
// include composer autoload
require 'vendor/autoload.php';
// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;


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




    if (empty($errors)) {

        $destination = "images/upload";

        //If destination doesn't exits
        if (! is_dir($destination)) {
            mkdir("images/upload/" , 0777, true);
        }

        $newFileName = uniqid() .".".  $fileExt;
        // move_uploaded_file($fileTmp, $destination."/".$newFileName);

        $manager = new ImageManager();

        $mainImage = $manager->make($fileTmp);
        $mainImage->save($destination."/".$newFileName, 100);


        $thumbnailImage = $manager->make($fileTmp);
        $thumDestination = "images/upload/thumnails";

        if (! is_dir($thumDestination)) {
            mkdir("images/upload/thumnails", 0777, true);
        }

        // make tmp file
        $thumnailImage = $manager ->make($fileTmp);

        // 300 width , height: null
        $thumnailImage->resize(300, null, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        //sav function has 2 properties. where and quality (100 means keep 100% quality)
        $thumnailImage->save($thumDestination."/".$newFileName , 100);



    }






}





$page = "Image";
$dec = "";
require("template/header.php");


?>

<main>
    <form method="post" action="about.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Upload an Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-outline-light btn-block">Submit</button>
    </form>
</main>


<?php require("template/footer.php"); ?>

  </body>
  <?php require("template/script.php"); ?>
</html>
