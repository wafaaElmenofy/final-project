@extends('layouts.main')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emerge Academy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #023c6e;
            --secondary-color: #007bff;
            --light-bg: #f0f2f5;
            --text-color: #333333;
            --light-text: #ffffff;
            --section-padding: 80px 0;
        }
/* General Sections Styling */
.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 40px;
    position: relative;
    display: inline-block;
}
.section-title::after {
    content: '';
    display: block;
    width: 70%;
    height: 4px;
    background-color: var(--secondary-color);
    margin-top: 10px;
    border-radius: 2px;
}
.section-transition {
    width: 100%;
    height: 150px;
    background-image: linear-gradient(to top, var(--light-bg), transparent);
    margin-top: -150px;
    position: relative;
    z-index: 2;
}
section {
    padding: var(--section-padding);
}

/* Hero Section Styling */
.hero-section {
    position: relative;
    background-image: url('/images/dashboard_1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: var(--light-text);
    text-align: center;
    height: 100vh;
    margin-top: -80px;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}
.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(3px);
    z-index: -1;
}
.hero-section h1 {
    position: relative;
    font-size: 3.5rem;
    font-weight: 700;
    animation: fadeInDown 2s ease-out;
}
.hero-section p {
    position: relative;
    font-size: 1.2rem;
    margin-top: 20px;
    animation: fadeInUp 2s ease-out;
}
.hero-section .btn {
    margin-top: 30px;
    background-color: var(--primary-color);
    color: var(--light-text);
    border: 1px solid var(--primary-color);
    padding: 12px 30px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.hero-section .btn:hover {
    background-color: #012a4a;
    color: var(--light-text);
    transform: scale(1.05);
}

/* About Section - Timeline Style */
.about-section {
    padding: 100px 0;
    position: relative;
    /* background-color: var(--light-bg); */
    /* background-color:#f0f0f0; */
    /* background-color:#FAFAFA; */
    /* background-color:#F7F7F7; */

}
.about-section h2 {
    color: var(--primary-color);
}
/* The main timeline line */

.timeline-item {
    position: relative;
    margin-bottom: 50px;
    display: flex;
    align-items: center;
    width: 100%;
}
.timeline-content {
    background-color: white;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 1;
    border: 4px solid var(--light-bg);
}
.timeline-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.timeline-text {
    width: calc(50% - 100px);
    padding: 20px;
    background-color: var(--light-bg);
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1s ease-out, transform 1s ease-out;
}
/* Style for the second timeline card */
.timeline-item:nth-of-type(2) .timeline-text {
    background-color: #0056b3 !important;
    color: white;
}
.timeline-item.in-view .timeline-text {
    opacity: 1;
    transform: translateY(0);
}
.timeline-item h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-color);
}
.timeline-item h4 {
    color: var(--primary-color);
    font-size: 1.2rem;
    margin-bottom: 15px;
}
/* Left-aligned items */
.timeline-left {
    justify-content: flex-start;
}
.timeline-left .timeline-content {
    margin-right: -75px;
}
.timeline-left .timeline-text {
    margin-left: 100px;
    text-align: left;
}
/* Right-aligned items */
.timeline-right {
    justify-content: flex-end;
}
.timeline-right .timeline-content {
    order: 2;
    margin-left: -75px;
}
.timeline-right .timeline-text {
    order: 1;
    margin-right: 100px;
    text-align: right;
}


/* Responsive adjustments */
@media (max-width: 768px) {
    /* Hide the vertical line on smaller screens for a cleaner look */
    .about-section .container::before {
        display: none;
    }

    /* Force all timeline items into a vertical stack */
    .timeline-item {
        flex-direction: column;
        align-items: center; /* Center the image and text card */
        text-align: center;
        margin-bottom: 50px; /* Add space between each item */
    }

    /* Reset the margins on the image circle */
    .timeline-content {
        margin: 0 !important;
        margin-bottom: 20px !important;
    }

    /* Make the text card full width and center its text */
    .timeline-text {
        width: 100%; /* Make it fill the available space */
        margin: 0 !important; /* Remove any left/right margins */
        text-align: center !important;
    }

    /* Adjust the last circle to be in the center as well */
    .timeline-end .timeline-content {
        margin-top: 20px;
    }
}


