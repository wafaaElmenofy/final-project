@extends('layouts.main')

@section('content')
<div class="container "style="min-height:calc(100vh-100px); padding-bottom:45px; padding-top:45px;">
    <h2 style="color:blue;">Add New Course</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label text-primary">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-primary">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label text-primary">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-primary">Max Students</label>
            <input type="number" name="max_students" class="form-control" value="{{ old('max_students') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Course</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection