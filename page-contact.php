<?php
/**
 * Template Name: Contact Template
 **/
 //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);
get_header(); ?>
<header id="masthead" class="main-header" role="banner" <?php if (of_get_option('bipo_main_header_image')) : ?>style="background: url(<?php echo of_get_option('bipo_main_header_image', 'no entry'); ?>) no-repeat center center scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"<?php endif ?>>
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-sm-12">					
				<?php if (of_get_option('bipo_main_logo_image')) : ?>
					<h1>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo of_get_option('bipo_main_logo_image', 'no entry'); ?>" class="home-logo" alt="<?php if (of_get_option('bipo_band_name')) : ?><?php echo of_get_option('bipo_band_name', 'no entry'); ?><?php endif ?>"></a>
					</h1>
				<?php endif ?>						
			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
<?php require get_template_directory() . '/includes/nav.php'; ?>
<div class="main-content">	
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="main-content-inner col-md-8">

              <style type="text/css">
                .error{
                  padding: 5px 9px;
                  border: 1px solid red;
                  color: red;
                  border-radius: 3px;
                }

                .success{
                  padding: 5px 9px;
                  border: 1px solid green;
                  color: green;
                  border-radius: 3px;
                }

                form span{
                  color: red;
                }
              </style>

              <div id="respond">
                <?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="post">
				<div class="form-group">
                  <label for="name">Name: <span>*</span></label><input type="text" class="form-control" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
				</div>
				<div class="form-group">
                  <label for="message_email">Email: <span>*</span></label><input type="text" class="form-control" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
				</div>
				<div class="form-group">
                  <label for="message_text">Message: <span>*</span></label><textarea type="text" class="form-control" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
				</div>
				<div class="form-group">
                  <label for="message_human">Human Verification: <span>*</span> <input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label>
				</div>
				
                  <input type="hidden" name="submitted" value="1">
                  <button class="btn btn-grey btn-lg btn-block" type="submit"><i class="fa fa-headphones"></i> Submit</button>
                </form>
              </div>



			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			<div class="col-md-2"></div>
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php get_footer(); ?>