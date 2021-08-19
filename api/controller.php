<?php

session_start();
error_reporting(E_ALL & ~ E_NOTICE);

class Controller
{
    function __construct() {
        $this->processEmailVerification();
    }
    function processEmailVerification()
    {
        switch ($_POST["action"]) {

            case "get_otp":
                $email = $_POST['email'];
                $otp = rand(100000, 999999); //generates random otp
                $_SESSION['session_otp'] = $otp;
                $message = "<h3>Your Email varification Code is <br></h3>";
                $message .= "<h1 style='color: #00adef'> $otp </h1>";
                $sub = "Email verification from su library";
                $headers ="From: srinivaslibrary.pandeshwara@gmail.com\r\n";
                $headers .=    "X-Mailer: PHP/" . PHP_VERSION."\r\n";
                $headers .= "MIME-Version: 1.0 \r\n";
                $headers .= "Content-type: text/html \r\n";
               // $headers = implode("\r\n", $headers);
                try{
                    $retval = mail($email,$sub,$message,$headers);
                    if($retval)
                    {
                        echo '<script>alert("mail sent")</script>';
                        require_once('register.php');
                    }
                }

                catch(Exception $e)
                {
                    die('Error: '.$e->getMessage());
                }

                break;

            case "verify_otp":
                $otp = $_POST['otp'];
//                echo '<script>alert('.$otp.')</script>';
                if ($otp == $_SESSION['session_otp'])
                {
//                    echo '<script>alert('.$_SESSION['session_otp'].')</script>';
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type"=>"success", "message"=>"Your Email is verified!"));
                }
                else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile Email verification failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
