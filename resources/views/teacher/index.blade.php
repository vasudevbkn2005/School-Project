@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center" style="">Teacher List</h4> 
                <a href="{{route('teacher.create')}}" class="btn btn-success">Add Teacher</a>
                <div class="container-fluid">

        <!-- Responsive Table Wrapper -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>       
                    <tr style="color: white">
                        <th>S.no</th>
                        <th>Teacher Name</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Qualification</th>
                        <th>Subject</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacher as $info) <!-- Changed $teacher to $teachers -->
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$info->name}}</td>
                        <!-- Display Image (if available) -->
                        <td>
                            @if ($info->image)
                                <img src="{{ asset('storage/' . $info->image) }}" alt="Teacher Image" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{$info->email}}</td>
                        <td>{{$info->phone}}</td> <!-- Assuming 'phone' is the correct field name -->
                        <td>{{$info->qualification}}</td>
                        <td>{{$info->subject['name']}}</td>
                        <td>
                            <a href="/teacher/{{ $info['id'] }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <form action="/teacher/{{ $info->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do Yo Want To Delete')">Delete</button>
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
    </div>
@endsection