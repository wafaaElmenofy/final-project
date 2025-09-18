@extends('layouts.main')

@section('title', 'Course Students: ' . $course->title)

@section('content')
    <div class="students-wrapper">
        <!-- Hero Section -->
        <section class="hero-section d-flex align-items-center justify-content-center text-white" style="min-height: 50vh; background: linear-gradient(135deg, #0d6efd, #023c6e);">
            <div class="text-center animate__animated animate__fadeInDown">
                <h1 class="fw-bold mb-3 display-4">Students of: {{ $course->title }}</h1>
                <p class="lead fs-4">Manage enrolled students in this course</p>
                <a href="{{ route('courses.index') }}" class="btn btn-light btn-lg mt-3 animate__animated animate__pulse">Back to Courses</a>
            </div>
        </section>

        <!-- Students List -->
        <section class="container py-5">
            <h2 class="section-title animate__animated animate__fadeIn">📋 Students List</h2>
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    @if($course->students->isEmpty())
                        <p class="text-center text-muted fs-5">No students have enrolled in this course yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Enrollment Date</th>
{{--                                    <th scope="col" class="text-end">Actions</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($course->students as $index => $student)
                                    <tr class="animate__animated animate__fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->pivot->created_at->format('Y-m-d') }}</td>
{{--                                        <td class="text-end">--}}
{{--                                            <form action="{{ route('courses.unenroll', [$course->id, $student->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to unenroll this student?');">--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit" class="btn btn-outline-danger btn-sm">--}}
{{--                                                    <i class="fa-solid fa-user-minus me-1"></i> Unenroll--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

    <!-- Extra Styling -->
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
        .card {
            border-radius: 1.25rem;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .table {
            background: #f8f9fa;
            border-radius: 1rem;
            overflow: hidden;
        }
        .table thead {
            background: #023c6e;
            color: #ffffff;
        }
        .table th, .table td {
            padding: 1rem;
            vertical-align: middle;
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
            .table-responsive {
                font-size: 0.9rem;
            }
            .btn-sm {
                padding: 6px 12px;
            }
        }
    </style>

    <!-- Include Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
@endsection
