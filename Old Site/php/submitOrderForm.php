<?php
if(isset($_POST['email'])) {
    $emailTo = "casualpancakesdraws@gmail.com";
    $emailSubject = "Email subject";
    $emailFrom = $_POST['senderEmail']// required
    $artPackage = $_POST['package']; 
    $characterTotal = $_POST['characterTotal']; // required

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $emailMessage = "Form details below.\n\n";
    $emailMessage .= "From: ".clean_string($emailFrom)."\n";
    $emailMessage .= "Package: ".clean_string($artPackage)."\n";
    $emailMessage .= "Number of Characters: ".clean_string($characterTotal)."\n";

// create email headers
    $headers = "From: casualpancakesdraws@gmail.com";
    $headers .= "Reply-To: $emailFrom";
    // 'Reply-To: '.$emailFrom."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($emailTo, $emailSubject, $emailMessage, $headers);
    ?>
    <!-- Success html here -->
    <html>
    <link rel="icon" href="../img/logoHeader2.png">
    <title>Order Request Sent</title>

    <img class="about-banner" src="../img/gallery-shot-about.png" alt="A stack of portraits layered" style="max-width: 60%; margin:2em auto 0 auto; display: block;">
    <section class="feedback" style="font-family: 'Quattrocento Sans', sans-serif; background-color: #f4f4f4; justify-content: center; display: flex; text-align: center;">
        <div class="row order-bar" style="background-color: #f4f4f4; padding:2em">
            <h2 style="color:#282824; font-weight: lighter;font-size: 1.6em;">Thank you for your order request!</h2> 
            <p style="margin: 1em 0 3em 0; color: #7e7e7e;font-size: 1.2em;">
                I will get back to you within 48 hours regarding further details.
                <br/>Please keep an eye on your inbox
            </p>
            <p><a href="../index.html" style="cursor:pointer; opacity: 100% !important; background-color: #a34b4c; color:#d8be66; padding: 0.8em 3em; text-transform: uppercase; border:2px solid #d8be66; text-decoration: none; font-size: 1.2em">Go back</a></p>
        </div>
    </section>
    </html>
    <?php
}
?>