<?php
session_start();

include('dbconnction.php');
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch bookings
$sql = "SELECT * FROM bookings WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Zoo</title>
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
<script>
    function f() {
        var name = document.myform.fname.value;
        var pass = document.myform.pwd.value;
        if (name == null || name == "") {
            alert("name can't be blank");
            return false;
        }
        else if (pass.length < 6) {
            alert("password must be at least 6 character!");
            return false;
        }
    }
</script>

<body>
<?php
   include("header.php");
?>


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
    <div class="container h-100 wow fadeInUp" data-wow-delay="0.1s">    
    <section class="vh-80">
        


    <div class="mask d-flex align-items-center h-80 ">
        <div class="container h-100 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-xl-5 border border-4" style="border-radius: 3rem;">
                    <div class="p-5">
                        <h2 class="text-dark text-uppercase mb-4">Book Your Ticket</h2>
                        <form action="process_booking.php" method="POST">
                            <div class="row g-4">
                                <div class="col-12">
                                    <input type="text" class="form-control border-2 py-2" id="name" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <input type="email" class="form-control border-2 py-2" id="email" name="email" placeholder="Your Email" required>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <input type="phone" class="form-control border-2 py-2" id="phone" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-12">
                                    <select class="form-select border-2 py-2" name="package" required>
                                        <option selected>Select Package</option>
                                        <option value="Popular">Popular Package</option>
                                        <option value="Standard">Standard Package</option>
                                        <option value="Premium">Premium Package</option>
                                    </select>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <input type="number" class="form-control border-2 py-2" id="adults" name="adults" placeholder="Adults" required>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <input type="number" class="form-control border-2 py-2" id="children" name="children" placeholder="Children (Age: 3-15Y)" required>
                                </div>
                                <div class="col-12">
                                    <input type="date" class="form-control border-2 py-2" name="booking_date" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2 px-5">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center pt-3">
            <a href="booking_success.php" class="btn btn-primary  py-2 px-5">View my bookings</a>
            </div>
            
        </div>
    </div>
</section>
        </div>

    <!--Login end-->
    <?php
   include("footer.php");
?>


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