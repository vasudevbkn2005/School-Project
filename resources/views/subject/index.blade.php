@extends('Admin.header')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-md-6">
                    <h4 class="page-title text-center">Subject List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('subject.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Subject
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
                                    <th>Subject Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subject as $info)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>
                                            <a href="{{ route('subject.edit', $info->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('subject.destroy', $info->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this subject?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Subjects Found</td>
                                    </tr>
                                @endforelse
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
