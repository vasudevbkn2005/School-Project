@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <!-- Page Header -->
                <h4 class="page-title">Edit Exam Name</h4>

                <!-- Form Section -->
                <form action="{{ route('ExamName.update', $examName->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name">Exam Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $examName->name }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
