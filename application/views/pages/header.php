<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<img src="<?php echo base_url(); ?>public/images/logo1.jpg" alt="LOGO" style="width:40px; height:40px;margin-right: 30px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  
    <ul class="navbar-nav">
    <?php if($this->session->userdata('logged_in')): ?>
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>display_controller/display">userdata</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>course_controller/course">courseasign</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>coursedisplay_controller/display">coursedisplay</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>contactus_controller/contact_form">ContactUs</a>
      </li>
      <?php endif;?>
    </ul>

    <ul class="navbar-nav">
    <?php if(!$this->session->userdata('logged_in')): ?>
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">userdata</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">courseasign</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">coursedisplay</a>
      </li>
      <?php endif;?>
    </ul>

    <ul class="navbar-nav" style="margin-left: 600px;">
            <?php if(!$this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>user/registration"style="margin-left: 55px;">Singup</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>login_controller/login "style="margin-left: 55px;">Login</a>
                </li>
            <?php endif;?>

            <?php if($this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>login_controller/destroy"style="margin-left: 55px;">Logout</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>login_controller/loginpage"style="margin-left: 55px;">Login</a>
                </li> -->
            <?php endif;?>

    </ul>  
  </div>
</nav>
</body>
</html>