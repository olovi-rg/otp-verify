<?php
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$terms = $_POST['terms'] ? 'Agreed' : 'Not Agreed';

// Here you would typically save this data to a database

$response = "Contact form submitted successfully.<br>";
$response .= "Name: $name<br>";
$response .= "Email: $email<br>";
$response .= "Gender: $gender<br>";
$response .= "Terms: $terms<br>";

echo $response;
?>
