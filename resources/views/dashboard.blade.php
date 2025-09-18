@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-wrapper">
        {{-- ================= STUDENT VIEW ================= --}}
        @if($role === 'student')
            <!-- Hero Section -->
<section class="hero-section d-flex align-items-center justify-content-center text-white"
         style="
            min-height: 60vh; 
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                        url('/images/dashboard_2.jpg') no-repeat top right; 
            background-size: cover;
            background-position: top right;">

                <div class="text-center animate__animated animate__fadeInDown">
                    <h1 class="fw-bold mb-3 display-4">Welcome, {{ $user->name }}</h1>
                    <p class="lead fs-4">Nice to see you again 👋</p>
                    <a href="{{ route('enrollment.index') }}" class="btn btn-light btn-lg mt-3 animate__animated animate__pulse">Explore Courses</a>
                </div>
            </section>

            <!-- Registered Courses -->
            <section class="container py-5">
                <h2 class="section-title animate__animated animate__fadeIn">📚 Your Enrolled Courses</h2>
                <div class="row g-4">
                    @forelse($courses ?? [] as $course)
                        <div class="col-md-6 col-lg-4">
                            <div class="card course-card h-100 animate__animated animate__fadeInUp">
                                <div class="card-body">
                                    <h5 class="card-title fs-5 fw-bold">{{ $course->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    <p class="small mb-1"><i class="fa-regular fa-calendar me-1"></i>Start Date: <b>{{ $course->start_date }}</b></p>
                                    <p class="small"><i class="fa-solid fa-users me-1"></i>Enrolled: <b>{{ $course->students->count() }}</b> / {{ $course->max_students }}</p>
                                    <div class="progress mt-3" style="height: 8px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($course->students->count() / $course->max_students) * 100 }}%;" aria-valuenow="{{ ($course->students->count() / $course->max_students) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 text-end">
                                    <form action="{{ route('courses.unenroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Unenroll</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted fs-5">You haven't enrolled in any courses yet.</p>
                    @endforelse
                </div>
            </section>

            <!-- Suggested Courses -->
            <section class="container py-5">
                <h2 class="section-title animate__animated animate__fadeIn">✨ Recommended for You</h2>
                <div class="row g-4">
                    @forelse($suggestedCourses ?? [] as $course)
                        <div class="col-md-6 col-lg-4">
                            <div class="card course-card h-100 animate__animated animate__fadeInUp">
                                <div class="card-body">
                                    <h5 class="card-title fs-5 fw-bold">{{ $course->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    <p class="small mb-1"><i class="fa-regular fa-calendar me-1"></i>Start Date: <b>{{ $course->start_date }}</b></p>
                                    <p class="small"><i class="fa-solid fa-users me-1"></i>Enrolled: <b>{{ $course->students->count() }}</b> / {{ $course->max_students }}</p>
                                    <div class="progress mt-3" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($course->students->count() / $course->max_students) * 100 }}%;" aria-valuenow="{{ ($course->students->count() / $course->max_students) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 text-end">
                                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Enroll</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted fs-5">No recommendations available at the moment.</p>
                    @endforelse
                </div>
            </section>

            {{-- ================= INSTRUCTOR VIEW ================= --}}
        @elseif($role === 'instructor')
<section class="hero-section d-flex align-items-center justify-content-center text-white"
         style="min-height: 70vh; 
                background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.2)),
                           url('/images/your-image.jpeg') no-repeat top center; 
                background-size: 130% auto; 
                background-position: top center;">
    <div class="text-center animate__animated animate__fadeInDown">
        <h1 class="fw-bold mb-3 display-4">Welcome, {{ $user->name }}</h1>
        <p class="lead fs-4">Here are your current courses</p>
        <a href="{{ route('courses.create') }}" class="btn btn-light btn-lg mt-3 animate__animated animate__pulse">Add New Course</a>
    </div>
</section>



            <section class="container py-5">
                <h2 class="section-title animate__animated animate__fadeIn">📚 Your Courses</h2>
                <div class="row g-4">
                    @forelse($mycourses ?? [] as $course)
                        <div class="col-md-6 col-lg-4">
                            <div class="card course-card h-100 animate__animated animate__fadeInUp">
                                <div class="card-body">
                                    <h5 class="card-title fs-5 fw-bold">{{ $course->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                                    <p class="small mb-1"><i class="fa-regular fa-calendar me-1"></i>Start: <b>{{ $course->start_date }}</b></p>
                                    <p class="small"><i class="fa-solid fa-users me-1"></i>Enrolled: <b>{{ $course->students->count() }}</b></p>
                                    <div class="progress mt-3" style="height: 8px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($course->students->count() / $course->max_students) * 100 }}%;" aria-valuenow="{{ ($course->students->count() / $course->max_students) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 d-flex justify-content-between flex-wrap gap-2">
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('courses.students', $course->id) }}" class="btn btn-info btn-sm">Students</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted fs-5">You haven't created any courses yet.</p>
                    @endforelse

                    <div class="col-md-6 col-lg-4">
                        <div class="card add-course-card h-100 d-flex align-items-center justify-content-center animate__animated animate__fadeInUp" onclick="location.href='{{ route('courses.create') }}'">
                            <span class="display-4 text-success"><i class="fa-solid fa-plus"></i></span>
                            <p class="mt-2 fs-5">Add New Course</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ================= ADMIN VIEW ================= --}}
        @elseif($role === 'admin')
            <section class="hero-section d-flex align-items-center justify-content-center text-white" style="min-height: 50vh; background: linear-gradient(135deg, #6f42c1, #0d6efd);">
                <div class="text-center animate__animated animate__fadeInDown">
                    <h1 class="fw-bold display-4">Welcome Admin 👑</h1>
                    <p class="lead fs-4">Choose what you want to manage from the sidebar.</p>
                </div>
            </section>
        @endif
    </div>

    {{-- ============= Extra Styling ============= --}}
    <style>
        .section-title {
            font-weight: 700;
            margin-bottom: 2rem;
            color: #023c6e;
            position: relative;
            padding-bottom: 10px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #00c2f2;
        }
        .course-card {
            border: none;
            border-radius: 1.25rem;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .add-course-card {
            cursor: pointer;
            border: 2px dashed #198754;
            border-radius: 1.25rem;
            background: #f9fefb;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .add-course-card:hover {
            background: #e8f9f0;
            transform: scale(1.02);
        }
        .hero-section {
            border-radius: 0 0 2rem 2rem;
            overflow: hidden;
            position: relative;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .hero-section .text-center {
            position: relative;
            z-index: 2;
        }
        .btn {
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        @media (max-width: 767px) {
            .hero-section {
                min-height: 40vh;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
            .hero-section p {
                font-size: 1.2rem;
            }
            .course-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>

    {{-- Include Animate.css for animations --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection
