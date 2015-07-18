<?php

  //SMTP needs accurate times, and the PHP time zone MUST be set
  date_default_timezone_set('America/New_York');
  //require_once 'phpmailer/PHPMailerAutoload.php';
  require_once 'phpmailer/class.phpmailer.php';
  require_once 'phpmailer/class.smtp.php';
  include_once 'credentials.php';

  $subject = 'SHELTIE FOSTERING';
  $to_email = 'amanda@southcarolinasheltierescue.com';
  $to_name = 'Amanda';
  $from_email = 'webserver@southcarolinasheltierescue.com';
  $from_name = 'Fostering Application';
  $host = 'mail.southcarolinasheltierescue.com';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $homephone = $_POST['homephone'];
  $workphone = $_POST['workphone'];
  $occupation = $_POST['occupation'];
  $fulltime = $_POST['fulltime'];
  $owned_previously = $_POST['owned_previously'];
  $still_have_sheltie = $_POST['still_have_sheltie'];
  $last_dog = $_POST['last_dog'];
  $last_five_lost_pet = $_POST['last_five_lost_pet'];
  $last_five_vehicle = $_POST['last_five_vehicle'];
  $last_five_disease = $_POST['last_five_disease'];
  $last_five_explain = $_POST['last_five_explain'];
  $other_animals = $_POST['other_animals'];
  $people_at_residence = $_POST['people_at_residence'];
  $family_member_1_name = $_POST['family_member_1_name'];
  $family_member_1_age = $_POST['family_member_1_age'];
  $family_member_2_name = $_POST['family_member_2_name'];
  $family_member_2_age = $_POST['family_member_2_age'];
  $family_member_3_name = $_POST['family_member_3_name'];
  $family_member_3_age = $_POST['family_member_3_age'];
  $family_member_4_name = $_POST['family_member_4_name'];
  $family_member_4_age = $_POST['family_member_4_age'];
  $family_member_5_name = $_POST['family_member_5_name'];
  $family_member_5_age = $_POST['family_member_5_age'];
  $family_member_6_name = $_POST['family_member_6_name'];
  $family_member_6_age = $_POST['family_member_6_age'];
  $home_type = $_POST['home_type'];
  $rent_own = $_POST['rent_own'];
  $landlord_permission = $_POST['landlord_permission'];
  $yard_type = $_POST['yard_type'];
  $fenced_desc = $_POST['fenced_desc'];
  $home_during_day = $_POST['home_during_day'];
  $indoors_outdoors = $_POST['indoors_outdoors'];
  $sex_preference = $_POST['sex_preference'];
  $older_dog = $_POST['older_dog'];
  $family_aware = $_POST['family_aware'];
  $moving_soon = $_POST['moving_soon'];
  $allergic = $_POST['allergic'];
  $animal_control_regulations = $_POST['animal_control_regulations'];
  $home_visit = $_POST['home_visit'];
  $hear_about_scsr = $_POST['hear_about_scsr'];
  $previous_vets = $_POST['previous_vets'];

  if ($name != '' && $email != '' && $city != '' && $state != '' && $zip != '' && $homephone != '') {
    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = $host;
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 587;
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = $amanda_username;
    //Password to use for SMTP authentication
    $mail->Password = $amanda_password;
    //Set who the message is to be sent from
    $mail->setFrom($from_email, $from_name);
    //Set an alternative reply-to address
    $mail->addReplyTo($email, $name);
    //Set who the message is to be sent to
    $mail->addAddress($to_email, $to_name);
    //Set the subject line
    $mail->Subject = $subject;
    //Construct the message body
    $message_alt = "1.  Name: ".$name."\n"
      ."2.  Email: ".$email."\n"
      ."3.  Address: ".$street." ".$city.", ".$state." ".$zip."\n"
      ."4.  Phone(H): ".$homephone."\n"
      ."5.  Phone(W): ".$workphone."\n"
      ."6.  Occupation: ".$occupation."\n"
      ."7.  Full-Time: ".$fulltime."\n"
      ."8.  Have you ever owned a Sheltie before?: ".$owned_previously."\n"
      ."9.  And if so, do you still have that dog?: \n".$still_have_sheltie."\n"
      ."10. What happened to your last dog?: \n".$last_dog."\n"
      ."11. During the last five years, have you had a pet become lost or stolen?: ".$last_five_lost_pet."\n"
      ."12. During the last five years, have you had an animal killed by a vehicle?: ".$last_five_vehicle."\n"
      ."13. During the last five years, have you had an animal die due to disease?: ".$last_five_disease."\n"
      ."14. If you answered yes to any of the the previous three questions, please explain: \n".$last_five_explain."\n"
      ."15. Do you have any other animals? (name, type, age, sex, neutered/spayed): \n".$other_animals."\n"
      ."16. How many people live at your place of residence?: ".$people_at_residence."\n"
      ."16.a  Name: ".$family_member_1_name."  -  Age: ".$family_member_1_age."\n"
      ."16.b  Name: ".$family_member_2_name."  -  Age: ".$family_member_2_age."\n"
      ."16.c  Name: ".$family_member_3_name."  -  Age: ".$family_member_3_age."\n"
      ."16.d  Name: ".$family_member_4_name."  -  Age: ".$family_member_4_age."\n"
      ."16.e  Name: ".$family_member_5_name."  -  Age: ".$family_member_5_age."\n"
      ."16.f  Name: ".$family_member_6_name."  -  Age: ".$family_member_6_age."\n"
      ."17. Do you live in a house, apartment, condo, or trailer?: ".$home_type."\n"
      ."18. Do you rent or own?: ".$rent_own."\n"
      ."19. If you rent, do you have the landlords permission to keep a dog? (If so, list landlord's name and phone number): \n".$landlord_permission."\n"
      ."20. Is your yard fenced?: ".$yard_type."\n"
      ."21. If your yard is fenced, describe type and height of fencing. If your yard is not fenced, describe how you will address an adopted dog's bathroom/exercise needs: \n".$fenced_desc."\n"
      ."22. Do all family adults work and is someone home during the day? (Please explain): \n".$home_during_day."\n"
      ."23. Do you intend to keep this dog primarily indoors or outdoors? Where will it sleep?: \n".$indoors_outdoors."\n"
      ."24. Do you have a sex preference?: ".$sex_preference."\n"
      ."25. Would you consider an older dog? To what age?: \n".$older_dog."\n"
      ."26. Are other members of your household aware that you are considering adopting a pet?: ".$family_aware."\n"
      ."27. Are you planning to move in the near future?: ".$moving_soon."\n"
      ."28. Is anyone in your house allergic to animals?: ".$allergic."\n"
      ."29. Are you familiar with animal control regulations in your area?: ".$animal_control_regulations."\n"
      ."30. Are you willing to allow a Rescue representative to visit your home by appointment?: ".$home_visit."\n"
      ."31. How did you hear about South Carolina Sheltie Rescue?: \n".$hear_about_scsr."\n"
      ."32. Please provide the name and phone number of any vets used in the past 5 years.: \n".$previous_vets;

    //Construct the HTML message body
    $message_html = str_replace("\n", "<br>", $message_alt);
    //Set the body text
    $mail->Body = $message_html;
    //Set the plain text body backup
    $mail->AltBody = $message_alt;

    //send the message, check for errors
    header('Content-Type: application/json');
    if (!$mail->send()) {
      $objDateTime = new DateTime('NOW');
      $response = array(
          'status'    => 'error',
          'message'   => 'Message could not be sent. Please contact a server administrator.',
          'created'   => $objDateTime->format('c'),
          'errorDesc' => $mail->ErrorInfo
        );
      echo json_encode($response);
    } else {
      $objDateTime = new DateTime('NOW');
      $response = array(
          'status'  => 'success',
          'message' => '<b>Thanks!</b> Your application has been submitted.',
          'created' => $objDateTime->format('c')
        );
      echo json_encode($response);
    }
  } else {
    $objDateTime = new DateTime('NOW');
    $response = array(
        'status'  => 'error',
        'message' => 'Please fill out all required fields.',
        'created' => $objDateTime->format('c')
      );
    echo json_encode($response);
  }

?>
