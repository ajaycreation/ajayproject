<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Hotel Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #a8e0ff, #d4f4ff);
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        .logo {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }
        .brand-name {
            margin-left: 10px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }
        .nav-items {
            margin-left: auto;
            display: flex;
            gap: 20px;
        }
        .nav-item {
            position: relative;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            color: black;
            background-color: transparent;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .nav-item:hover {
            background-color: #e0e0e0;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            top: 100%;
            left: 0;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown-icon {
            margin-left: 5px;
            font-size: 0.8em;
            transition: transform 0.3s;
        }
        .content-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 100px;
            width: 80%;
        }
        .quote {
            font-size: 48px;
            font-weight: bold;
            color: #333;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            line-height: 1.2;
        }
        .extra-content {
            text-align: left;
            font-size: 24px;
            color: #333;
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
        }
        .image-container {
            max-width: 400px;
            margin-top: 20px;
            width: 100%;
            text-align: right;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .login-btn {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            color: black;
            background-color: transparent;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }
        .login-btn i {
            margin-right: 5px;
            font-size: 20px;
        }
        .login-btn:hover {
            background-color: #e0e0e0;
        }
        .faq-section {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }
        .faq-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            color: white;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
            margin-right: 20px;
        }
        .faq-btn:last-child {
            margin-right: 0;
        }
        .faq-btn:hover {
            background-color: #0056b3;
        }
        .reviews-section {
            margin-top: 40px;
            width: 80%;
            text-align: center;
        }
        .reviews-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 36px;
            color: #333;
        }
        .reviews-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .review {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
        }
        .review h5 {
            margin: 0 0 10px 0;
            display: flex;
            align-items: center;
        }
        .review h5 i {
            margin-right: 8px;
        }
        .review p {
            margin: 0;
            display: flex;
            align-items: center;
        }
        .review p i {
            margin: 0 5px;
        }
        .partners-section {
            margin-top: 40px;
            width: 80%;
            text-align: center;
        }
        .partners-section h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        .partners-logos {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px; /* Space between logos */
        }
        .partner-logo img {
            max-width: 150px; /* Max width for logos */
            height: auto;
            margin-top: 20px;
            width: 100%;
            
            
        }
        .footer {
        padding: 40px 0;
        position: relative;
        bottom: 0;
        width: 100%;
    }
    .footer h5 {
        margin-bottom: 20px;
        font-family: 'Poppins', sans-serif;
    }
    .footer a {
        color: #007bff;
        text-decoration: none;
    }
    .footer a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">TC</div>
    <div class="brand-name">Technest Computers</div>
    <div class="nav-items">
        <div class="nav-item" onclick="toggleDropdown('computerDropdown')">
            <i class="fas fa-desktop"></i>Computer
            <i class="fas fa-caret-down dropdown-icon"></i>
            <div id="computerDropdown" class="dropdown-content">
                <a href="#">Desktop 1</a>
                <a href="#">Desktop 2</a>
                <a href="#">Desktop 3</a>
            </div>
        </div>
        <div class="nav-item" onclick="toggleDropdown('laptopDropdown')">
            <i class="fas fa-laptop"></i>Laptop
            <i class="fas fa-caret-down dropdown-icon"></i>
            <div id="laptopDropdown" class="dropdown-content">
                <a href="#">Laptop 1</a>
                <a href="#">Laptop 2</a>
                <a href="#">Laptop 3</a>
            </div>
        </div>
        <div class="nav-item" onclick="toggleDropdown('inputDropdown')">
            <i class="fas fa-mouse"></i>Input Devices
            <i class="fas fa-caret-down dropdown-icon"></i>
            <div id="inputDropdown" class="dropdown-content">
                <a href="#">Mouse 1</a>
                <a href="#">Mouse 2</a>
            </div>
        </div>
        <div class="nav-item" onclick="toggleDropdown('outputDropdown')">
            <i class="fas fa-print"></i>Output Devices
            <i class="fas fa-caret-down dropdown-icon"></i>
            <div id="outputDropdown" class="dropdown-content">
                <a href="#">Printer 1</a>
                <a href="#">Printer 2</a>
            </div>
        </div>
        <!-- Login Button -->
        <button class="login-btn" onclick="document.getElementById('loginForm').submit();">
            <i class="fas fa-lock"></i>Login
        </button>

        <form id="loginForm" action="{{ route('login') }}" method="GET" style="display: none;">
            @csrf
        </form>
    </div>
</header>

<div class="content-container">
    <div>
        <h1 class="quote">"Computers offered at the best price"</h1>
        <div class="extra-content">
            <p>Explore our range of high-performance computers, laptops, and accessories designed to meet your needs.</p>
            <p>Whether for work or play, we have the right solutions for you.</p>
        </div>
        
        <!-- FAQ and Read More Button -->
        <div class="faq-section">
            <button class="faq-btn">
                <i class="fas fa-question-circle"></i> FAQ
            </button>
            <button class="faq-btn">
                <i class="fas fa-book-open"></i> Read More
            </button>
        </div>
    </div>
    <div class="image-container">
        <img src="image/computer-img.png" alt="Computer Image">
    </div>
</div>

