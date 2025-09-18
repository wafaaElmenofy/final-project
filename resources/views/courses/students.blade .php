@extends('layouts.main')

@section('title', 'Students in ' . $course->title)

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-primary">students are enrolled: {{ $course->title }}</h2>

        @if(count($students) > 0)
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student['name'] }}</td>
                            <td>{{ $student['email'] }}</td>
                            <td>{{ $student['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No students ara enrolled in this course</p>
        @endif

        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">⬅ Back</a>
    </div>
</div>
@endsection