@extends('Admin.header')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title text-center">Add Student</h4>
            <a href="{{ route('student.index') }}" class="btn btn-success">Go Back</a>
            <div class="container">
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Student Name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Image:</label>
                        <input class="form-control" type="file" name="image" accept="image/*" id="image">
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="father_name">Father Name:</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required
                            placeholder="Enter Father Name">
                        @error('father_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="mother_name">Mother Name:</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required
                            placeholder="Enter Mother Name">
                        @error('mother_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="Enter Email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Mobile:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="Enter Mobile" required>
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
                        @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="class_id">Class:</label>
                        <select class="form-control" id="class_id" name="class_id" required>
                            <option value="" disabled selected>Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="section_id">Section:</label>
                        <select class="form-control" id="section_id" name="section_id" required>
                            <option value="" disabled selected>Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                                    {{ $section->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('section_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