<!-- Customer Reviews Section -->
<div class="reviews-section">
    <h2>Customer Reviews</h2>
    <div class="reviews-grid">
        <div class="review">
            <h5><i class="fas fa-user-circle"></i> John Doe</h5>
            <p><i class="fas fa-quote-left"></i> "Great service and fantastic selection of computers! Highly recommend." <i class="fas fa-quote-right"></i></p>
        </div>
        <div class="review">
            <h5><i class="fas fa-user-circle"></i> Jane Smith</h5>
            <p><i class="fas fa-quote-left"></i> "I found the perfect laptop for my needs at a great price. Thank you!" <i class="fas fa-quote-right"></i></p>
        </div>
        <div class="review">
            <h5><i class="fas fa-user-circle"></i> Mike Johnson</h5>
            <p><i class="fas fa-quote-left"></i> "Excellent customer support and fast delivery. Will shop here again." <i class="fas fa-quote-right"></i></p>
        </div>
        <div class="review">
            <h5><i class="fas fa-user-circle"></i> Emily Davis</h5>
            <p><i class="fas fa-quote-left"></i> "Superb quality products and excellent after-sales service." <i class="fas fa-quote-right"></i></p>
        </div>
        <div class="review">
            <h5><i class="fas fa-user-circle"></i> Chris Brown</h5>
            <p><i class="fas fa-quote-left"></i> "Fast shipping and a great selection of electronics!" <i class="fas fa-quote-right"></i></p>
        </div>
        <div class="review">
            <h5><i class="fas fa-user-circle"></i> Anna Lee</h5>
            <p><i class="fas fa-quote-left"></i> "I love my new laptop! The performance is outstanding." <i class="fas fa-quote-right"></i></p>
        </div>
    </div>
</div>

<!-- Our Precious Partners Section -->
<div class="partners-section">
    <h2>Our Precious Partners</h2>
    <div class="partners-logos">
        <div class="partner-logo">
            <img src="image/acer-png.png" alt="ACER">
        </div>
        <div class="partner-logo">
            <img src="image/dell-png.png" alt="DELL">
        </div>
        <div class="partner-logo">
            <img src="image/lenovo-png.png" alt="LENOVO">
        </div>
        <div class="partner-logo">
            <img src="image/hp-png.png" alt="HP">
        </div>
    </div>
</div>
<!-- Footer Section -->
<footer class="footer bg-light text-dark mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 style="font-family: 'Poppins', sans-serif; font-size: 24px; font-weight: 600;"><i class="fas fa-concierge-bell"></i> Our Services</h5>
                <ul class="list-unstyled">
                    <li style="font-size: 18px;"><i class="fas fa-laptop"></i> <a href="#" style="text-decoration: none; color: inherit;">Computer Sales</a></li>
                    <li style="font-size: 18px;"><i class="fas fa-tools"></i> <a href="#" style="text-decoration: none; color: inherit;">Laptop Repair</a></li>
                    <li style="font-size: 18px;"><i class="fas fa-shopping-cart"></i> <a href="#" style="text-decoration: none; color: inherit;">Accessory Sales</a></li>
                    <li style="font-size: 18px;"><i class="fas fa-headset"></i> <a href="#" style="text-decoration: none; color: inherit;">Technical Support</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 style="font-family: 'Poppins', sans-serif; font-size: 24px; font-weight: 600;"><i class="fas fa-box-open"></i> Our Products</h5>
                <ul class="list-unstyled">
                    <li style="font-size: 18px;"><i class="fas fa-desktop"></i> <a href="#" style="text-decoration: none; color: inherit;">Desktops</a></li>
                    <li style="font-size: 18px;"><i class="fas fa-laptop"></i> <a href="#" style="text-decoration: none; color: inherit;">Laptops</a></li>
                    <li style="font-size: 18px;"><i class="fas fa-tv"></i> <a href="#" style="text-decoration: none; color: inherit;">Monitors</a></li>
                    <li style="font-size: 18px;"><i class="fas fa-keyboard"></i> <a href="#" style="text-decoration: none; color: inherit;">Keyboards</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 style="font-family: 'Poppins', sans-serif; font-size: 24px; font-weight: 600;"><i class="fab fa-share-alt"></i> Follow Us On</h5>
                <ul class="list-unstyled">
                    <li style="font-size: 18px;"><i class="fab fa-facebook"></i> <a href="#" style="text-decoration: none; color: inherit;">Facebook</a></li>
                    <li style="font-size: 18px;"><i class="fab fa-twitter"></i> <a href="#" style="text-decoration: none; color: inherit;">Twitter</a></li>
                    <li style="font-size: 18px;"><i class="fab fa-instagram"></i> <a href="#" style="text-decoration: none; color: inherit;">Instagram</a></li>
                    <li style="font-size: 18px;"><i class="fab fa-linkedin"></i> <a href="#" style="text-decoration: none; color: inherit;">LinkedIn</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 style="font-family: 'Poppins', sans-serif; font-size: 24px; font-weight: 600;"><i class="fas fa-envelope"></i> Contact Us</h5>
                <form id="contactForm">
                    <div class="mb-3">
                        <textarea class="form-control" rows="3" placeholder="Leave a message..." style="font-size: 18px; font-family: 'Poppins', sans-serif;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="font-size: 18px; font-family: 'Poppins', sans-serif;">Send <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</footer>




<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        
        const dropdowns = ['computerDropdown', 'laptopDropdown', 'inputDropdown', 'outputDropdown'];
        dropdowns.forEach(function(drop) {
            if (drop !== id) {
                document.getElementById(drop).style.display = 'none';
            }
        });
    }

    window.onclick = function(event) {
        if (!event.target.matches('.nav-item') && !event.target.matches('.login-btn')) {
            const dropdowns = ['computerDropdown', 'laptopDropdown', 'inputDropdown', 'outputDropdown'];
            dropdowns.forEach(function(drop) {
                document.getElementById(drop).style.display = 'none';
            });
        }
    }
</script>

</body>
</html>