/* Responsive adjustments */
/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    /* Hide the vertical line on smaller screens for a cleaner look */
    .about-section .container::before {
        display: none;
    }

    /* Force all timeline items into a vertical stack */
    .timeline-item {
        flex-direction: column;
        align-items: center; 
        text-align: center;
        margin-bottom: 50px; 
    }

    /* Reset the margins on the image circle */
    .timeline-content {
        margin: 0 !important;
        margin-bottom: 20px !important;
    }

  
    .timeline-text {
        width: 100%; 
        margin: 0 !important; 
        text-align: center !important;
    }

    /* Adjust the last circle to be in the center as well */
    .timeline-end .timeline-content {
        margin-top: 20px;
    }
}
/* Courses Section Styling */
.courses-section {
    background-color: var(--light-bg);
}/* Course Card Styling */
.course-card {
background-color: #fff;
border-radius: 15px;
box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
overflow: hidden;
transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
cursor: pointer;
height: 100%;
display: flex;
flex-direction: column;
}

.course-card:hover {
transform: translateY(-10px) scale(1.02);
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

.course-image {
width: 100%;
overflow: hidden;
border-top-left-radius: 15px;
border-top-right-radius: 15px;
}

.course-image img {
width: 100%;
height: auto;
display: block;
transition: transform 0.5s ease-in-out;
}
.course-card:hover .course-image img {
    transform: scale(1.1);
}
.card-body {
padding: 25px;
flex-grow: 1; 
display: flex;
flex-direction: column;
justify-content: space-between;
}

.card-body h5 {
font-weight: 700;
color: var(--primary-color);
margin-bottom: 10px;
}

.card-body p {
color: var(--text-color);
font-size: 0.9rem;
line-height: 1.5;
margin-bottom: 15px;
}

.rating {
color: #ffc107;
font-size: 1rem;
margin-top: auto;
}

.rating .far {
color: #e0e0e0;
}
.custom-btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    font-weight: 600;
    border-radius: 50px;
    padding: 12px 30px;
    transition: background-color 0.3s ease;
}

.custom-btn-primary:hover {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
}

/* Instructor Section Styling */
.instructor-section {
    background-color: var(--light-bg);
}

/* Instructor Section Styling */
.instructor-section {
    background-color: var(--light-bg);
}

/* New Instructor Card Style (matches course-card) */
.instructor-card-new {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    cursor: pointer;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.instructor-card-new:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

.instructor-card-new .card-image {
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 20px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.instructor-card-new .card-image img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--primary-color);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.5s ease-in-out;
}

.instructor-card-new:hover .card-image img {
    transform: scale(1.1);
}

/* Reuse existing card-body styles */
.instructor-card-new .card-body {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
}

.instructor-card-new h5 {
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.instructor-card-new p {
    color: var(--text-color);
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 15px;
}

/* Rating Style (added for instructors) */
.rating {
    color: #ffc107;
    font-size: 1rem;
    margin-top: auto;
}

.rating .far {
    color: #e0e0e0;
}

/* Remove old carousel and instructor card styles */
.carousel-container, .carousel-track, .carousel-btn, .instructor-card {
    display: none !important; /* Hides old carousel components and cards */
}
/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .instructor-card-wrapper {
        max-width: 100%; /* Displays one card at a time */
    }
    .carousel-btn {
        display: none; /* Hide navigation arrows on mobile */
    }
}
/* Contact Section Styling */
/* Contact Section Styling */
.contact-section {
    background-color: var(--light-bg);
}

.contact-form-container {
    background-color: white; /* نفس لون خلفية بطاقات الدورات */
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
}

