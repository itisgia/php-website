<?php

// include("template/header.php"); it's not too big of a deal then use include method

//require() means if it cant find a file, Don't run it. Die

$page = "home";

$dec = "";

require("template/header.php");


 ?>

 <main role="main" class="inner cover">
   <h1 class="cover-heading">Home page.</h1>
   <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
   <p class="lead">
     <a href="feature.php" class="btn btn-lg btn-secondary">Learn more</a>
   </p>
 </main>
 <?php
 require("template/footer.php");

 ?>

  </body>
</html>
