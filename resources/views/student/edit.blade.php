@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center">Update Student Detail</h4>
                <a href="{{ route('student.index') }}" class="btn btn-success">Go Back</a>
                @foreach ($errors->all() as $err)
                    {{$err}}
                @endforeach
                <!-- Edit student Form -->
                <div class="container">
                    <form action="/student/{{ $student['id'] }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $student->name }}"
                                placeholder="Enter Student Name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image Uploaded</label>
                            @if ($student->image)
                                <img src="{{ asset('storage/' . $student->image) }}" alt="Current Image" width="100">
                            @endif
                            <input class="form-control" type="file" name="image" accept="image/*" id="image">
                        </div>

                        <div class="form-group">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" value="{{ $student->father_name }}"
                                name="father_name" placeholder="Enter Father's Name" required>
                        </div>

                        <div class="form-group">
                            <label for="mother_name">Mother Name</label>
                            <input type="text" class="form-control" id="mother_name" value="{{ $student->mother_name }}"
                                name="mother_name" placeholder="Enter Mother's Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $student->email }}"
                                name="email" required placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" value="{{ $student->mobile }}"
                                name="mobile" placeholder="Enter Mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" value="{{ $student->dob }}" name="dob">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Enter Address">{{ $student->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="enrollment_number">Enrollment Number</label>
                            <input type="text" class="form-control" id="enrollment_number" value="{{ $student->enrollment_number }}"
                                name="enrollment_number" required>
                        </div>

                        <div class="form-group">
                            <label for="admission_date">Admission Date</label>
                            <input type="date" class="form-control" id="admission_date" value="{{ $student->admission_date }}"
                                name="admission_date">
                        </div>

                        <div class="form-group">
                            <label for="class_id">Class</label>
                            <select class="form-control" id="class_id" name="class_id">
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="section_id">Section</label>
                            <select class="form-control" id="section_id" name="section_id">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
