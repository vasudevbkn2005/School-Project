@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center">Update Teacher Detail</h4>
                <a href="{{ route('teacher.index') }}" class="btn btn-success">Go Back</a>
                {{-- @foreach ($teacher as $info) --}}
                <!-- Edit Teacher Form -->
                <div class="container">

                    {{-- @foreach ($teacher as $info) --}}
                    <form action="/teacher/{{ $teacher['id'] }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Teacher Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $teacher->name }}"
                                placeholder="Enter Teacher Name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image Uploaded</label>
                            @if ($teacher->image)
                                <img src="{{ asset('storage/' . $teacher->image) }}" alt="Current Image" width="100">
                            @endif
                            <input class="form-control" type="file" name="image" accept="image/*" id="image">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $teacher->email }}"
                                name="email" required placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Mobile</label>
                            <input type="text" class="form-control" id="phone" value="{{ $teacher->phone }}"
                                name="phone" placeholder="Enter Mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" class="form-control" id="qualification"
                                value="{{ $teacher->qualification }}" name="qualification" placeholder="Enter Qualification"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="subject_id">Subject</label>
                            <select class="form-control" id="subject_id" name="subject_id" required>
                                <option value="" disabled>Select a Subject</option>
                                @foreach ($subject as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ $subject->id == $teacher->subject_id ? 'selected' : '' }}>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- @endforeach --}}
                        <button type="submit" class="btn btn-primary mt-3">Save Teacher</button>
                    </form>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    </div>
@endsection
