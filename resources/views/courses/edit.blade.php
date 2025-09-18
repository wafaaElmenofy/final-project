@extends('layouts.main')

@section('title', 'Edit Course')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-primary">Edit Course</h2>

        {{-- عرض أي أخطاء --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- فورم التعديل --}}
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label text-primary">Course Title</label>
                <input type="text" name="title" id="title" 
                       class="form-control" value="{{ old('title', $course->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label text-primary">Course Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="form-control" required>{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label text-primary">Start Date</label>
                <input type="date" name="start_date" id="start_date" 
                       class="form-control" value="{{ old('start_date', $course->start_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="max_students" class="form-label text-primary">Max Students</label>
                <input type="number" name="max_students" id="max_students" 
                       class="form-control" value="{{ old('max_students', $course->max_students) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
</div>
@endsection