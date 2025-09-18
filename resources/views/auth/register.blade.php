<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

   <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(120deg, #1c92d2, #f2fcfe);
      padding-top: 80px;
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    main {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }

    /* Navbar Styling */
    .navbar {
      background: #fcfcff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1030;
      border-radius: 50px;
      margin-top: 10px;
      margin-left: 10px;
      margin-right: 10px;
      width: calc(100% - 20px);
    }
    .navbar-brand span {
      color: #333333;
      font-size: 1.5rem;
      font-weight: 700;
    }
    .navbar-nav .nav-link {
      color: #023c6e;
      font-weight: 600;
      margin-left: 15px;
      transition: color 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
      color: #007bff;
    }
    .navbar-actions .btn {
      border-radius: 50px;
      font-weight: 600;
      padding: 8px 20px;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    .navbar-actions .btn-members {
      background-color: transparent;
      color: #555555;
      border: 1px solid #ddd;
    }
    .navbar-actions .btn-members:hover {
      background-color: #f0f0f0;
    }
    .navbar-actions .btn-login {
      background-color: transparent;
      color: #023c6e !important;
      border: 1px solid #023c6e;
    }
    .navbar-actions .btn-login:hover {
      background-color: #023c6e;
      color: #ffffff !important;
      transform: scale(1.05);
    }
    .navbar-actions .btn-register {
      background-color: #023c6e;
      color: #ffffff;
      border: 1px solid #023c6e;
      animation: bounceIn 0.8s ease-out;
    }
    .navbar-actions .btn-register:hover {
      background-color: #012a4a;
      color: #ffffff;
      transform: scale(1.05);
    }
    .navbar-search {
      position: relative;
    }
    .navbar-search .form-control {
      border-radius: 50px;
      background-color: #f0f4f7;
      border: none;
      padding-right: 40px;
    }
    .navbar-search .btn-search {
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      background: transparent;
      border: none;
      color: #888;
    }

    /* Footer Styling */
    .footer {
      background-color: #023c6e;
      color: #ecf0f1;
      padding: 50px 0 20px;
      margin-top: auto;
    }
    .footer .footer-title {
      color: #ffffff;
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 25px;
      position: relative;
    }
    .footer .footer-title::after {
      content: '';
      display: block;
      width: 50px;
      height: 3px;
      background: #00c2f2;
      margin-top: 10px;
    }
    .footer .footer-links li a {
      color: #bdc3c7;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .footer .footer-links li a:hover {
      color: #00c2f2;
    }
    .footer-social-links a {
      color: #ecf0f1;
      font-size: 20px;
      margin-left: 15px;
      transition: color 0.3s ease, transform 0.3s ease;
    }
    .footer-social-links a:hover {
      color: #00c2f2;
      transform: scale(1.2);
    }
    .footer-bottom {
      background-color: #023c6e;
      padding: 15px 0;
      margin-top: 30px;
      font-size: 14px;
    }

    /* Register Box Styling */
    .container-box {
      display: flex;
      width: 700px;
      border-radius: 25px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
      animation: fadeSlideIn 1s ease-in-out;
      background: rgba(255, 255, 255, 0.15);
    }
    .left {
      flex: 1;
      position: relative;
      background-image: url('/images/istockphoto-1500285927-612x612.jpg');
      background-size:cover;
      background-position:center;
      background-repeat:no-repeat;
    }
    .left-content {
      color: #fff;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 100%;
      position: relative;
      z-index: 2;
      background:rgba(0,0,0,0.4);
    }
    .right {
      flex: 1;
      backdrop-filter: blur(20px);
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .form-control, .form-select {
      background: rgba(255,255,255,0.3);
      border: none;
      border-radius: 12px;
      color: #fff;
      padding-left: 40px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }
    .form-control::placeholder {
      color: #eee;
    }
    .input-group-text {
      background: transparent;
      border: none;
      color: #fff;
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      z-index: 10;
    }
    .input-group {
      position: relative;
      margin-bottom: 20px;
    }
    .btn-register {
      background: linear-gradient(135deg, #1c92d2, #f2fcfe);
      border: none;
      border-radius: 12px;
      padding: 12px;
      font-weight: bold;
      color: #000;
      transition: 0.3s;
    }
    .btn-register:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .text-link {
      color: #fff;
      font-weight: bold;
      text-decoration: none;
    }
    .text-link:hover {
      text-decoration: underline;
    }
    .form-select option {
        background-color: #023c6e;
        color: #fff;
    }

    /* Animations */
    @keyframes fadeSlideIn {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounceIn {
      0% { transform: scale(0.3); opacity: 0; }
      50% { transform: scale(1.05); opacity: 1; }
      70% { transform: scale(0.9); }
      100% { transform: scale(1); }
    }

    /* Media Queries */
    @media (max-width: 991px) {
        .navbar-toggler {
          background-color: transparent;
          border: 1px solid var(--primary-color);
        }
        .navbar-toggler-icon {
          background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgb(2, 60, 110)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }
        .navbar-nav .nav-link {
            color: #023c6e !important;
            background-color: transparent;
            padding: 10px 15px;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: #ffffff !important;
            background-color: #023c6e;
            transform: none;
        }
        .container-box {
            flex-direction: column;
            width: 90%;
            height: auto;
            margin-top: 40px;
        }
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <span class="fw-bold text-dark">Emerge Academy</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="/#hero" id="home-link">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/#about" id="about-link">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}" id="courses-link">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="/#instructor" id="instructor-link">Instructor</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact" id="contact-link">Contact</a></li>
            </ul>
            <div class="d-flex navbar-actions">
                <a href="{{ route('login') }}" class="btn btn-login btn-sm d-flex align-items-center me-2"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
                <a href="/register" class="btn btn-register btn-sm d-flex align-items-center"><i class="fas fa-user-plus me-1"></i>Register</a>
            </div>
        </div>
    </div>
</nav>

<main>
    <div class="container-box">
        <div class="left d-flex flex-column justify-content-center align-items-center p-5">
            <div class="left-content text-center">
                <h2>Join Us 🎓</h2>
                <p>Create your account and start learning & teaching today.</p>
            </div>
        </div>
        <div class="right">
            <h3 class="text-white text-center mb-4">Create Your Account</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user-graduate"></i></span>
                    <select name="role" class="form-select" required>
                        <option value="">Select Role</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                    </select>
                </div>
                <button type="submit" class="btn-register w-100">Register</button>
            </form>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-link">Already have an account? Login</a>
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h5 class="footer-title">About Emerge Academy</h5>
                <p>Emerge Academy is your go-to destination for acquiring new skills and knowledge online. We offer high-quality courses presented by top experts.</p>
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="/#hero">Home</a></li>
                    <li><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li><a href="/#instructor">Instructors</a></li>
                    <li><a href="/#contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">Follow Us</h5>
                <p>Stay up to date with our latest news by following us on social media.</p>
                <div class="footer-social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <div class="container">
            &copy; 2025 All rights reserved to Emerge Academy platform.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var navbarCollapse = document.getElementById('navbarNav');
        var navLinks = document.querySelectorAll('#navbarNav .nav-link');
        var bsCollapse = new bootstrap.Collapse(navbarCollapse, {
            toggle: false
        });

        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (navbarCollapse.classList.contains('show')) {
                    bsCollapse.hide();
                }
            });
        });
    });
</script>

</body>
</html>