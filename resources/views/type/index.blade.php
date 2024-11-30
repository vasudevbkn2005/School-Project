@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="row justify-content-between align-items-center mb-4">
                    <div class="col-md-6">
                        <h4 class="page-title text-center">Type List</h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('exam.index') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add Exam
                        </a>
                          <a href="{{ route('type.create') }}" class="btn btn-warning">
                            <i class="fa fa-plus"></i> Add Exam Type
                        </a>
                        <a href="{{ route('ExamName.index') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add Exam Name
                        </a>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Responsive Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class=" text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Type Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($type as $info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>
                                            <a href="{{ route('type.edit', $info->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit">Edit</i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('type.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this exam?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash">Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Table Section -->
            </div>
        </div>
    </div>
@endsection
