<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adoption Application</title>
    <meta name="description" content="Apply to adopt a sheltie today with the SC Sheltie Rescue.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160" />
    <meta name="msapplication-TileColor" content="#2ba6cb" />
    <meta name="msapplication-TileImage" content="/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="/mstile-310x310.png" />

    <link rel="stylesheet" href="css/app.20140129.css"> <!-- Cache Busting: Update the # when you update main.css -->
    <script src="bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>
    <!--[if lte IE 8]>
    <div data-alert class="alert-box warning browsehappy-alert">
      You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
      <a href="#" class="close">&times;</a>
    </div>
    <![endif]-->

    <div class="page-wrap">
      <div class="contain-to-grid sticky">
        <nav class="top-bar" data-topbar>
          <ul class="title-area">
            <!-- Title Area -->
            <li class="name">
              <h1 class="show-for-large-up"><a href="index.html">South Carolina Sheltie Rescue</a></h1>
              <h1 class="show-for-medium-down"><a href="index.html">SCSR</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
          </ul>

          <section class="top-bar-section">
            <ul class="right">
              <li><a href="index.html">Home</a></li>
              <li class="has-dropdown"><a href="available_dogs.html">Adopt</a>
                <ul class="dropdown">
                  <li><a href="adoption_requirements.html">Adoption Requirements</a></li>
                  <li><a href="available_dogs.html">Adoptable Dogs</a></li>
                  <li class="active"><a href="apply_to_adopt.php">Adoption Application</a></li>
                  <li><a href="apply_to_foster.php">Fostering Application</a></li>
                </ul>
              </li>
              <li><a href="surrender.html">Surrender a Sheltie</a></li>
              <li><a href="help_and_advice.html">Help and Advice</a></li>
              <li><a href="events.html">Rescue Events</a></li>
            </ul>
          </section>
        </nav>
      </div>

      <div class="row">
        <div class="large-12 medium-12 small-12 columns">
          <main role="main" class="main-content">
            <h2 class="headline first">Adoption Application</h2>

            <?php
              //SMTP needs accurate times, and the PHP time zone MUST be set
              date_default_timezone_set('America/New_York');
              //require_once 'phpmailer/PHPMailerAutoload.php';
              require_once 'phpmailer/class.phpmailer.php';
              require_once 'phpmailer/class.smtp.php';
              include_once 'credentials.php';

              $subject = 'SHELTIE ADOPTION';
              $to_email = 'amanda@southcarolinasheltierescue.com';
              $to_name = 'Amanda';
              $from_email = 'webserver@southcarolinasheltierescue.com';
              $from_name = 'Adoption Application';
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
              $specific_dog_name = $_POST['specific_dog_name'];
              $why_adopt = $_POST['why_adopt'];
              $owned_previously = $_POST['owned_previously'];
              $still_have_sheltie = $_POST['still_have_sheltie'];
              $last_dog = $_POST['last_dog'];
              $last_five_lost_pet = $_POST['last_five_lost_pet'];
              $last_five_vehicle = $_POST['last_five_vehicle'];
              $last_five_disease = $_POST['last_five_disease'];
              $last_five_explain = $_POST['last_five_explain'];
              $purpose = $_POST['purpose'];
              $other_animals = $_POST['other_animals'];
              $household_members = $_POST['household_members'];
              $home_type = $_POST['home_type'];
              $rent_own = $_POST['rent_own'];
              $landlord_permission = $_POST['landlord_permission'];
              $yard_type = $_POST['yard_type'];
              $not_fenced_desc = $_POST['not_fenced_desc'];
              $home_during_day = $_POST['home_during_day'];
              $indoors_outdoors = $_POST['indoors_outdoors'];
              $sex_preference = $_POST['sex_preference'];
              $color_preference = $_POST['color_preference'];
              $older_dog = $_POST['older_dog'];
              $size_preference = $_POST['size_preference'];
              $family_aware = $_POST['family_aware'];
              $financial_responsibility = $_POST['financial_responsibility'];
              $moving_soon = $_POST['moving_soon'];
              $allergic = $_POST['allergic'];
              $animal_control_regulations = $_POST['animal_control_regulations'];
              $gift = $_POST['gift'];
              $spayed_neutered = $_POST['spayed_neutered'];
              $getting_rid_of_dog = $_POST['getting_rid_of_dog'];
              $home_visit = $_POST['home_visit'];
              $hear_about_scsr = $_POST['hear_about_scsr'];
              $accept_fee = $_POST['accept_fee'];
              $previous_vets = $_POST['previous_vets'];

              if ($_POST['submit']) {
                if ($name != '' && $email != '' && $city != '' && $state != '' && $zip != ''&& $homephone != '') {
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
                  //Construct the alt message body
                  $message_alt = "1.  Name: ".$name."\n"
                    ."2.  Email: ".$email."\n"
                    ."3.  Address: ".$street." ".$city.", ".$state." ".$zip."\n"
                    ."4.  Phone(H): ".$homephone."\n"
                    ."5.  Phone(W): ".$workphone."\n"
                    ."6.  Occupation: ".$occupation."\n"
                    ."7.  Full-Time: ".$fulltime."\n"
                    ."8.  If you are applying to adopt a specific dog, please list the dog's name: ".$specific_dog_name."\n"
                    ."9.  Why do you want a Shetland Sheepdog?: \n".$why_adopt."\n"
                    ."10. Have you ever owned a Sheltie before?: ".$owned_previously."\n"
                    ."11. And if so, do you still have that dog?: \n".$still_have_sheltie."\n"
                    ."12. What happened to your last dog?: \n".$last_dog."\n"
                    ."13. During the last five years, have you had a pet become lost or stolen?: ".$last_five_lost_pet."\n"
                    ."14. During the last five years, have you had an animal killed by a vehicle?: ".$last_five_vehicle."\n"
                    ."15. During the last five years, have you had an animal die due to disease?: ".$last_five_disease."\n"
                    ."16. If you answered yes to any of the the previous three questions, please explain: \n".$last_five_explain."\n"
                    ."17. For what purpose do you want this dog?: \n".$purpose."\n"
                    ."18. Do you have any other animals? (name, type, age, sex, neutered/spayed): \n".$other_animals."\n"
                    ."19. Please list everyone (including yourself) who lives in your household and their age.: \n".$household_members."\n"
                    ."20. Do you live in a house, apartment, condo, or trailer?: ".$home_type."\n"
                    ."21. Do you rent or own?: ".$rent_own."\n"
                    ."22. If you rent, do you have the landlords permission to keep a dog? (If so, list landlord's name and phone number): \n".$landlord_permission."\n"
                    ."23. Do you have a yard and if so, is it fenced? (list type of fencing): \n".$yard_type."\n"
                    ."24. If your yard is not fenced, please describe how you will address an adopted dog's bathroom/exercise needs. \n".$not_fenced_desc."\n"
                    ."25. Do all family adults work and is someone home during the day? (Please explain): \n".$home_during_day."\n"
                    ."26. Do you intend to keep this dog primarily indoors or outdoors? Where will it sleep?: \n".$indoors_outdoors."\n"
                    ."27. Do you have a sex preference?: ".$sex_preference."\n"
                    ."28. Do you have a color preference? (If yes, please list first and second choices): \n".$color_preference."\n"
                    ."29. Would you consider an older dog? To what age?: \n".$older_dog."\n"
                    ."30. What size Sheltie do you prefer?: \n".$size_preference."\n"
                    ."31. Are other members of your household aware that you are considering adopting a pet?: ".$family_aware."\n"
                    ."32. Are you prepared to assume the financial responsibilities of caring for an animal? (vaccines, heartworm preventative, veterinarian care, good quality food, licensing, etc.): ".$financial_responsibility."\n"
                    ."33. Are you planning to move in the near future?: ".$moving_soon."\n"
                    ."34. Is anyone in your house allergic to animals?: ".$allergic."\n"
                    ."35. Are you familiar with animal control regulations in your area?: ".$animal_control_regulations."\n"
                    ."36. Is this Sheltie going to be a gift? For whom and do they know?: \n".$gift."\n"
                    ."37. Do you understand that any rescue Sheltie you may adopt through SC Sheltie Rescue will be spayed/neutered?: ".$spayed_neutered."\n"
                    ."38. What circumstances, in your mind, justify getting rid of a dog?: \n".$getting_rid_of_dog."\n"
                    ."39. Are you willing to allow a Rescue representative to visit your home by appointment?: ".$home_visit."\n"
                    ."40. How did you hear about South Carolina Sheltie Rescue?: \n".$hear_about_scsr."\n"
                    ."41. Do you accept that there will be an adoption fee for the adopted dog?: ".$accept_fee."\n"
                    ."42. Please provide the name and phone number of any vets used in the past 5 years.: \n".$previous_vets;
                  //Construct the HTML message body
                  $message_html = str_replace("\n", "<br>", $message_alt);
                  //Set the body text
                  $mail->Body = $message_html;
                  //Set the plain text body backup
                  $mail->AltBody = $message_alt;

                  //send the message, check for errors
                  if (!$mail->send()) {
                    echo '<div data-alert class="alert-box alert">';
                    echo '  <p>Message could not be sent. Please contact a server administrator.</p>';
                    echo '  <p>Mailer Error: ' . $mail->ErrorInfo . '</p>';
                    echo '</div>';
                  } else {
                    echo '<div data-alert class="alert-box success">';
                    echo '  <p><b>Thanks!</b> Your application has been submitted.</p>';
                    echo '</div>';
                  }
                } else {
                    echo '<div data-alert class="alert-box alert">';
                    echo '  <p>Please fill out all required fields.</p>';
                    echo '</div>';
                }
              }

            ?>

            <form action="apply_to_adopt.php" method="POST">

              <div class="row">
                <div class="large-12 medium-12 small-12 columns">

                  <p><strong>Please read through the <a href="adoption_requirements.html">Adoption Requirements</a> completely before filling out the application!</strong></p>

                  <div class="row">
                    <div class="large-6 columns">
                      <label for="name" class="required">Name</label>
                      <input id="name" name="name" type="text" placeholder="John Doe" required autofocus>
                    </div>
                    <div class="large-6 columns">
                      <label for="email" class="required">Email</label>
                      <input id="email" name="email" type="email" placeholder="john.doe@email.com" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="street" class="required">Street Address</label>
                      <input id="street" name="street" type="text" placeholder="123 Main St" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-5 columns">
                      <label for="city" class="required">City</label>
                      <input id="city" name="city" type="text" placeholder="Columbia" required>
                    </div>
                    <div class="large-1 large-offset-1 columns">
                      <label for="state" class="required">State</label>
                      <input id="state" name="state" type="text" placeholder="SC" required>
                    </div>
                    <div class="large-2 columns">
                      <label for="zip" class="required">Zip</label>
                      <input id="zip" name="zip" type="text" placeholder="29201" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-3 columns">
                      <label for="homephone" class="required">Home phone</label>
                      <input id="homephone" name="homephone" type="tel" required>
                    </div>
                    <div class="large-3 columns">
                      <label for="workphone">Work phone</label>
                      <input id="workphone" name="workphone" type="tel">
                    </div>
                    <div class="large-4 columns">
                      <label for="occupation" class="required">Occupation</label>
                      <input id="occupation" name="occupation" type="text" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-4 columns">
                      <label class="required">Are you employed full-time?</label>
                      <input id="fulltime_yes" name="fulltime" type="radio" value="Yes" required><label for="fulltime_yes">&nbsp;Yes</label><br>
                      <input id="fulltime_no" name="fulltime" type="radio" value="No" required><label for="fulltime_no">&nbsp;No</label>
                    </div>
                    <div class="large-4 columns">
                      <label class="required">Have you ever owned a Sheltie before?</label>
                      <input id="owned_previously_yes" name="owned_previously" type="radio" value="Yes" required><label for="owned_previously_yes">&nbsp;Yes</label><br>
                      <input id="owned_previously_no" name="owned_previously" type="radio" value="No" required><label for="owned_previously_no">&nbsp;No</label>
                    </div>
                    <div class="large-4 columns">
                      <label>If so, do you still have that dog?</label>
                      <input id="still_have_sheltie_yes" name="still_have_sheltie" type="radio" value="Yes"><label for="still_have_sheltie_yes">&nbsp;Yes</label><br>
                      <input id="still_have_sheltie_no" name="still_have_sheltie" type="radio" value="No"><label for="still_have_sheltie_no">&nbsp;No</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="specific_dog_name">If you are applying to adopt a specific dog, please list the dog's name:</label>
                      <input id="specific_dog_name" name="specific_dog_name" type="text"></input>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="why_adopt" class="required">Why do you want a Shetland Sheepdog?</label>
                      <textarea id="why_adopt" name="why_adopt" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="last_dog" class="required">What happened to your last dog?</label>
                      <textarea id="last_dog" name="last_dog" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-4 columns">
                      <label class="required">During the last five years, have you had a pet become lost or stolen?</label>
                      <input id="last_five_lost_pet_yes" name="last_five_lost_pet" type="radio" value="Yes" required><label for="last_five_lost_pet_yes">&nbsp;Yes</label><br>
                      <input id="last_five_lost_pet_no" name="last_five_lost_pet" type="radio" value="No" required><label for="last_five_lost_pet_no">&nbsp;No</label>
                    </div>
                    <div class="large-4 columns">
                      <label class="required">During the last five years, have you had an animal killed by a vehicle?</label>
                      <input id="last_five_vehicle_yes" name="last_five_vehicle" type="radio" value="Yes" required><label for="last_five_vehicle_yes">&nbsp;Yes</label><br>
                      <input id="last_five_vehicle_no" name="last_five_vehicle" type="radio" value="No" required><label for="last_five_vehicle_no">&nbsp;No</label>
                    </div>
                    <div class="large-4 columns">
                      <label class="required">During the last five years, have you had an animal die due to disease?</label>
                      <input id="last_five_disease_yes" name="last_five_disease" type="radio" value="Yes" required><label for="last_five_disease_yes">&nbsp;Yes</label><br>
                      <input id="last_five_disease_no" name="last_five_disease" type="radio" value="No" required><label for="last_five_disease_no">&nbsp;No</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="last_five_explain">If you answered yes to any of the the previous three questions, please explain.</label>
                      <textarea id="last_five_explain" name="last_five_explain"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="purpose" class="required">For what purpose do you want this dog?</label>
                      <textarea id="purpose" name="purpose" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="other_animals">Do you have any other animals? (name, type, age, sex, neutered/spayed)</label>
                      <textarea id="other_animals" name="other_animals"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="household_members" class="required">Please list <strong>everyone (including yourself)</strong> who lives in your household and their age.</label>
                      <textarea id="household_members" name="household_members" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-4 columns">
                      <label for="home_type" class="required">Which best describes your place of residence:</label>
                      <select id="home_type" name="home_type" required>
                        <option value="House" selected> House </option>
                        <option value="Apartment"> Apartment </option>
                        <option value="Condo"> Condo </option>
                        <option value="Trailer"> Trailer </option>
                      </select>
                    </div>
                    <div class="large-4 columns">
                      <label class="required">Do you rent or own?</label>
                      <input id="rent" name="rent_own" type="radio" value="Rent" required><label for="rent">&nbsp;Rent</label><br>
                      <input id="own" name="rent_own" type="radio" value="Own" required><label for="own">&nbsp;Own</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="landlord_permission">If you rent, do you have the landlords permission to keep a dog? (If so, list landlord's name and phone number)</label>
                      <textarea id="landlord_permission" name="landlord_permission"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="yard_type" class="required">Do you have a yard and if so, is it fenced? (list type of fencing)</label>
                      <textarea id="yard_type" name="yard_type" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="not_fenced_desc">If your yard is not fenced, please describe how you will address an adopted dog's bathroom/exercise needs.</label>
                      <textarea id="not_fenced_desc" name="not_fenced_desc"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="home_during_day" class="required">Do all family adults work and is someone home during the day? (Please explain)</label>
                      <textarea id="home_during_day" name="home_during_day" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="indoors_outdoors" class="required">Do you intend to keep this dog primarily indoors or outdoors? Where will it sleep?</label>
                      <textarea id="indoors_outdoors" name="indoors_outdoors" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-6 columns">
                      <label>Do you have a sex preference?</label>
                      <input id="sex_no" name="sex_preference" type="radio" value="No"><label for="sex_no">&nbsp;No</label><br>
                      <input id="sex_male" name="sex_preference" type="radio" value="Male"><label for="sex_male">&nbsp;Yes, Male</label><br>
                      <input id="sex_female" name="sex_preference" type="radio" value="Female"><label for="sex_female">&nbsp;Yes, Female</label>
                    </div>
                    <div class="large-6 columns">
                      <label for="color_preference">Do you have a color preference? (If yes, please list first and second choices)</label>
                      <textarea id="color_preference" name="color_preference"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-6 columns">
                      <label for="older_dog">Would you consider an older dog? To what age?</label>
                      <textarea id="older_dog" name="older_dog"></textarea>
                    </div>
                    <div class="large-6 columns">
                      <label for="size_preference">What size Sheltie do you prefer?</label>
                      <textarea id="size_preference" name="size_preference"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-6 columns">
                      <label class="required">Are other members of your household aware that you are considering adopting a pet?</label>
                      <input id="family_aware_yes" name="family_aware" type="radio" value="Yes" required><label for="family_aware_yes">&nbsp;Yes</label><br>
                      <input id="family_aware_no" name="family_aware" type="radio" value="No" required><label for="family_aware_no">&nbsp;No</label>
                    </div>
                    <div class="large-6 columns">
                      <label class="required">Are you prepared to assume the financial responsibilities of caring for an animal? (vaccines, heartworm preventative, veterinarian care, good quality food, licensing, etc.)</label>
                      <input id="financial_yes" name="financial_responsibility" type="radio" value="Yes" required><label for="financial_yes">&nbsp;Yes</label><br>
                      <input id="financial_no" name="financial_responsibility" type="radio" value="No" required><label for="financial_no">&nbsp;No</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-4 columns">
                      <label class="required">Are you planning to move in the near future?</label>
                      <input id="moving_soon_yes" name="moving_soon" type="radio" value="Yes" required><label for="moving_soon_yes">&nbsp;Yes</label><br>
                      <input id="moving_soon_no" name="moving_soon" type="radio" value="No" required><label for="moving_soon_no">&nbsp;No</label>
                    </div>
                    <div class="large-4 columns">
                      <label class="required">Is anyone in your house allergic to animals?</label>
                      <input id="allergic_yes" name="allergic" type="radio" value="Yes" required><label for="allergic_yes">&nbsp;Yes</label><br>
                      <input id="allergic_no" name="allergic" type="radio" value="No" required><label for="allergic_no">&nbsp;No</label>
                    </div>
                    <div class="large-4 columns">
                      <label class="required">Are you familiar with animal control regulations in your area?</label>
                      <input id="acr_yes" name="animal_control_regulations" type="radio" value="Yes" required><label for="acr_yes">&nbsp;Yes</label><br>
                      <input id="acr_no" name="animal_control_regulations" type="radio" value="No" required><label for="acr_no">&nbsp;No</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-6 columns">
                      <label for="gift" class="required">Is this Sheltie going to be a gift? For whom and do they know?</label>
                      <textarea id="gift" name="gift" required></textarea>
                    </div>
                    <div class="large-6 columns">
                      <label class="required">Do you understand that any rescue Sheltie you may adopt through SC Sheltie Rescue will be spayed/neutered?</label>
                      <input id="spayed_neutered_yes" name="spayed_neutered" type="radio" value="Yes" required><label for="spayed_neutered_yes">&nbsp;Yes</label><br>
                      <input id="spayed_neutered_no" name="spayed_neutered" type="radio" value="No" required><label for="spayed_neutered_no">&nbsp;No</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="getting_rid_of_dog" class="required">What circumstances, in your mind, justify getting rid of a dog?</label>
                      <textarea id="getting_rid_of_dog" name="getting_rid_of_dog" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-6 columns">
                      <label class="required">Are you willing to allow a Rescue representative to visit your home by appointment?</label>
                      <input id="home_visit_yes" name="home_visit" type="radio" value="Yes" required><label for="home_visit_yes">&nbsp;Yes</label><br>
                      <input id="home_visit_no" name="home_visit" type="radio" value="No" required><label for="home_visit_no">&nbsp;No</label>
                    </div>
                    <div class="large-6 columns">
                      <label class="required">Do you accept that there will be an adoption fee for the adopted dog?</label>
                      <input id="accept_fee_yes" name="accept_fee" type="radio" value="Yes" required><label for="accept_fee_yes">&nbsp;Yes</label><br>
                      <input id="accept_fee_no" name="accept_fee" type="radio" value="No" required><label for="accept_fee_no">&nbsp;No</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="previous_vets" class="required">Please provide the name and phone number of any vets used in the past 5 years.</label>
                      <textarea id="previous_vets" name="previous_vets" required></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-12 columns">
                      <label for="hear_about_scsr">How did you hear about South Carolina Sheltie Rescue?</label>
                      <textarea id="hear_about_scsr" name="hear_about_scsr"></textarea>
                    </div>
                  </div>

                  <p>By submitting this form, I am attesting to the truthfulness of my answers. I understand that falsification of any of the above information will be grounds to disallow the adoption of a rescue Sheltie.</p>
                  <p>NOTE: If you are under 18 years of age, a parent or guardian must also sign the application. Thank you for considering a dog from South Carolina Sheltie Rescue. If you have any questions, or if we can be of assistance, please do not hesitate to <a href="mailto:amanda@southcarolinasheltierescue.com">email</a> us.</p>
                  <p><strong>We reserve the right to refuse any applicant.</strong></p>

                  <input id="submit" name="submit" type="submit" class="large button expand" value="Submit">
                </div>
              </div>

            </form>
          </main>
        </div>
      </div>
    </div>

    <footer class="main-footer">
      <section id="social-media" class="social-media">
        <a href="http://www.petfinder.com/pet-search?shelterid=SC92" target="_blank">
          <span class="icon-bone"></span><span class="visuallyhidden">Petfinder</span>
        </a>
        <a href="https://www.facebook.com/SouthCarolinaSheltieRescue" target="_blank">
          <span class="icon-facebook"></span><span class="visuallyhidden">Facebook</span>
        </a>
        <a href="https://twitter.com/scsheltierescue" target="_blank">
          <span class="icon-twitter"></span><span class="visuallyhidden">Twitter</span>
        </a>
      </section>
      <section id="address" class="address">
        <p class="no-margin-bottom">
          <span class="name">SC Sheltie Rescue</span><br/>
          <span class="po-box">P.O. Box 11414</span><br/>
          <span class="city-state-zip">Columbia, SC 29211</span><br/>
          <span class="tel"><a href="tel:+18039200644">803.920.0644</a></span>
        </p>
      </section>
      <section id="copyright" class="copyright">
        <small>&copy; <script>document.write(new Date().getFullYear())</script><noscript>2014</noscript> South Carolina Sheltie Rescue</small>
      </section>
    </footer>


    <script src="bower_components/jquery/jquery.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>