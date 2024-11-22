@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center" style="">Student List</h4>
                <a href="{{ route('student.create') }}" class="btn btn-success">Add Student</a>
                <div class="container-fluid">

                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
