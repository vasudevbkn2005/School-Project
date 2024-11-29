@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center mb-4">Edit Exam Type</h4>
                <a href="{{ route('type.index') }}" class="btn btn-success mb-4">Go Back</a>

                <div class="card shadow-sm p-4">
                    <!-- Form for updating an exam type -->
                    <form action="{{ route('type.update', $type->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT') <!-- Use PUT for updating -->

                        <!-- Exam Type Name -->
                        <div class="form-group">
                            <label for="name">Exam Type Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ $type->name }}" placeholder="Enter exam type name" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
