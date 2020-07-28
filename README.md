This is Jai Bararia Assignment.

Readme file

  Code Reviews

  1. Mongo DB should have password
  2. Disable the login popup because data is stored in cache.
  3. There should be ajax call instead of http.post and the server site would be more secure if it has https.
  4. In HTTP.Post the password is shown, it should be secure.
  5. Login details should be append.
  6. ConsumerKey: Meteor.settings.public.twitter.k, secret , all these things should be kept in .env or process.env files so web parsing will stop.
  7. In server/main.js and server/twitter.js this syntax should be written like this Meteor.startup( function() => { });  not like this "Meteor.startup(() => { });""
  8. And in lib folder file counts should be replace with count
  9. Not a vulnerability just a suggestion we can also use css and little bit html in it to change the front end.

Code Review Changes



/*client/main.js*/
import { Template } from 'meteor/templating';
import { ReactiveVar } from 'meteor/reactive-var';

import './main.html';

Template.hello.onCreated(function helloOnCreated() {
  // counter starts at 0
  this.counter = new ReactiveVar(0);
});

Template.hello.helpers({
  counter() {
    return Template.instance().counter.get();
  },
});

Template.hello.events({
  'click button'(event, instance) {
    const count = instance.counter.get() + 1
    // increment the counter when button is clicked
    instance.counter.set(count);

    // Send count to Meteor server
    Meteor.call("counts.set", Meteor.userId(), count, (error, result) => {
      if(error) {
        console.log("error", error);
      }
      if(result) {
        console.log('sent count to Meteor server');
      }
    });

    // // Send count to external server
    HTTP.post("http://secure.safe2choose.org?password=ldkjsadfasddfaa", { userId: Meteor.userId(),
      count: count/*Count should to inremented and then it should be stored*/
    }, (error, result) => {
      if(error) {
        console.log("error", error);
      }
      if(result){
        console.log('sent count to secure.safe2choose.org');
        /*The password is going to user machine*/
      }
    });

  },
});

/*counts-collection.js*/
Count = new Mongo.Collection("count");


WP-Plugin/plugin.php

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
