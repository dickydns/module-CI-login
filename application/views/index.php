<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MVP</title>
  <link rel="stylesheet" type="text/css" href="<?php  echo base_url().'assets/css/loginStyle.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php  echo base_url().'assets/css/bootstrap.min.css'; ?>">

</head>
<body>
  <div id="wrapped">
    <div class="login-page">
      
      
      <div class="form">

        <?php $this->load->view('partials/error'); ?>
        <?php $attributeRegister = array('class' => 'register-form'); echo form_open('Authentication/register', $attributeRegister); ?>
          <input type="text" name="username" placeholder="Username" maxlength="30" required/>
          <input type="password" name="password" id="password" placeholder="Password" maxlength="20" required/>
          <input type="password" name="confirm" id="confirm_password" placeholder="Confirm Password" maxlength="20" required/>

          <button type="submit">create</button>
          <p class="message">Already registered? <a href="#">Sign In</a></p>
        <?php echo form_close(); ?>


        <?php $attributeLogin= array('class' => 'login-form'); echo form_open('Authentication/signIn', $attributeLogin); ?>
          <input type="text" placeholder="Username" name="username" maxlength="30" required/>
          <input type="password" placeholder="Password" name="password" maxlength="20" required/>
          <button>login</button>
          <p class="message">Not registered? <a href="#">Create an account</a></p>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php  echo base_url().'assets/js/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?php  echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>

  <script type="text/javascript">
  $('.message a').click(function(){
       $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
   });
  </script>
  <script type="text/javascript">
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>
</body>
</html>
<!-- by dicky perdian -->