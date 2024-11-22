@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="row justify-content-between align-items-center mb-4">
                    <div class="col-md-6">
                        <h4 class="page-title text-center">Classes List</h4>
                    </div>

                    <div class="col-md-6 text-end">
                        <a href="{{ route('classes.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add Class
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
                                        <th>Class Name</th>
                                        <th>Section</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($classes as $info)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $info->name }}</td>
                                            <td>
                                                @if ($info->sections->isNotEmpty())
                                                    @foreach ($info->sections as $section)
                                                        <span>{{ $section->name }}</span>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No Sections Assigned</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('classes.edit', $info->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('classes.destroy', $info->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this class?')">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Classes Found</td>
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
