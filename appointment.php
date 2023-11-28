<?php
// get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$date = $_POST['date'];
$message = $_POST['message'];

// validate the form data (e.g., check for empty fields, validate email format)

// store the form data in a database or a file
$file = fopen("appointments.txt", "a");
fwrite($file, "$name,$email,$phone,$service,$date,$message\n");
fclose($file);

// send confirmation email to the client
$to = $email;
$subject = "Appointment Confirmation";
$message = "Dear $name,\n\nThank you for booking an appointment with Doctor Name Medical Clinic. We have received your request for $service on $date, and we will contact you shortly to confirm your appointment.\n\nBest regards,\nDoctor Name Medical Clinic";
$headers = "From: DoctorConnect <noreply@doctorconnect.com>";
mail($to, $subject, $message, $headers);

// send notification email to the doctor
$to = "doctor@doctorconnect.com";
$subject = "New Appointment Request";
$message = "Dear Doctor,\n\nA new appointment has been requested. Details are as follows:\n\nName: $name\nEmail: $email\nPhone: $phone\nService: $service\nDate: $date\nMessage: $message\n\nBest regards,\nDoctor Name Medical Clinic";
$headers = "From: DoctorConnect <noreply@doctorconnect.com>";
mail($to, $subject, $message, $headers);

// redirect to thank-you page
header("Location: thank-you.php");
exit;
?>
