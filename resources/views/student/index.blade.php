@extends('Admin.header')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title text-center">Student List</h4>
            <a href="{{ route('student.create') }}" class="btn btn-success mb-3">Add Student</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.no</th>
                            <th>Student Name</th>
                            <th>Image</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date Of Birth</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Enrollment Number</th>
                            <th>Admission Number</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $info)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->name }}</td>
                             <td>
                            @if ($info->image)
                                <img src="{{ asset('storage/' . $info->image) }}" alt="Student Image" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                            <td>{{ $info->father_name }}</td>
                            <td>{{ $info->mother_name }}</td>
                            <td>{{ $info->email }}</td>
                            <td>{{ $info->mobile }}</td>
                            <td>{{ $info->dob }}</td>
                            <td>{{ $info->address }}</td>
                            <td>{{ $info->gender }}</td>
                            <td>{{ $info->enrollment_number }}</td>
                            <td>{{ $info->admission_date }}</td>
                            <td>{{ $info->class['name'] }}</td>
                            <td>{{ $info->section['name'] }}</td>
                            <td><a href="{{ route('student.edit', $info->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td>
                                <form action="{{ route('student.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
