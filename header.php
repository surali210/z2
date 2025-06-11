<!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-4 px-lg-5  mt-3 wow fadeIn"
        data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand p-0">
            <img class="img-fluid me-3" src="img\icon\icon-1.png"
                alt="Icon">
            <h1 class="m-0 text-primary">Zoo</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.php" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <?php 
                            if (!isset($_SESSION['user_id'])) {
                                ?>
                                    <a href="registration.php" class="dropdown-item">Registration</a>
                                    <a href="login.php" class="dropdown-item">Login</a>
                                <?php 
                            }
                        ?>
                        <a href="animal.php" class="dropdown-item">Our Animals</a>
                        <a href="membership.php" class="dropdown-item">Membership</a>
                        <a href="visiting.php" class="dropdown-item">Visiting Hours</a>
                
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
           
            <a href="ticket.php" class="btn btn-primary">Buy Ticket<i class="fa fa-arrow-right ms-3"></i></a>
            <?php 
                if (isset($_SESSION['user_id'])) {
                    ?>
                        <div>
                            <a href="logout.php " class="btn btn-primary m-2">Logout</a>
                        </div>
                    <?php 
                }
            ?>
            
        </div>
    </nav>
    <!-- Navbar End -->