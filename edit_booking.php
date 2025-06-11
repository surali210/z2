<?php
session_start();
include('dbconnction.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$booking_id = $_GET['id'];

// Fetch booking data
$sql = "SELECT * FROM bookings WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $booking_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];

    
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    
    $update_sql = "UPDATE bookings SET name = ?, email = ?, phone = ?, package = ?, booking_date = ?,adults=?,children=? WHERE id = ? AND user_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssiiii", $name, $email, $phone, $package, $booking_date,$adults,$children, $booking_id, $user_id);
    $update_stmt->execute();
    $_SESSION['msg'] = "Booking has been updated successfully.";
    header("Location: booking_success.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Zoofari - Zoo & Safari Park Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include("header.php"); ?>



    <!-- Page Header Start -->
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Ticket Booking</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Ticket Booking</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!--Login start-->
    <section class="vh-80">
        <div class="mask d-flex align-items-center h-80 ">
            <div class="container h-100 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row d-flex justify-content-center align-items-center h-50">
                    <div class="col-xl-5 border border-4" style="border-radius: 3rem;">
                        <div class="p-5">
                            <h2 class="text-dark text-uppercase mb-4">Edit Booking</h2>
                            <form action="" method="POST">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <input type="text" class="form-control border-2 py-2" id="name" name="name"
                                            value="<?php echo htmlspecialchars($booking['name']); ?>"
                                            placeholder="Your Name" required>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <input type="email" class="form-control border-2 py-2" id="email" name="email"
                                            value="<?php echo htmlspecialchars($booking['email']); ?>"
                                            placeholder="Your Email" required>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <input type="phone" class="form-control border-2 py-2" id="phone" name="phone"
                                            value="<?php echo htmlspecialchars($booking['phone']); ?>"
                                            placeholder="Phone" required>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select border-2 py-2" name="package" required>
                                            <option value="">Select Package</option>
                                            <option value="Popular"
                                                <?php if ($booking['package'] == 'Popular') echo 'selected'; ?>>Popular
                                                Package</option>
                                            <option value="Standard"
                                                <?php if ($booking['package'] == 'Standard') echo 'selected'; ?>>
                                                Standard Package</option>
                                            <option value="Premium"
                                                <?php if ($booking['package'] == 'Premium') echo 'selected'; ?>>Premium
                                                Package</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-xl-6">
                                        <input type="number" class="form-control border-2 py-2" id="adults"
                                            name="adults" value="<?php echo htmlspecialchars($booking['adults']); ?>"
                                            placeholder="Adults" required>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <input type="number" class="form-control border-2 py-2" id="children"
                                            name="children"
                                            value="<?php echo htmlspecialchars($booking['children']); ?>"
                                            placeholder="Children (Age: 3-15Y)" required>
                                    </div>

                                    <div class="col-12">
                                        <input class="form-control border-2 py-2" type="date"
                                            value="<?php echo date('Y-m-d',strtotime($booking['booking_date'])); ?>"
                                            name="booking_date" required>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 py-2 px-5">Update
                                            Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>