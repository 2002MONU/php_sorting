

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
include "admin/include/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$query_select = "SELECT * FROM `apply_online` WHERE id=?";
 $mail = new PHPMailer(true);
                try {
                    // Server settings for user
                    $mail->SMTPAuth = true;
                    $mail->SMTPAutoTLS = false;
                    $mail->Host = 'indigohealthcare.in';
                    $mail->Port = '587';
                    $mail->Username = 'noreply@indigohealthcare.in';
                    $mail->Password = '5&Ec&jIr';
                    $mail->SMTPDebug  = 0;

                    $mail->setFrom('noreply@indigohealthcare.in', 'indigohealthcare.in');
                    $mail->addAddress($user_email, $user_name);
                    $mail->addReplyTo('noreply@indigohealthcare.in', 'indigohealthcare.in');

                    $mail->isHTML(true);
                    $mail->Subject = 'Payment Received - indigohealthcare';
                    $mail->Body = "Dear $user_name, ID: $id your payment of $amount has been successfully received for order ID $order_id.<br>Thank you.<br><br>Regards,<br>indigohealthcare.in Team";
                    $mail->send();

                    // Notify Admin
                    $mail->clearAddresses();
                    $mail->addAddress('indigohealthcare@gmail.com', 'Admin indigohealthcare');
                    $mail->Subject = 'New Payment Received - medaxohealthcare';
                    $mail->Body = "A payment of $amount was received from $user_name (ID: $id, Email: $user_email, Mobile: $user_mobile) for order ID $order_id.<br>Regards,<br>indigohealthcare.in Team";
                    $mail->send();

                    header("Location: https://indigohealthcare.in/thankyou.php");
                  //  exit;
                } catch (Exception $e) {
                    error_log("PHPMailer Error: " . $mail->ErrorInfo);
                    echo "Email could not be sent.";
                  //  exit;
                }