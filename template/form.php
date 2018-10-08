<!-- post  usually use post-->
<!-- get : people get see. for serach form. serach data base -->
<!-- enctype="multipart/form-data" IF you don't include it, whatever i,age, videos are not going to be uploaded-->

<?php
// we want to precess, validate and send
// pr render like normal
//$_GET /get mothod

//if post array exist
    if ($_POST) {
            var_dump($POST);
            die();

    }



 ?>
<form class="form-horizontal" method="post" action="love.php" enctype="multipart/form-data">
    <h2>Contact us about your query</h2>
  <div class="form-group">
    <label for="exampleInputName2">Name</label>
    <input type="text" class="form-control" name = "name" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">Email</label>
    <input type="email" class="form-control" name ="email" id="exampleInputEmail2" placeholder="Enter E-mail">
  </div>
  <div class="form-group ">
    <label for="exampleInputText">Your Message</label>
   <textarea  class="form-control"  name = "message"placeholder="Description"></textarea>
  </div>
  <button type="submit" name ="submit"class="btn btn-default">Send Message</button>
</form>
