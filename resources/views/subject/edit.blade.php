@extends('Admin.header')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center">Update Subject Detail</h4>
                <a href="{{ route('subject.index') }}" class="btn btn-success">Go Back</a>
                {{-- @foreach ($subject as $info) --}}
                    <!-- Edit Teacher Form -->
                    <div class="container">

                        {{-- @foreach ($teacher as $info) --}}
                        <form action="/subject/{{ $subject['id'] }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Subject Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $subject->name }}"
                                    placeholder="Enter Teacher Name" name="name" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save Teacher</button>
                        </form>
                    </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    </div>
@endsection
