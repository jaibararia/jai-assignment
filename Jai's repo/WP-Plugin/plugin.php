<?php
/*
  Plugin Name: Jai Form Plugin
  Plugin URI: ../WP-Plugin/plugin.php
  Description: To capture basic user information.
  Version: 1.0
  Author: Jai
 */

function formPlugin()
{
	$form_data ='';
	$form_data .= '<h2>Form Field</h2>';
	$form_data .= '<form method="post" action=". esc_url( $_SERVER['REQUEST_URI'] ) .">';

	$form_data .='<label for="your_name">Name</label>';
	$form_data .='<input type="text" name="your_name" class="form-control" placeholder="Enter your name" />';

	$form_data .='<label for="your_email">Email</label>';
	$form_data .='<input type="email" name="your_email" class="form-control" placeholder="Enter your email" />';	

	$form_data .='<label for="your_phone">Phone</label>';
	$form_data .='<input type="number" name="your_phone" class="form-control" placeholder="Enter your phone" />';	

	$form_data .='<label for="your_comments">Message</label>';
	$form_data .='<textarea name="your_comments" class="form-control" placeholder="enter your question"></textarea>';

	$form_data .= '<br /><input type="submit" name="form_submit" class="btn btn-md btn-primary" value="send yourinfo">';
	$form_data .= '</form>';

	return $form_data;
}
add_shortcode('FormPlugin','formPlugin');

function form_input()
{
	if(isset($POST['form_submit']))
	{
		$name = sanitize_text_field($_POST['your_name']);
		$email = sanitize_text_field($_POST['your_email']);
		$phone = sanitize_text_field($_POST['your_phone']);
		$comments = sanitize_textarea_field($_POST['your_comments']);

		$to = 'abc@gmail.com';
		$subject = 'subject';
		$message = ''.$name.'  '.$email.'  '.$phone.'  '.$comments;

		wp_mail($to,$subject,$message);
	}
}
add_action('wp_head','form_input');




?> 