<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Emerge Academy')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @yield('styles')
   <style>
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    min-height: 100vh;
    /* padding-top: 70px; */
    display: flex;
    flex-direction: column;
  }

  main {
    flex-grow: 1;
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

 /* Styling for Login button with border */
.navbar-actions .btn-login {
  background-color: transparent; /* Makes the background transparent */
  color: #023c6e !important;
  border: 1px solid #023c6e;
}
/* Hover effect for Login button */
.navbar-actions .btn-login:hover {
  background-color: #023c6e; /* Fills the background on hover */
  color: #ffffff !important;
  transform: scale(1.05);
}

  /* تعديل زرار Register */
  .navbar-actions .btn-register {
    background-color: #023c6e;
    color: #ffffff;
    border: 1px solid #023c6e;
    animation: bounceIn 0.8s ease-out;
  }

  .navbar-actions .btn-register:hover {
    background-color: #012a4a; /* درجة أغمق من اللون الأساسي */
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

  .footer {
    background-color: #023c6e;
    color: #ecf0f1;
    padding: 50px 0 20px;
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

  /* Keyframes for animations */
  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  @keyframes bounceIn {
    0% {
      transform: scale(0.3);
      opacity: 0;
    }
    50% {
      transform: scale(1.05);
      opacity: 1;
    }
    70% {
      transform: scale(0.9);
    }
    100% {
      transform: scale(1);
    }
  }

  /* تعديل وضع الموبايل */
  @media (max-width: 991px) {
     .navbar-toggler {
    background-color: transparent; /* خلفية الزرار شفافة */
    border: 1px solid var(--primary-color); /* بوردر باللون الكحلي */
  }
      .navbar-toggler-icon {
    /* تغيير لون أيقونة الهامبرجر نفسها إلى الكحلي */
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
    .hero-section .container {
        flex-direction: column;
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
                <li class="nav-item"><a class="nav-link" href="{{ route('enrollment.index') }}" id="courses-link">Courses</a></li>
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
        @yield('content')
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
