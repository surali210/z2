<?php
   session_start();
   include("dbconnction.php");
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
            <h1 class="display-4 text-white mb-3 animated slideInDown">Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Registration</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!--Login start-->
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100  wow fadeInUp " data-wow-delay="0.1s">
                <div class="row d-flex justify-content-center align-items-center h-100">
                
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <?php
                        @$msg=$_GET['msg'];
                        if($msg!='' && $msg=='inserted'){
                        ?>
                            <div class="alert alert-success" role="alert">
                            Registration successfully.
                            </div>
                        <?php
                        }
                        ?>
                         <?php
                        if($msg!='' && $msg=='not_inserted'){
                        ?>
                            <div class="alert alert-danger" role="alert">
                            Something went wrong.
                            </div>
                        <?php
                        }
                        ?>
                        <div class="card " style="border-radius: 3rem;">
                            <div class="card-body p-4 border border-2">
                                <h2 class="text-uppercase text-center mb-4">Create an account</h2>
                                <form name="myform" action="insert.php" method="post">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            name="name" placeholder="Enter Your Name" required/>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                            name="pwd" placeholder="Enter Password" required/>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-3 ">
                                        <input type="date" name="dt" class="form-control form-control-lg" required/>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-3 border border-2">
                                        <label class="fw-bold mt-2 mb-2 ms-2">Gender:</label>
                                        <input class="ms-2" type="radio" name="gender" />Male
                                        <input class="ms-2" type="radio" name="gender" />FeMale
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg"
                                            placeholder="Enter Your Email" required/>
                                    </div>
                                    <div class="form-check d-flex justify-content-center mb-3">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-outline-dark btn-lg ps-5 pe-5 text-black"
                                            type="submit" value="submit" name="submit">REGISTER</button>
                                    </div>
                                    <p class="text-center text-muted mt-3 mb-0">Have already an account? <a
                                            href="./login.html" class="fw-bold text-body"><u>Login here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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