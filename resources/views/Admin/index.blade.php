@extends('Admin.header')
@section('content')
<style>
    .card {
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    font-size: 1.2rem;
}

.list-group-item {
    border: none;
    padding: 15px;
}

</style>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center text-white bg-primary py-3 rounded">School Management Dashboard</h4>
                
                <!-- Statistics Cards -->
                <div class="row mt-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="card text-center bg-primary text-white">
                            <div class="card-body">
                                <h5>Total Students</h5>
                                <h3>{{ $totalStudents }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card text-center bg-success text-white">
                            <div class="card-body">
                                <h5>Total Teachers</h5>
                                <h3>{{ $totalTeachers }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card text-center bg-warning text-white">
                            <div class="card-body">
                                <h5>Classes</h5>
                                <h3>{{ $totalClasses }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card text-center bg-danger text-white">
                            <div class="card-body">
                                <h5>Pending Fees</h5>
                                <h3>${{ $pendingFees }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities and Shortcuts -->
                <div class="row mt-5">
                    <!-- Recent Activities -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5>Recent Activities</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($recentActivities as $activity)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $activity['description'] }}
                                            <span class="badge bg-warning">{{ $activity['time'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Shortcuts -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5>Quick Links</h5>
                            </div>
                            <div class="card-body d-flex flex-column gap-2">
                                <a href="{{ route('student.index') }}" class="btn btn-primary">Manage Students</a>
                                <a href="{{ route('teacher.index') }}" class="btn btn-warning">Manage Teachers</a>
                                <a href="{{ route('classes.index') }}" class="btn btn-danger">Manage Classes</a>
                                <a href="{{ route('fees.index') }}" class="btn btn-info">View Fees</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar Section -->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5>School Calendar</h5>
                            </div>
                            <div class="card-body">
                                <iframe src="https://calendar.google.com/calendar/embed?src=school_calendar_url&ctz=Your_Timezone" 
                                        style="border: 0; width: 100%; height: 600px;" frameborder="0" scrolling="no">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
