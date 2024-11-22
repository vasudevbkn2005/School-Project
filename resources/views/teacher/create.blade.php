@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center">Add Teacher</h4>
                <a href="{{ route('teacher.index') }}" class="btn btn-success">Go Back</a>
                <div class="container">
                    <form action="/teacher/" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Teacher Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Teacher Name"
                                name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Image Uploaded</label>
                            <input class="form-control" type="file" name="image" accept="image/*" id="image"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Mobile</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification"
                                placeholder="Enter Qualification" required>
                        </div>

                        <div class="form-group">
                            <label for="subject_id">Subject</label>
                            <select class="form-control" id="subject_id" name="subject_id" required>
                                <option value="" disabled selected>Select a Subject</option>
                                @foreach ($subject as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save Teacher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
