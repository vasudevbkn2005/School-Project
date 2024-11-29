@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center mb-4">Add Exam Type</h4>
                <a href="{{ route('type.index') }}" class="btn btn-success mb-4">Go Back</a>

                <div class="card shadow-sm p-4">
                    <!-- Form for creating an exam -->
                    <form action="{{ route('type.store') }}" method="POST" autocomplete="off">
                        @csrf

                        <!-- Exam Name -->
                        <div class="form-group">
                            <label for="name">Exam Type</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Exam Type" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
