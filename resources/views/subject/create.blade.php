@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="content">
                    <div class="container-fluid">
                        <h4 class="page-title text-center">Add Subject</h4>
                        <a href="{{ route('subject.index') }}" class="btn btn-success">Go Back</a>
                        <div class="container">
                            <form action="{{route('subject.store')}}" autocomplete="off" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Subject Name</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter Teacher Name" name="name" required>
                                </div>
                                 <button type="submit" class="btn btn-primary mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
