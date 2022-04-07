<?php
  // Check if the User Coming from a Request

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Assign Variables

     $user = filter_var($_POST['username'] , FILTER_SANITIZE_STRING) ;
     $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL) ;
     $cell = filter_var($_POST['phone'] , FILTER_SANITIZE_NUMBER_INT) ;
     $msg = filter_var($_POST['message'] , FILTER_SANITIZE_STRING) ;


    // Creating Errors Array
     
     $formErrors = array() ;
     
     if (strlen($user) <= 3) {
        
        $formErrors[] = 'username must be larger than <strong>3</strong> characters' ;

     }

     if (strlen($cell) != 10) {
        
        $formErrors[] = 'phone must be <strong>10</strong> numbers' ;

     }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap5 cdn links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery cdn links -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- css file -->
  <link rel="stylesheet" href="css/style.css" >
  <!-- Javascript file -->
  <script src="js/script.js" ></script>

</head>
<body>
<!-- Start Form -->

    <div class="container">
        <h1 class='text-center' >Contact Us</h1>
        <form class='contact-form' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
        <?php  if (!empty($formErrors)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="start">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?php    
                foreach ($formErrors as $error) {  

                    echo $error."<br>";   
                }
        ?>
        </div>
        <?php }?>

        <div class="form-group">
          <input class="form-control" type="text" name="username" placeholder="Enter username" value="<?php if (isset($user)) { echo $user;} ?>">
          <i class="fa fa-user fa-fw"></i>
          <span class='star' >*</span>
          <div class="alert alert-danger custom-alert">
            Username must be larger than <strong>3</strong> characters
          </div>
        </div>

        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Enter email" value="<?php if (isset($email)) { echo $email;} ?>">
          <i class="fa fa-envelope fa-fw"></i>
          <span class='star' >*</span>
          <div class="alert alert-danger custom-alert">
            Message can't be <strong>empty</strong>
          </div>
        </div>
        
        <div class="form-group">
          <input class="form-control" type="text" name="phone" placeholder="Enter phone number" value="<?php if (isset($cell)) { echo $cell;} ?>">
          <i class="fas fa-phone-alt fa-fw"></i>
          <div class="alert alert-danger custom-alert">
            Phone must be <strong>10</strong> numbers
          </div>
        </div>

        <div class="form-group">
          <textarea class="form-control" placeholder="Enter your message" name="message"><?php if (isset($msg)) { echo $msg;} ?></textarea>
          <span class='star' >*</span>
          <div class="alert alert-danger custom-alert">
            Message can't be <strong>empty</strong>
          </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Send Message">
        <i class="fas fa-paper-plane fa-fw" id="send-icon"></i>
        </form>
    </div>

<!-- End Form -->

</body>
</html>