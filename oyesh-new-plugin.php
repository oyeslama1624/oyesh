<?php
/**
 * plugin Name: Oyesh Codewing
 * Description: This is just an example plugin
 **/

       function oyesh_example_function()
 {
    $content = "<div>This is a very basic plugin practise for collecion of normal contact details of an individual.";

    $content .="<h1>DETAILS</H1>";
    $content .="<p>This is the  data record of the individuals. </p></div>";

     return $content;
 }
 add_shortcode('example','oyesh_example_function');


 function oyesh_admin_menu_optional()
  {
    add_menu_page ('Header & Footer Scripts','Site Scripts','manage_options','oyesh-admin-menu','oyesh_scripts_page','',200);
  }

   add_action('admin_menu','oyesh_admin_menu_optional');
  
   function oyesh_scripts_page()
   {

     if(array_key_exists('submit_scripts_update',$_POST))
     {
      update_option('oyesh_header_scripts',$_POST['header_scripts']);
      update_option('oyesh_footer_scripts',$_POST['footer_script']);

      ?>
      <div id="setting-error-setting-updated" class="updated_settings_error notice is_dismissable"><strong>sw=ettings have been saved</strong></div>

      <?php


     }

      $header_scripts = get_option('oyesh_header_scripts','none');
      $footer_scripts = get_option('oyesh_footer_scripts','none');
   
   
   ?>
      <div class="wrap">
        <h2>Update Scripts </h2> 
        <form method="post" action="">
        <label for="header_scripts">Header Scripts</label>
        <textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>
        <label for="footer_scripts">Footer Scripts</label>
        <textarea name="footer_script" class="large-text"><?php print $footer_scripts; ?></textarea>
        <input type="submit" name="submit_scripts_update" class="button buttton-primary" value="UPDATE SCRIPTS">
      </form>

     </div>
   <?php
   }

    function oyesh_display_header_scripts()
    {
      $header_scripts = get_option('oyesh_header_scripts','none');

      print $header_scripts;
    }
    add_action('wp_head','oyesh_display_header_scripts');

    function oyesh_display_footer_scripts()
    {
      $footer_scripts = get_option('oyesh_footer_scripts','none');
      print $footer_scripts;
    }
     add_action('wp_footer','oyesh_display_footer_scripts');

     function oyesh_form()
     {
      /* content variable  */
      $content ='';
     $content .='<form method="post" action="http://oyesh.local/thankyou/">';

       $content .='<input type="text" name="Full_Name" placeholder="Your Full Name" />';
       $content .='<br/>';

       $content .='<input type="text" name="email_address" placeholder="Email Address" />';
       $content .='<br/>';

       $content .='<input type="text" name="Phone_Number" placeholder="Phone Number" />';
       $content .='<br/>';

       $content .='<input type="text" name="Address" placeholder="Address" />';
       $content .='<br/>';

       $content .='<input type="text" name="Date_of_Birth" placeholder="Date of Birth" />';
       $content .='<br/>';

       $content .='<input type="text" name="Profession" placeholder="Profession" />';
       $content .='<br/>';

       $content .='<textarea name="comments" palceholder="Give us your comments"></textarea>';
       $content .='<br/>';

       $content .= '<input type="submit" name="oyesh_submit_form" value="CLICK TO SUBMIT YOUR INFORMATION"/>';
       $content .='</form>';
      


      $content .='</form>';
      return $content;
    }
    add_shortcode('oyesh_contact_form','oyesh_form');

    function oyesh_form_capture()
    {
      if(array_key_exists('oyesh_submit_form',$_POST))
      {
        $to ="oyeslama@gmail.com";
        $subject = "Oyesh is Example Site for Form Submission";
        $body ='';

        $body .= 'Name: '.$_POST['full_name'].'<br />';
        $body .= 'Email: '.$_POST['email_address'].'<br />';
        $body .= 'Phone: '.$_POST['phone_number'].'<br />';
        $body .= 'Comments: '.$_POST['comments'].'<br />';
        $body .= 'Address: '.$_POST['Address'].'<br />';
        $body .= 'Date of Birth: '.$_POST['Date of Birth'].'<br />';
        $body .= 'Profession: '.$_POST['Profession'].'<br />';
 


        

        wp_mail($to,$subject,$body);

        

       }


    }
    add_action('wp_head','oyesh_form_capture');





 ?>
