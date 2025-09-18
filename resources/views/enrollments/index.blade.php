@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative text-white" 
         style="height: 650px; 
                background: url('/images/courses-page.jpg') top center / cover no-repeat; 
                margin-top: -80px;"> 
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative" style="z-index: 5;">
        <h1 class="display-3 fw-bold text-center" style="font-family: 'Poppins', sans-serif;">All Courses</h1>
        <p class="lead mt-3 text-center" style="font-size: 1.4rem; font-family: 'Poppins', sans-serif;">
            Explore all available courses and start learning today!
        </p>
        <a href="/" class="btn btn-outline-light rounded-pill mt-4 px-5 py-3" style="font-size: 1.1rem; font-weight: 600;">
             <i class="fa-solid fa-arrow-right"></i> Home 
        </a>
    </div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(2,60,110,0.1); z-index:1;"></div>
</section>

<!-- Courses Section -->
<section class="courses-section py-5 bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-5 fw-bold" style="font-size: 2.5rem; font-family: 'Poppins', sans-serif; color: #023c6e;">
            Explore Our Courses
        </h2>

        <div class="row g-4">
            @foreach($courses as $course)
            <div class="col-md-4">
                <div class="card h-100 text-white shadow-lg border-0 rounded-4 overflow-hidden course-card"
                     style="background: linear-gradient(135deg, #023c6e, #005a91); font-family: 'Poppins', sans-serif;">
                    <div class="d-flex align-items-center justify-content-center flex-column py-4">
                        <i class="fa-solid fa-graduation-cap fa-3x text-white mb-3"></i>
                        <h5 class="card-title fw-bold text-center" style="font-size: 2rem;">{{ $course->title }}</h5>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <p class="card-text" style="font-size: 1.1rem; line-height: 1.6;">{{ $course->description }}</p>
                        
                        <div class="d-flex justify-content-between mb-3" style="font-size: 0.95rem;">
                            <span>
                                <i class="fa-regular fa-calendar me-1"></i>
                                {{ $course->start_date }}
                            </span>
                            <span>
                                <i class="fa-solid fa-user-group me-1"></i>
                                {{ $course->students->count() }}/{{ $course->max_students }}
                            </span>
                        </div>

                        <div class="mt-auto">
                            @if(session('user_role') === 'student')
                                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-light w-100 fw-semibold py-2">
                                        Enroll
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-light w-100 fw-semibold py-2">Login to Enroll</a>
                            @endif
                        </div>
                    </div>

                    <div class="course-overlay position-absolute w-100 h-100 start-0 bottom-0" style="background: rgba(0,0,0,0.15); transform: translateY(100%); transition: transform 0.3s ease;"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.course-card {
    transition: all 0.3s ease;
}
.course-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.35);
}
.course-card:hover .course-overlay {
    transform: translateY(0);
}
.course-card i {
    font-size: 2rem;
}
.course-card p, .course-card h5, .course-card span {
    color: #fff;
}
</style>
@endsection