.map-container {
    background-color: white;
    padding: 10px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden; /* لمنع المحتوى من تجاوز الحدود الدائرية */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.map-container:hover {
    transform: scale(1.05); /* تكبير الخريطة بنسبة 5% عند الهوفر */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12); /* تغيير الظل */
}

.contact-info p {
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.contact-info i {
    color: var(--secondary-color);
    margin-right: 10px;
}

.contact-form .form-control {
    border-radius: 50px;
}
.contact-form .form-control:focus {
    box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    border-color: var(--secondary-color);
}

.contact-form .btn-primary {
    background-color: var(--primary-color);
    border: none;
    border-radius: 50px;
    padding: 10px 30px;
    transition: background-color 0.3s ease;
}

.contact-form .btn-primary:hover {
    background-color: var(--secondary-color);
}
    </style>
</head>
<body>

    <main>
        <section id="hero" class="hero-section">
            <div class="container">
                <h1>Your Journey to Learning Starts Here</h1>
                <p>Emerge Academy offers the best online courses to help you master new skills and advance your career.
                    <br>
                     Join thousands of students today!</p>
                <a href="#courses" class="btn btn-primary">Browse Courses</a>
            </div>
        </section>


        <!-- <div class="section-transition"></div> -->


        <section id="about" class="about-section">
    <div class="container">
        <h2 class="text-center mb-5 section-title">About Emerge Academy </h2>

        <div class="timeline-item timeline-left">
            <div class="timeline-content">
                <img src="/images/d6.png" class="timeline-image" alt="Our Journey">
            </div>
            <div class="timeline-text">
                <h3>What is Emerge Academy?</h3>
                <h4>Emerge Academy is a comprehensive educational platform .</h4>
                <p>That launched in 2024 to provide a unique remote learning experience. We offer a wide range of innovative courses in various fields, from technology and programming to design and the arts. Our goal is to empower individuals to build and develop their skills to meet the evolving demands of the job market.</p>
            </div>
        </div>

        <div class="timeline-item timeline-right">
            <div class="timeline-content">
                <img src="/images/images.jpeg" class="timeline-image" alt="Transition to Full Service">
            </div>
            <div class="timeline-text" id="timeline-text-2">
                <h3>What Makes Emerge Academy Different?</h3>
                <h4>What sets Emerge Academy apart is its focus on creating an interactive learning environment .</h4>
                <p> That isn't just for adults—it's for children too. We believe that learning should be fun and engaging at every age. That's why we've designed our programs and courses to spark curiosity and creativity in young minds, allowing them to acquire knowledge and skills in a smooth and innovative way.</p>
            </div>
        </div>

        <div class="timeline-item timeline-left">
            <div class="timeline-content">
                <img src="/images/download.jpeg" class="timeline-image" alt="Phase Two Expansion">
            </div>
            <div class="timeline-text">
                <h3>What's the Secret to Our Outstanding Learning Experience?</h3>
                <h4>The secret to our outstanding learning experience lies in our collaboration with an elite group of the most skilled trainers from around the world.</h4>
                <p> These instructors aren't just lecturers; they're experts in their fields with extensive practical experience. This allows them to deliver precise and modern content that blends theoretical knowledge with practical application, ensuring our students get a rich and distinguished educational journey.</p>
            </div>
        </div>



    </div>
</section>

        <div class="section-transition"></div>

<section id="courses" class="courses-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Our Courses</h2>
        </div>

        <div class="row mt-5">

        <div class="col-md-4 mb-4">

        <div class="course-card">

        <div class="course-image">
            <img src="/images/course_1663052056.jpg" alt="Web Development Course" class="img-fluid">
        </div>
        <div class="card-body">
            <h5>Web Development Fundamentals</h5>
            <p>A comprehensive course for beginners to learn HTML, CSS, and JavaScript. Build your first website from scratch.</p>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
        </div>
    </div>


    <div class="col-md-4 mb-4">
        <div class="course-card">
            <div class="course-image">
                <img src="/images/images (1).jpg" alt="Data Science Course" class="img-fluid">
            </div>
            <div class="card-body">
                <h5>Data Science with Python</h5>
                <p>Dive into the world of data with Python. Learn data analysis, visualization, and machine learning basics.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i> <!-- نجمة نصف ممتلئة -->
                    <i class="far fa-star"></i>
                </div>
            </div>
            </div>
        </div>
    <div class="col-md-4 mb-4">
        <div class="course-card">
            <div class="course-image">
                <img src="/images/graphics-design-mastercla-selar.co-62eb528d2c0be.jpg" alt="Graphic Design Course" class="img-fluid">
            </div>
            <div class="card-body">
                <h5>Graphic Design Masterclass</h5>
                <p>Unlock your creativity and master tools like Photoshop and Illustrator to create stunning visual designs.</p>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
</section>






        <div class="section-transition"></div>
<section id="instructor" class="instructor-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Meet Our Instructors</h2>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="instructor-card-new">
                    <div class="card-image">
                        <img src="/images/17fa44e8d7f0d4a341f078b6c94a31ef.jpg" alt="Instructor 1" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5>Jane Doe</h5>
                        <p>Senior Developer</p>
                        <p>Specializes in full-stack development with over 10 years of experience.</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="instructor-card-new">
                    <div class="card-image">
                        <img src="/images/portrait-young-teacher-near-whiteboard-260nw-1656704701.webp" alt="Instructor 2" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5>John Smith</h5>
                        <p>Data Scientist</p>
                        <p>Expert in machine learning and big data with a passion for teaching.</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="instructor-card-new">
                    <div class="card-image">
                        <img src="/images/young-happy-business-woman-sitting-260nw-2223351415.webp" alt="Instructor 3" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h5>Emily White</h5>
                        <p>Lead UI/UX Designer</p>
                        <p>A creative professional focused on crafting intuitive user experiences.</p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <div class="section-transition"></div>

        <section id="contact" class="contact-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Get In Touch</h2>
            <p class="lead">Have a question? We'd love to hear from you.</p>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 mb-4">
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> 123 Learning Lane, Knowledge City</p>
                    <p><i class="fas fa-envelope"></i> contact@emergeacademy.com</p>
                    <p><i class="fas fa-phone"></i> +123 456 7890</p>
                </div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.253676237248!2d-73.98785318464627!3d40.7484402793282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25964894380b5%3A0xc033621a2d1f40d7!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1614798547493!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-container">
                    <form class="contact-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var timelineItems = document.querySelectorAll('.timeline-item');
        var observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                } else {
                    entry.target.classList.remove('in-view');
                }
            });
        }, { threshold: 0.5 }); // Adjust threshold to change when the animation triggers

        timelineItems.forEach(item => {
            observer.observe(item);
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all necessary elements
        const carouselTrack = document.querySelector('.carousel-track');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const cards = document.querySelectorAll('.instructor-card-wrapper');
        const totalCards = cards.length;
        let currentIndex = 0;

        // Function to move to a specific slide
        const moveToSlide = (index) => {
            if (cards.length > 0) {
                // Calculate the width of a single card, including its padding
                const cardWidth = cards[0].offsetWidth;
                // Move the carousel track
                carouselTrack.style.transform = `translateX(${-index * cardWidth}px)`;
                currentIndex = index;
            }
        };

        // Event listener for the "Next" button
        nextBtn.addEventListener('click', () => {
            let newIndex = currentIndex + 1;
            // If it's the last card, loop back to the beginning
            if (newIndex >= totalCards) {
                newIndex = 0;
            }
            moveToSlide(newIndex);
        });

        // Event listener for the "Previous" button
        prevBtn.addEventListener('click', () => {
            let newIndex = currentIndex - 1;
            // If it's the first card, loop to the last card
            if (newIndex < 0) {
                newIndex = totalCards - 1;
            }
            moveToSlide(newIndex);
        });
    });
</script>
</body>

@endsection