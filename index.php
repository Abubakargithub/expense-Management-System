<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Management System</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffffff; /* White background */
            color: #333; /* Dark text color */
        }

        .navbar {
            background-color: #B2BEB5; /* Blue navbar */
        }
        
        .navbar .nav-link {
            color: #fff; /* Text color for navigation links */
        }

        /* Front Page Image */
        .front-page-image {
            background-image: url('images/slide1.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 400px; /* Adjust the height as needed */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Centered login button */
        .center-button {
            text-align: center;
        }

        .enter-button {
            background-color: #007BFF; /* Blue background for the button */
            color: #fff; /* Text color for the button */
            padding: 15px 30px; /* Adjust padding as needed */
            font-size: 18px; /* Adjust font size as needed */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Section Styling */
        .section {
            padding: 40px 0;
        }

        /* Team Member Styling */
        .team-member {
            text-align: center;
        }

        /* Analytics Styling */
        .analytics {
            text-align: center;
        }

        /* Footer Styling */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        .social-icons {
            font-size: 24px;
            margin-right: 20px;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-calculator"></i> Expense Manager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about"><i class="fas fa-info-circle"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services"><i class="fas fa-briefcase"></i> Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team"><i class="fas fa-users"></i> Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#analytics"><i class="fas fa-chart-bar"></i> Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="fas fa-phone"></i> Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Front Page Image -->
    <div class="front-page-image">
        <!-- You can add content or buttons over the image if needed -->
        <div class="center-button">
<a href="login.php"
            <button class="enter-button">Enter Management System</button></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- About Us Section -->
        <section id="about" class="section">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Us</h2>
                    <p>
                        We are a dedicated team of professionals committed to revolutionizing expense management in various industrial sectors, including building, mining, construction, and more. Our mission is to empower businesses with cutting-edge solutions that streamline their financial processes and drive efficiency.
                    </p>
                </div>
                <!-- Add an image or additional content here if needed -->
            </div>
        </section>

        <!-- Our Services Section -->
        <section id="services" class="section">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Services</h2>
                    <p>
                        We offer a comprehensive range of services designed to transform expense management for industrial companies. Our solutions are meticulously crafted to enhance financial efficiency, reduce costs, and drive sustainable growth.
                    </p>
                </div>
                <!-- Add more details about services here if needed -->
            </div>
        </section>

        <!-- Our Team Section -->
        <section id="team" class="section">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Our Team</h2>
                </div>
                <div class="col-md-4 team-member">
                    <img src="images/team1.jpg" alt="Team Member 1" class="img-fluid rounded-circle" style="max-width: 100px;">
                    <h4>Abubakar S Abubakar</h4>
                    <p>Role: Developer</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="images/team1.jpg" alt="Team Member 2" class="img-fluid rounded-circle" style="max-width: 100px;">
                    <h4>Abubakar S Abubakar</h4>
                    <p>Role: Designer</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="images/team1.jpg" alt="Team Member 3" class="img-fluid rounded-circle" style="max-width: 100px;">
                    <h4>Abubakar S Abubakar</h4>
                    <p>Role: Manager</p>
                </div>
            </div>
        </section>

        <!-- Analytics Section -->
        <section id="analytics" class="section">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Analytics</h2>
                    <p><i class="fas fa-users"></i> Users: 10,000</p>
                    <p><i class="fas fa-database"></i> Data: 20,000</p>
                    <p><i class="fas fa-chart-pie"></i> Company Usage: 80%</p>
                    <!-- Add more analytics data here if needed -->
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section">
            <div class="row">
                <div class="col-md-6">
                    <h2>Contact</h2>
                    <p>Contact us at: abubakarsabubakar939@email.com</p>
                </div>
                <!-- Add contact form or additional contact information here if needed -->
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <a href="#"><i class="fab fa-facebook social-icons"></i></a>
            <a href="#"><i class="fab fa-twitter social-icons"></i></a>
            <a href="#"><i class="fab fa-instagram social-icons"></i></a>
            <a href="#"><i class="fab fa-linkedin social-icons"></i></a>
            <p>&copy; 2023 Expense Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
