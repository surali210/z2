<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("dbconnction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $package = mysqli_real_escape_string($conn, $_POST['package']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $adults = mysqli_real_escape_string($conn, $_POST['adults']);
    $children = mysqli_real_escape_string($conn, $_POST['children']);
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO bookings (user_id, name, email, phone, package, booking_date,adults,children) VALUES ('$user_id', '$name', '$email', '$phone', '$package', '$booking_date','$adults','$children')";

    if (mysqli_query($conn, $query)) {
        // Redirect to a success page
        $_SESSION['msg'] = "Booking has been added successfully.";
        header("Location: booking_success.php");
    } else {
        // Handle errors
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    header("Location: ticket_booking.php");
    exit();
}
?>
