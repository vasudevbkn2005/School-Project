@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center mb-4">Edit Exam</h4>
                <a href="{{ route('exam.index') }}" class="btn btn-success mb-4">Go Back</a>

                <div class="card shadow-sm p-4">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form for editing an exam -->
                    <form action="{{ route('exam.update', $exam->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <!-- Exam Name -->
                        <div class="form-group">
                            <label for="exam_name_id">Exam Name</label>
                            <select name="exam_name_id" id="exam_name_id" class="form-control" required>
                                <option value="" disabled>Select Exam Name</option>
                                @foreach ($examNames as $examName)
                                    <option value="{{ $examName->id }}"
                                        {{ $exam->exam_name_id == $examName->id ? 'selected' : '' }}>
                                        {{ $examName->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Exam Type -->
                        <div class="form-group">
                            <label for="type_id">Exam Type</label>
                            <select name="type_id" id="type_id" class="form-control" required>
                                <option value="" disabled>Select Exam Type</option>
                                @foreach ($examTypes as $examType)
                                    <option value="{{ $examType->id }}"
                                        {{ $exam->type_id == $examType->id ? 'selected' : '' }}>
                                        {{ $examType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Start Date -->
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                value="{{ $exam->start_date }}" required>
                        </div>

                        <!-- End Date -->
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                value="{{ $exam->end_date }}" required>
                        </div>

                        <!-- Class -->
                        <div class="form-group">
                            <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="" disabled>Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}"
                                        {{ $exam->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="Enter exam description">{{ $exam->description }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
