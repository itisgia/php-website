<?php
  if($_POST){
    // var_dump($_POST["name"]);
    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $message = $_POST["message"];
    // $subscribe = $_POST["subscribe"];


    //extract() will automatically create the above variables from the form data array
    extract($_POST);
    // var_dump($name);
    $errors = array();


    //validation - must be in logical order
    if(!$name){
      array_push($errors, 'Please enter a name');
    } else if(strlen($name) < 2){
      array_push($errors, 'Please enter at least two characters for your name');
  } else if(strlen($name) > 30){
      array_push($errors, 'Your name cannot be more than 30 characters');
    }
    if (!$email) {
        array_push($errors, 'Please enter an email');
    }  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Please enter a valid email');
    }
    if (!$message) {
        array_push($errors, 'Please enter a message');
    } else if (strlen($message) < 2) {
        array_push($errors, 'Please enter at least two characters for your message');
    } else if (strlen($message) > 100) {
        array_push($errors, 'Your message cannot be more than 100 characters');
    }



if (empty($errors)) {
    $to = $email;
    $subject = 'email enquiry';
    $emailMessage = 'You have received an email';
    $emailMessage += $message;
    $headers = array(
				'From' => 'itisjiah@gmail.com',
				'Reply-To' => 'itisjiah@gmail.com',
				'X-Mailer' => 'PHP/'.phpversion()
			);

            mail($to,$subject,$emailSubject, $headers);
			header('Location: index.php');

}


    if (empty($errors)) {
      var_dump("All good");
    }
      // die();
  }
    $page = "contact";
      include("template/header.php");
    ?>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
          <div class="inner cover">
            <h1 class="cover-heading">How to contact us</h1>
            <p class="lead">Don't.</p>
            <?php
              if($_POST && !empty($errors)): ?>
                <div class="alert alert-danger" role="alert">
                  <ul>
                    <?php foreach($errors as $singleError): ?>
                      <li><?= $singleError; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
            <?php endif; ?>

            <?php
                if ($_POST && empty($errors)): ?>
                <div class="alert alert-success" role="alert">
                  <ul>
                      <li><?="Form submitted successfully";?></li>
                  </ul>
                </div>
            <?php endif;?>

            <!-- For PHP forms, inputs must have a name -->
            <form method="post" action="love.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <input type="text" class="form-control" name="message" placeholder="Enter message" value="<?php if(isset($_POST['message'])) { echo $_POST['message']; } ?>">>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input">
                <label for="subscribe" name="subscribe" class="form-check-label">Subscribe Me</label>
              </div>
              <button type="submit" class="btn btn-primary"> Submit </button>
            </form>
          </div>

          <?php
                include("template/footer.php");
          ?>
